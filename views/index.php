<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link href="/views/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="/views/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <? less(VIEWS . '/css/index.less') ?>

</head>

<style>
    body{
        background-image: url(/views/img/77.png); /* Путь к фоновому рисунку */
        background-position: left bottom; /* Положение фона */
        background-repeat: repeat; /* Повторяем фон по горизонтали */
    }
</style>
<body >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css"/>

<style>
    .form-width {
        max-width: 25rem;
    }

    .has-float-label {
        position: relative;
    }

    .has-float-label label {
        position: absolute;
        left: 0;
        top: 0;
        cursor: text;
        font-size: 75%;
        opacity: 1;
        -webkit-transition: all .2s;
        transition: all .2s;
        top: -.5em;
        left: 0.75rem;
        z-index: 3;
        line-height: 1;
        padding: 0 1px;
    }

    .has-float-label label::after {
        content: " ";
        display: block;
        position: absolute;
        background: white;
        height: 2px;
        top: 50%;
        left: -.2em;
        right: -.2em;
        z-index: -1;
    }

    .has-float-label .form-control::-webkit-input-placeholder {
        opacity: 1;
        -webkit-transition: all .2s;
        transition: all .2s;
    }

    .has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
        opacity: 0;
    }

    .has-float-label .form-control:placeholder-shown:not(:focus) + label {
        font-size: 150%;
        opacity: .5;
        top: .3em;
    }

    .input-group .has-float-label {
        display: table-cell;
    }

    .input-group .has-float-label .form-control {
        border-radius: 0.25rem;
    }

    .input-group .has-float-label:not(:last-child) .form-control {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
    }

    .input-group .has-float-label:not(:first-child) .form-control {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        margin-left: -1px;
    }



</style>

<div class="p-x-1 p-y-2">
    <form class="card card-block m-x-auto bg-faded form-width">
        <legend class="m-b-1 text-xs-center" style="background-color:#ffffff;;border: 2px dashed #4c4c4c; border-radius: 15px;color:red;font-family: Impact">VISIT-TIME</legend>
        <p style="text-align: center">Terminservice</p>
    </form>
</div>





<div class="p-x-1 p-y-1 reg-form">
    <form action="/login" method="post">
    <div class="form-group input-group header-buttons m-x-auto bg-faded"  >
        <button  class="has-float-label button btn btn-success"><?=localisation::txt('Регистрация')?></button>
        <button type="submit" class="has-float-label button btn btn-outline-info"><?=localisation::txt('Вход')?></button>
    </div>
    </form>
    <form class="card card-block m-x-auto bg-faded form-width" method="post" action="/registration" style="border-radius:0px 0px 5px 5px">

        <div class="form-group input-group" >
        </div>
        <legend class="m-b-1 text-xs-center">Registrierung</legend>
        <div class="form-group input-group">
 <span class="has-float-label">
 <input class="form-control" id="first" type="text" placeholder="Name" name="name"/>
 <label for="first">Name</label>
 </span>
            <span class="has-float-label">
 <input class="form-control" id="last" type="text" placeholder="Nachname" name="surname"/>
 <label for="last">Nachname</label>
 </span>
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">@</span>
            <span class="has-float-label">
 <input class="form-control" id="email" type="email" placeholder="name@example.com" name="email"/>
 <label for="email">E-mail</label>
 </span>
        </div>
        <div class="form-group has-float-label">
            <input class="form-control" id="password" type="password" placeholder="••••••••" name="password1"/>
            <label for="password">Passwort</label>
        </div>
        <div class="form-group has-float-label">
            <input class="form-control" id="password1" type="password" placeholder="••••••••" name="password2"/>
            <label for="password1" style="font-size:18px ">Das Passwort nochmal</label>
        </div>
<div class="form-group has-float-label">
    <a href="/forgot-password">Passwort vergessen?</a>
        </div>
<!--        <a style="width: 100%; text-align: center; display: block;margin-bottom: 20px" href="">Забыли пароль</a>-->
        <!--        <div class="form-group has-float-label">-->
        <!--            <select class="form-control custom-select" id="country">-->
        <!--                <option selected>Россия</option>-->
        <!--                <option>Казахстан</option>-->
        <!--                <option>Белоруссия</option>-->
        <!--            </select>-->
        <!--            <label for="country">Страна</label>-->
        <!--        </div>-->
        <!--        <div class="form-group">-->
        <!--            <label class="custom-control custom-checkbox">-->
        <!--                <input class="custom-control-input" type="checkbox"/>-->
        <!--                <span class="custom-control-indicator"></span>-->
        <!--                <span class="custom-control-description">Получать новости</span>-->
        <!--            </label>-->
        <!--        </div>-->


        <div class="text-xs-center">
            <button class="btn btn-block btn-primary" type="submit" name="registration_form">Registrierung</button>
        </div>
    </form>
</div>


</body>
</html>