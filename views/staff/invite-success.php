<? include_once VIEWS . '/includes/header.php' ?>
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <h2 class="align-center"><?=localisation::txt('Регистрация')?></h2>
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
                            <div class="col-12">
                                <span class="alert-success p-2"><?=localisation::txt('Регистрация прошла успешно')?></span>
                            </div>
                            <div class="col-12 align-center">
                                <a href="/" class="btn btn-success mt-4 " ><?=localisation::txt('На главную')?></a>
                            </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <? include_once VIEWS . '/includes/footer.php' ?>
