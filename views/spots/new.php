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


            <div class="container grid-2" style="margin-top:50px">

                <div class=" bg-style1">
                    <form action="" method="post" enctype="multipart/form-data">
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

                        <span>Адрес</span>
                        <div class="col-12"><input type="text" name="address" required minlength="3"></div>
                        <span>Телефон</span><br>
                        <span style="color:darkgray">(необязательное поле)</span>
                        <div class="col-12"><input type="number" name="phone"  minlength="3"></div>
                        <span>Email</span><br>
                        <span style="color:darkgray">(необязательное поле)</span>
                        <div class="col-12"><input type="text" name="email"  minlength="3"></div>
                        <span>Доп. информацыя</span><br>
                        <span style="color:darkgray">(необязательное поле)</span>
                        <div class="col-12">
                            <textarea name="description" id="" cols="30" rows="10"></textarea>
                        </div>

                        <button class="btn btn-success mt-4 " name="form">Добавить адрес</button>
                    </form>
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
