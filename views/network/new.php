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
                        <h2>Создание организации</h2>
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
                        <span>Название организации</span>
                        <div class="col-12"><input type="text" name="network_name" required minlength="3"></div>
                        <span>Адрес главного офиса</span>
                        <div class="col-12"><input type="text" name="address" required minlength="3"></div>
                        <span>Тел. главного офиса</span>
                        <div class="col-12"><input type="number" name="phone" required minlength="3"></div>
                        <span>Логотип (не обязательно)</span>
                        <div class="col-12 mt-4"><input class="" type="file" name="logo" placeholder=""></div>
                        <button class="btn btn-success mt-4 " name="form"><?=localisation::txt('Создать организацию')?></button>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <?include_once VIEWS.'/includes/footer.php'?>
