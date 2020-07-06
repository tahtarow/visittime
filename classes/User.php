<?php

class User
{
    public
        $logged = false,
        $login = false,
        $password = false,
        $data,
        $chat = false,
        $count_new_messages = 0,
        $latest_chat = false,
        $errors;


    function __construct($id = false)
    {
        if ($id) {
            $this->data = self::load_user_data($id);
        }
    }

    static function registration($name, $surname, $email, $password)
    {
        $errors = [];
        $email_confirm_code = getRandomnString(20);
        if ($visitor = ORM::forTable('users')->where('email', $email)->findOne()) {
            if ($visitor['required'] == 1) {
                $errors[] = 'Die Postanschrift wird bereits verwendet, verwenden Sie eine andere Postanschrift';
            }
        } else {
            $visitor = ORM::forTable('users')->create();
        }

        if (!$errors) {
            $visitor
                ->set('name', $name)
                ->set('surname', $surname)
                ->set('email', $email)
                ->set('password', md5($password))
                ->set('email_confirm_code', $email_confirm_code)
                ->save();
            self::send_email_check($email, $email_confirm_code);
        }
        return $errors;

    }

    static function send_email_check($email, $email_confirm_code)
    {
//        $message = '<div style="">Um die Registrierung unter visit-time zu bestätigen, <br>
//    klicken Sie auf die Schaltfläche unten. <br>
//    Wenn dieser Brief versehentlich bei Ihnen eingegangen ist, ignorieren Sie ihn. <br>
//    <div><a href="http://retten-sie-leben.ch/registration?email_confirm_code=' . $email_confirm_code . '" ><button style="padding: 10px 20px;background-color:green;color:white">Bestätigen</button></a></div>
//</div>
//';
//        global $email;
//        $email->to = $email;
//        $email->from = 'Retten Sie Leben';
//        $email->subject = 'Registrierung unter ';
//        $email->message = $message;
//        $email->send();

    }

    static function check_email_confirm_code($code)
    {
        sleep(3);
        if (!$user = ORM::forTable('users')
            ->where('email_confirm_code', $code)
            ->findOne()
        ) {
            $errors[] = 'Der Link ist möglicherweise veraltet. Versuchen Sie erneut, sich zu registrieren.';
        } else {
            $user
                ->set('required', 1)
                ->set('registration_time', get_date_time_for_bd())
                ->save();
            $errors = '';
        }
        return $errors;
    }

    static function get_id_user_on_email_confirm_code($email_confirm_code)
    {
        $user = ORM::forTable('users')
            ->where('email_confirm_code', $email_confirm_code)
            ->findOne();
        $id = $user['id'];
        $user->set('email_confirm_code', '')->save();
        return $id;

    }

    public static function get_invited_stuff($key)
    {
        $staff = ORM::forTable('users')
            ->where('email_confirm_code', $key)
            ->findOne();
        if (empty($staff)) {
            return false;
        } else {
            return $staff;
        }
    }

    public static function get_user_on_id($id)
    {
        return ORM::forTable('users')->findOne($id);
    }

    public static function get_spots_on_user_id($id)
    {
        $r = ORM::forTable('z_user_spots')
            ->where('user_id', $id)
            ->findArray();

        if (!empty($r)) {
            if (isset($r[1])) {
                $ids = [];
                foreach ($r as $item) {
                    $ids[] = $item['spot_id'];
                }
                return ORM::forTable('spots')
                    ->whereIdIn($id);
            } else {
                return ORM::forTable('spots')
                    ->findOne($r[0]['spot_id']);
            }
        } else {
            return false;
        }
    }



    function login()
    {

        if ($this->try_login_using_session()) {
            $result = true;
        } elseif ($this->try_login_using_cookie()) {
            $result = true;
        } else {
            if (!$this->login or !$this->password) {
                if (isset($this->data['id'])) {
                    $result = $this->login_on_id($this->data['id']);
                } else {
                    $this->errors[] = localisation::txt('нету данных для входа');
                    $result = false;
                }
            } else {
                $result = $this->try_login();
            }
        }
        if ($result) {
            $this->logged = true;
            $this->save_login_data_on_user();
        }
        return $result;
    }

    private function try_login()
    {
        if ($this->data = ORM::forTable('users')
            ->select('*')
            ->select('users.id', 'id')
            ->join('roles', 'users.role=roles.id')
            ->where('email', $this->login)
            ->where('password', $this->password)
            ->findOne()
        ) {
            return true;
        } else {
            return false;
        }
    }

    private function save_login_data_on_user($login = '', $password = '')
    {
        $login = empty($login) ? $this->login : $login;
        $password = empty($password) ? $this->password : $password;
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        @cookies::set('login', $login);
        @cookies::set('password', $password);
    }

    public function go_exit()
    {
        $this->clear_login_data_on_user();
    }

    public function clear_login_data_on_user()
    {
        session_destroy();
        cookies::del('login');
        cookies::del('password');
    }

    public function login_on_id($id)
    {
        $v = ORM::forTable('users')->findOne($id);
        $this->login = $v['email'];
        $this->password = $v['password'];
        return $this->login();
    }

    static function load_user_data($id)
    {
        return ORM::forTable('users')->findOne($id);
    }

    private function try_login_using_session()
    {
        if (isset($_SESSION['login']) and !empty($_SESSION['login']))
            $this->login = $_SESSION['login'];
        if (isset($_SESSION['password']) and !empty($_SESSION['password']))
            $this->password = $_SESSION['password'];
        return $this->try_login();
    }

