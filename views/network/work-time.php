<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="/views/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="/views/js/bootstrap.min.js"></script>
    <? less(VIEWS . '/css/index.less') ?>
    <link rel="stylesheet" href="/views/css/main.css"/>

</head>
<style>
    body {
        background-image: url(/views/img/77.png); /* Путь к фоновому рисунку */
        background-position: left bottom; /* Положение фона */
        background-repeat: repeat; /* Повторяем фон по горизонтали */
    }

    .hided-week {
        display: none;
    }
</style>

<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">


            <style>a {
                    border-bottom: none;
                }</style>


            <div class="container setting grid-2" style="margin-top:50px">

                <div class=" bg-style1 ">
                    <?if(!isset($_GET['day'])){
                        $_GET['day']=1;
                    }else{
                        if($_GET['day']<7){
                            $temp_day =$_GET['day']+1;
                            $action = '/network/time?network_id='.$_GET['network_id'].'&day='.$temp_day ;
                        }else{
                            $action = '/setting';
                        }
                    }?>


                    <form action="<?=$action ?>" method="post" enctype="multipart/form-data">
                        <h2><?=$network->data['name']?></h2>
                        <h4>Время роботы</h4>
                        <?
                        if (!empty(errors::$list)) { ?>
                            <p class="text-danger">
                                <?
                                foreach (errors::$list as $error) { ?>
                                    <?= $error ?><br>
                                    <?
                                } ?>
                            </p>
                            <?
                        } ?>

                        <div class="grid-7  work-time">
                            <?foreach ($days_names as $day){?>
                                <div style="padding: 0" class="bg-style2 <?if($_GET['day']==$day['day_number'])echo'active bg-success text-light'?>">
                                    <div style="cursor:default;padding: 5px" class=""><?=$day['name_short_de']?></div>
                                </div>

                            <?}?>
                            <script>
                                function cancel_href(e) {
                                    e.preventDefault();
                                    // alert('Скрипт сработал');
                                };
                            </script>
                        </div>

                        <div style="margin-top:20px;display: grid; grid-template-columns: 1fr 1fr 1fr ;">

                                <?

                                for ($i = 0; $i <= 23; $i++) {
                                    if ($i==0 or $i==8 or $i==16 ){echo '<div>';}
                                    $time = $i;
                                    $time3 = $i+1;
                                    if ($i < 10) {
                                        $time = '0' . $time;
                                        if ($i < 9){
                                            $time3 = '0'.$time3;
                                        }
                                    }
                                    $time1 = $time .':00';
                                    $time2 = $time .':30';
                                    $time3 = $time3 .':00';;

                                    $t1 = $time1 .'-'.$time2;
                                    $t2 = $time2 .'-'.$time3;

                                    $checked = '';
                                    if (($_GET['day']==1 and !isset($_POST['time'])) and $_GET['day']<>7){
                                        $checked = ($i > 7 and $i < 19) ? '1' : '';
                                    }

                                    ?>
                                    <input type="checkbox" id="time<?=$i?>" name="time[]" value="<?=$t1?>" <?if (!empty($checked)or (isset($_POST['time']) and in_array($t1,$_POST['time'])))echo'checked'?>>
                                    <label style="height: 18px; padding-top:5px" for="time<?=$i?>"><?=$t1?></label>
                                    <input type="checkbox" id="time_<?=$i?>" name="time[]" value=<?=$t2?> <?if (!empty($checked)or (isset($_POST['time']) and in_array($t2,$_POST['time'])))echo'checked'?>>
                                    <label style="height: 18px; padding-top:5px" for="time_<?=$i?>"><?=$t2?></label>

                                <? if ( $i==7 or $i==15 or $i==23 ){echo '</div>';}
                                } ?>
                        </div>
                            <br>
                            <br>
                        <button class="btn btn-danger" <?if($_GET['day']<=1)echo'disabled'?> name="back"><?=localisation::txt('Назад')?></button>
                        <?if($_GET['day']<7){?><button class="btn btn-success"> Далее</button><?}?>
                        <?if($_GET['day']==7){?><button class="btn btn-success"> Готово</button><?}?>

                    </form>

                    </form>
                </div>


                <div class="  ">
                </div>

            </div>


        </div>
    </div>

    <div id="sidebar">
        <div class="inner">

            <!-- Menu -->
            <nav id="menu">
                <header class="major">
                    <h2>Menu</h2>
                </header>
                <!--                <ul>-->
                <!--                    <select name="" id="">-->
                <!--                        <option value="">Название орг1</option>-->
                <!--                        <option value="">Название орг1</option>-->
                <!--                        <option value="">Название орг1</option>-->
                <!--                        <option value="">Название орг1</option>-->
                <!--                    </select>-->

                <!--                    <li>-->
                <!--                        <span class="opener">Submenu</span>-->
                <!--                        <ul>-->
                <!--                            <li><a href="#">Lorem Dolor</a></li>-->
                <!--                            <li><a href="#">Ipsum Adipiscing</a></li>-->
                <!--                            <li><a href="#">Tempus Magna</a></li>-->
                <!--                            <li><a href="#">Feugiat Veroeros</a></li>-->
                <!--                        </ul>-->
                <!--                    </li>-->
                <!--                    <li><a href="#">Etiam Dolore</a></li>-->
                <!--                    <li><a href="#">Adipiscing</a></li>-->
                <!--                    <li>-->
                <!--                        <span class="opener">Another Submenu</span>-->
                <!--                        <ul>-->
                <!--                            <li><a href="#">Lorem Dolor</a></li>-->
                <!--                            <li><a href="#">Ipsum Adipiscing</a></li>-->
                <!--                            <li><a href="#">Tempus Magna</a></li>-->
                <!--                            <li><a href="#">Feugiat Veroeros</a></li>-->
                <!--                        </ul>-->
                <!--                    </li>-->
                <!--                    <li><a href="#">Maximus Erat</a></li>-->
                <!--                    <li><a href="#">Sapien Mauris</a></li>-->
                <!--                    <li><a href="#">Amet Lacinia</a></li>-->
                <!--                </ul>-->
                <section>
                    <select name="" id="">
                        <option value="">Название орг1</option>
                        <option value="">Название орг1</option>
                        <option value="">Название орг1</option>
                        <option value="">Название орг1</option>
                    </select>
                    <div class="mini-posts">
                        <article>
                            <!--                            <a href="#" class="image"><img src="images/pic08.jpg" alt=""></a>-->
                            <ul>
                                <li><a href="/calendar">календарь</a></li>
                                <li><a href="/records">заявки</a></li>
                                <li><a href="/calendar">клиенты</a></li>
                                <li><a href="/statistic">статистика</a></li>
                                <li><a href="/setting">настройки</a></li>
                            </ul>
                        </article>
                        <article>
                            <ul>
                                <li><a href="/">профиль</a></li>
                                <li><a href="/exit">выход</a></li>
                            </ul>
                        </article>

                    </div>

                </section>
            </nav>

        </div>
    </div>

</div>

<!-- Scripts -->


</body>

<script>
    $("#expand-calendar").click(function () {
        $(".hided-week").toggle('normal', 'linear');
    });
</script>

</html>
<script src="/views/js/jquery.min.js"></script>
<script src="/views/js/browser.min.js"></script>
<script src="/views/js/breakpoints.min.js"></script>
<script src="/views/js/util.js"></script>
<script src="/views/js/main.js"></script><?php
