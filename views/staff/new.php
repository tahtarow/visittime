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
                        <a href="/staff" class="btn btn-outline-info  "><?=localisation::txt('Назад')?></a>
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
                        <span><?=localisation::txt('Открыть доступ')?></span>
                        <div class="col-12">
                            <select class="my-select mt-1" name="object">
                                <option ><?=localisation::txt('Не задано')?></option>
                                <? foreach ($networks as $network) { ?>
                                    <option value="<?= $network['id'] ?>"><?= $network['name'] ?></option>
                                    <? if (!empty($network['spots'])) { ?>
                                        <? foreach ($network['spots'] as $spot) { ?>
                                            <option value="<?= $network['id'] ?>_<?= $spot['id'] ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?= $spot['address'] ?></option>
                                        <? } ?>
                                    <? } ?>
                                <? } ?>
                            </select>
                        </div>
                        <span><?=localisation::txt('Email сотрудника')?></span>
                        <div class="col-12"><input type="text" name="email" required minlength="3"></div>
                        <div class="col-12"><span><?=localisation::txt('На этот имейл прийдет приглашение по которому к вам сможет присоидиниться колега')?></span></div>
                        <button class="btn btn-success mt-4 " name="form"><?=localisation::txt('Пригласить')?></button>

                    </form>
                </div>
            </div>


        </div>
    </div>
    <? include_once VIEWS . '/includes/footer.php' ?>