    private function try_login_using_cookie()
    {
        if (isset($_COOKIE['login'])) $this->login = $_COOKIE['login'];
        if (isset($_COOKIE['password'])) $this->password = $_COOKIE['password'];
        return $this->try_login();
    }

    public function load_networks()
    {
        return $this->data['networks'] = ORM::forTable('z_user_network')
            ->join('networks', 'z_user_network.network_id=networks.id')
            ->where('z_user_network.user_id', $this->data['id'])
            ->findMany();
    }

    public function load_networks_with_spots()
    {
        $this->load_networks();
        if (!empty($this->data['networks'])) {
            foreach ($this->data['networks'] as &$network) {
                $network['spots'] = ORM::forTable('spots')
                    ->where('network_id', $network['id'])
                    ->findMany();
            }

        }
    }

    public function check_role($role)
    {
        return $this->data['role_name_en'] == $role;
    }

    public function check_network_ownership($network_id)
    {
        return ORM::forTable('z_user_network')
            ->where('user_id', $this->data['id'])
            ->where('network_id', $network_id)
            ->findOne();
    }

    public function check_spot_ownership($spot_id)
    {
        return ORM::forTable('z_user_spots')
            ->where('user_id', $this->data['id'])
            ->where('spot_id', $spot_id)
            ->findOne();
    }

    private function create_invite($email, $object,$objects_id)
    {
        if ($object=='spot'){
            $spot_id = $objects_id;
        }elseif($object=='network'){
            $network_id = $objects_id;
            $spot_id = false;
        }

        $key = getRandomnString();


        $user = ORM::forTable('users')
            ->where('email', $email)
            ->find_one();

        if (!empty($user)) {
            if ($user['required'] <> 1) {
                $user
                    ->set('email_confirm_code', $key)
                    ->set('boss', $this->data['id']);

                self::clear_network_ownership($user['id']);
                self::clear_spot_ownership($user['id']);


                if ($spot_id) {
                    ORM::forTable('z_user_spots')
                        ->create()
                        ->set('user_id', $user['id'])
                        ->set('spot_id', $spot_id)
                        ->save();
                } else {
                    ORM::forTable('z_user_network')
                        ->create()
                        ->set('user_id', $user['id'])
                        ->set('network_id', $network_id)
                        ->save();
                }


                if ($user->save()) {
                    return $key;
                } else {
                    return false;
                }
            } else {
                $this->errors[] = localisation::txt('Ошибка, на этот email уже зарегистрирован аккаунт');
                return false;
            }

        } else {
            $temp = ORM::forTable('users')
                ->create()
                ->set('email', $email)
                ->set('email_confirm_code', $key)
                ->set('boss', $this->data['id']);

            if ($temp->save()) {

                if ($spot_id) {
                    ORM::forTable('z_user_spots')
                        ->create()
                        ->set('user_id', $temp->id())
                        ->set('spot_id', $spot_id)
                        ->save();
                } else {
                    ORM::forTable('z_user_network')
                        ->create()
                        ->set('user_id', $temp->id())
                        ->set('network_id', $network_id)
                        ->save();
                }

                return $key;
            } else {
                return false;
            }
        }
    }

    function get_staff_list()
    {
        return ORM::forTable('users')
            ->where('boss', $this->data['id'])
            ->findMany();
    }

    function load_networks_and_spots_with_staff()
    {
        $this->load_networks_with_spots();
        foreach ($this->data['networks'] as &$network) {
            $network['staff'] = ORM::forTable('z_user_network')
                ->join('users', 'z_user_network.user_id=users.id')
                ->where('network_id', $network['id'])
                ->findMany();
            if (!empty($network['spots'])) {
                foreach ($network['spots'] as &$spot) {
                    $spot['staff'] = ORM::forTable('z_user_spots')
                        ->join('users', 'z_user_spots.user_id=users.id')
                        ->where('spot_id', $spot['id'])
                        ->findMany();
                }
            }
        }
    }

    function get_all_spots_ids()
    {

        $spots = ORM::forTable('z_user_network')
            ->select(['spot_id' => 'spots.id'])
            ->join('spots', 'spots.network_id=z_user_network.network_id')
            ->where('z_user_network.user_id', $this->data['id'])
            ->findArray();


        $spots_ids = '';
        foreach ($spots as &$spot) {
            $spots_ids[] = $spot['id'];
        }

        return $spots_ids;
    }

    public function create_invite_to_spot($email, $spot_id)
    {
       return $this->create_invite($email, 'spot',$spot_id);
    }
    public function create_invite_to_network($email, $network_id)
    {
        return $this->create_invite($email, 'network',$network_id);
    }



    public static function clear_network_ownership($user_id)
    {

        if ($temp = ORM::forTable('z_user_network')
            ->where('user_id', $user_id)
            ->findMany()) {
            if (!empty($temp)) {
                ORM::raw_execute('DELETE FROM `z_user_network` where user_id=' . $user_id);
            }
        }
    }

    public static function clear_spot_ownership($user_id)
    {

        if ($temp = ORM::forTable('z_user_spots')
            ->where('user_id', $user_id)
            ->findMany()) {
            if (!empty($temp)) {
                ORM::raw_execute('DELETE FROM `z_user_spots` where user_id=' . $user_id);
            }
        }

    }


}