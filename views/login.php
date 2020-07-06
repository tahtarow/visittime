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
    body {
        background-image: url(/views/img/77.png); /* Путь к фоновому рисунку */
        background-position: left bottom; /* Положение фона */
        background-repeat: repeat; /* Повторяем фон по горизонтали */
    }
</style>
<body>
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

<div class="p-x-1 p-y-2" style="padding-bottom:0">
    <form class="card card-block m-x-auto bg-faded form-width">
        <a href="/">
            <legend class="m-b-1 text-xs-center"
                    style="background-color:#ffffff;;border: 2px dashed #4c4c4c; border-radius: 15px;color:red;font-family: Impact">
                VISIT-TIME
            </legend>
        </a>
        <p style="text-align: center"><?=localisation::txt('Сервис записи клиентов')?></p>
    </form>
</div>


<div class="p-x-1 p-y-1 reg-form">
    <form action="/registration" method="post">
        <div class="form-group input-group header-buttons m-x-auto bg-faded">
            <button type="reset" class="has-float-label button btn  btn-success"><?=localisation::txt('Войти')?></button>
            <button class="has-float-label button btn btn-outline-info" ><?=localisation::txt('Зарегистрироваться')?></button>
        </div>
    </form>
    <form class="card card-block m-x-auto bg-faded form-width" method="post" style="border-radius:0px 0px 5px 5px">

        <div class="form-group input-group">
        </div>
        <legend class="m-b-1 text-xs-center"><?=localisation::txt('Войти')?></legend>
        <div class="form-group input-group">
            <? if (!empty(errors::$list)) {
                if (!isset(errors::$list[1])) {?>
                    <p class="text-danger"><?= errors::$list[0] ?></p>
                <?} else {
                    $i = 0;
                    foreach (errors::$list as $error) {
                        $i++;
                        ?>
                        <p class="text-danger"><?= $i ?>.<?= $error ?></p>
                    <? } ?>
                <? } ?>
            <? } ?>
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">@</span>
            <span class="has-float-label">
 <input class="form-control" id="email" type="email" placeholder="name@example.com" name="login" required
        minlength="3"/>
 <label for="email">E-mail</label>
 </span>
        </div>
        <div class="form-group has-float-label">
            <input class="form-control" id="password" type="password" placeholder="••••••••" name="password" required
                   minlength="3"/>
            <label for="password"><?=localisation::txt('Пароль')?></label>
        </div>
        <div class="form-group has-float-label">
            <a href="/forgot-password"><?=localisation::txt('Забыли пароль?')?></a>
        </div>
        <div class="text-xs-center">
            <button class="btn btn-block btn-primary" type="submit" name="form"><?=localisation::txt('Войти')?></button>
        </div>
    </form>
</div>


</body>
</html>