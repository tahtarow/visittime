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
                        <?if($new_staff){?>
                        <div class="col-12">
                            <span>Пользователь</span>
                        </div>
                        <div class="col-12 text-success " style="font-weight: bold">
                            <span><?=$boss['name']?> <?=$boss['surname']?></span>
                        </div>
                        <br>
                        <div class="col-12">
                            <span>Пригласил вас работать в</span>
                            <br>
                            <span class="text-success" style="font-weight: bold"><?=$network->data['name']?>
                                <?if(!isset($spot) or empty($spot)){?>
<!--                                    (--><?//=$network->data['address']?><!--)-->
                                <?}else{?>
                                    (<?=$spot['address']?>)
                                <?}?>
                                </span>
                        </div>
                        <br>
                        <br>
                        <h3 >Заполните свой профиль</h3>

                        <span>Имя</span>
                        <div class="col-12"><input type="text" name="name" required minlength="3"></div>
                        <span>Фамилия</span>
                        <div class="col-12"><input type="text" name="surname" required minlength="3"></div>
                        <span>Должность, обязаность или специальность</span>
                        <div class="col-12"><input type="text" name="function" required minlength="3"></div>
                        <span>Аватар</span>
                        <div class="col-12"><input type="file" name="avatar"></div>
                        <button class="btn btn-success mt-4 " name="form">Сохранить</button>


                        <?}else{?>
                            <div class="col-12 align-center">
                                <a href="/" class="btn btn-success mt-4 " ><?=localisation::txt('На главную')?></a>
                            </div>
                        <?}?>


                    </form>
                </div>
            </div>


        </div>
    </div>
    <? include_once VIEWS . '/includes/footer.php' ?>
