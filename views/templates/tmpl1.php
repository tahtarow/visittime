<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="/views/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="/views/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <? less(VIEWS . '/css/index.less') ?>

</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" />

<style>
    .form-width {max-width: 25rem;}
    .has-float-label {
        position: relative; }
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
        padding: 0 1px; }
    .has-float-label label::after {
        content: " ";
        display: block;
        position: absolute;
        background: white;
        height: 2px;
        top: 50%;
        left: -.2em;
        right: -.2em;
        z-index: -1; }
    .has-float-label .form-control::-webkit-input-placeholder {
        opacity: 1;
        -webkit-transition: all .2s;
        transition: all .2s; }
    .has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
        opacity: 0; }
    .has-float-label .form-control:placeholder-shown:not(:focus) + label {
        font-size: 150%;
        opacity: .5;
        top: .3em; }

    .input-group .has-float-label {
        display: table-cell; }
    .input-group .has-float-label .form-control {
        border-radius: 0.25rem; }
    .input-group .has-float-label:not(:last-child) .form-control {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0; }
    .input-group .has-float-label:not(:first-child) .form-control {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        margin-left: -1px; }
</style>

<div class="p-x-1 p-y-3">
    <form class="card card-block m-x-auto bg-faded form-width">
        <legend class="m-b-1 text-xs-center"><?=localisation::txt('Регистрация')?></legend>
        <div class="form-group input-group">
 <span class="has-float-label">
 <input class="form-control" id="first" type="text" placeholder="Имя"/>
 <label for="first">Имя</label>
 </span>
            <span class="has-float-label">
 <input class="form-control" id="last" type="text" placeholder="Фамилия"/>
 <label for="last">Фамилия</label>
 </span>
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">@</span>
            <span class="has-float-label">
 <input class="form-control" id="email" type="email" placeholder="name@example.com"/>
 <label for="email">E-mail</label>
 </span>
        </div>
        <div class="form-group has-float-label">
            <input class="form-control" id="password" type="password" placeholder="••••••••"/>
            <label for="password">Пароль</label>
        </div>
        <div class="form-group has-float-label">
            <input class="form-control" id="password" type="password" placeholder="••••••••"/>
            <label for="password">Пароль повторно</label>
        </div>
        <div class="form-group has-float-label">
            <select class="form-control custom-select" id="country">
                <option selected>Россия</option>
                <option>Казахстан</option>
                <option>Белоруссия</option>
            </select>
            <label for="country">Страна</label>
        </div>
        <div class="form-group">
            <label class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox"/>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Получать новости</span>
            </label>
        </div>
        <div class="text-xs-center">
            <button class="btn btn-block btn-primary" type="submit"><?=localisation::txt('Регистрация')?></button>
        </div>
    </form>
</div>




</body>
</html>