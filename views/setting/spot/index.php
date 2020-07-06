<?include_once VIEWS.'/includes/header.php'?>
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


            <div class="container grid-2" style="margin-top:50px">

                <div class=" bg-style1">
                    <form action="" method="post" enctype="multipart/form-data" >
                        <a href="/setting" class="btn btn-outline-info  " ><?=localisation::txt('Назад')?></a><a href="/setting" class="btn btn-outline-info  " ></a>
                        <h2>Настройки спота</h2>
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
                        <span>Активна</span>
                        <input type="checkbox" id="time1" name="active" value="1" <?if($spot->data['active']==1)echo'checked'?>>
                        <label style="" for="time1"></label>
                        <br>
                        <br>
                        <span>Адрес</span>
                        <div class="col-12"><input type="text" name="address" required minlength="3" value="<?=$spot->data['address']?>"></div>
                        <span>Тел.</span>
                        <div class="col-12"><input type="number" name="phone" required minlength="3" value="<?=$spot->data['phone']?>"></div>
                       <span>Email</span>
                        <div class="col-12"><input type="text" name="email" required minlength="3" value="<?=$spot->data['email']?>"></div>
                        <span>Additional Information</span>
                        <div class="col-12">
                            <textarea name="" id="" cols="30" rows="10"><?=$spot->data['description']?></textarea>
                        </div>
                        <button class="btn btn-success mt-4 " name="form"><?=localisation::txt('Создать организацию')?></button>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <?include_once VIEWS.'/includes/footer.php'?>
