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
                        <a href="/setting" class="btn btn-outline-info  "><?=localisation::txt('Назад')?></a>
                        <h2><?=localisation::txt('Пригласить')?></h2>
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
                        <h3 class="bg-info text-light p-2">Приглашение отправленно</h3>
                        <div>Пусть ваш коллега следует инструкциям в письме</div>
                        <a href="/staff" class="btn btn-success mt-4 " >Вернуться</a>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <? include_once VIEWS . '/includes/footer.php' ?>
