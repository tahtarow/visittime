<?
function show_categories($data, $padding = '')
{
    foreach ($data as $item) { ?>
        <option value="<?= $item['id'] ?>"><?= $padding . $item['name'] ?></option>
        <?
        if (!empty($item['childs'])) {
            $padding1 = $padding . ' | ';
            show_categories($item['childs'], $padding1);
        }
    }

} ?>
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
<body class="">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">


            <style>
                a {
                    border-bottom: none;
                }

                .setting-services {

                }

                .setting-services .category {
                    /*padding: 0 0 20px 0;*/
                }

                .setting-services .item-wraper {
                    border-left: 1px dashed black;
                    padding-left: 10px;
                    margin-left: 10px;
                }

                .setting-services .item-wraper .item {
                    font-size: 18px;
                    padding-top: 10px;
                    display: block;
                }

                .pop .content {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                }

                .background {
                    width: 100%;
                    height: 100%;
                    background-color: #000000;
                    opacity: 40%;
                    position: absolute;
                }

                .pop {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    margin: -10px 0 0 -10px;
                    border-radius: 5px;
                    display: none;
                }

                .pop .board-centr {
                    position: absolute;
                    width: 100%;
                    /*left: 50%;*/
                    top: 50%;
                    transform: translate(-0%, -50%);
                }

                .bg-style1 {
                    position: relative;
                }

                .pop .preloader {
                    display: none;
                    width: 20px;
                }

                .pop .success-message {
                    font-weight: bold;
                    font-size: 18px;
                    display: none;
                }

                .pop .button-close {
                    width: 100%;
                    text-align: right;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 20px;
                }

                .pop .error-message .message,
                .pop .success-message .message {
                    padding: 5px;
                }

            </style>


            <section>
            </section>

            <div class="container grid-2 setting-services">
                <div class=" bg-style1 " style="padding-bottom:50px">

                    <!--region new categofy form-->
                    <form id="new_category_form" class="js-ajax-form" action="" method="post"
                          enctype="multipart/form-data">
                        <div class="pop " id="pop-new-category">
                            <div class="pop-background background"></div>
                            <div class="content">
                                <div class="board-centr">
                                    <div style="padding: 5px;">
                                        <div class=" bg-style1">
                                            <div class="button-close">
                                                <span onclick="$('#pop-new-category').toggle()">X</span></div>
                                            <h2><?= localisation::txt('Новая категория') ?></h2>
                                            <div class="preloader"><img src="/views/img/loader.gif" alt=""></div>
                                            <div class="alert-success success-message">
                                                <div class="badge-success message"><?= localisation::txt('Категория создана') ?></div>
                                            </div>
                                            <div class="alert-danger error-message" style="display: none">
                                                <div class="badge-danger message"><?= localisation::txt('Ошибка создания категории') ?></div>
                                            </div>

                                            <span><?= localisation::txt('Название категории') ?></span>
                                            <div class="col-12"><input type="text" name="category_name" required=""
                                                                       minlength="3"></div>
                                            <span><?= localisation::txt('Родительская категория') ?></span>
                                            <div class="col-12">
                                                <select name="parent_category" id="">
                                                    <option value=""><?= localisation::txt('Главная категория') ?></option>
                                                    <? show_categories($services->categories); ?>
                                                </select>
                                            </div>

                                            <span><?= localisation::txt('Разместить') ?></span>
                                            <div class="col-12">
                                                <select name="position" id="">
                                                    <option value="start"><?= localisation::txt('В конце') ?></option>
                                                    <option value="end"><?= localisation::txt('В начале') ?></option>
                                                    <option value="" disabled
                                                            style="color: #b3b2b2"><?= localisation::txt('Разместить после') ?></option>
                                                    <option value="123">стрижка</option>
                                                    <option value="123">стрижка</option>
                                                    <option value="123">стрижка</option>
                                                </select>
                                            </div>
                                            <div class="col-6 col-12-small">
                                                <input type="checkbox" id="demo-human" name="category_active"
                                                       checked="">
                                                <label for="demo-human"><?= localisation::txt('Активна') ?></label>
                                            </div>

                                            <input type="hidden" name="form" value="1">
                                            <button class="btn btn-success mt-4 "
                                                    name="form"><?= localisation::txt('Добавить категорию') ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--endregion-->

                    <!--region new service form-->
                    <form class="js-ajax-form" action="" method="post" enctype="multipart/form-data">
                        <div class="pop " id="pop-new-servise">
                            <div class="background pop-background"></div>
                            <div class="content">
                                <div class="">
                                    <div style="padding: 5px;">
                                        <div class=" bg-style1">
                                            <div style="width: 100%;text-align: right;cursor:pointer;font-weight: bold;font-size: 20px">
                                                <span onclick="$('#pop-new-servise').toggle()">X</span></div>
                                            <h2><?= localisation::txt('Новая услуга') ?></h2>
                                            <span><?= localisation::txt('Название услуги') ?></span>
                                            <div class="col-12"><input type="text" name="service_name" required=""
                                                                       minlength="1"></div>

                                            <span><?= localisation::txt('Категория') ?></span>
                                            <div class="col-12">
                                                <select name="procedure" id="">
                                                    <option value="123"><?= localisation::txt('Без категории') ?></option>
                                                    <? show_categories($services->categories); ?>
                                                </select>
                                            </div>

                                            <span><?= localisation::txt('Разместить') ?></span>
                                            <div class="col-12">
                                                <select name="procedure" id="">
                                                    <option value="123"><?= localisation::txt('В конце') ?></option>
                                                    <option value="123"><?= localisation::txt('В начале') ?></option>
                                                    <option value="123" disabled
                                                            style="color: #b3b2b2"><?= localisation::txt('Разместить после') ?></option>
                                                    <option value="123">стрижка</option>
                                                    <option value="123">стрижка</option>
                                                    <option value="123">стрижка</option>
                                                </select>
                                            </div>


                                        </div>

                                        <div class=" bg-style1" style="margin-top:10px">

                                            <h2><?= localisation::txt('Новая услуга') ?></h2>
                                            <span><?= localisation::txt('Название услуги') ?></span>
                                            <div class="col-12"><input type="text" name="service_name" required=""
                                                                       minlength="1"></div>

                                            <span><?= localisation::txt('Категория') ?></span>
                                            <div class="col-12">
                                                <select name="procedure" id="">
                                                    <option value="123"><?= localisation::txt('Без категории') ?></option>
                                                    <option value="123">стрижка</option>
                                                    <option value="123">стрижка</option>
                                                    <option value="123">стрижка</option>
                                                    <option value="123">стрижка</option>
                                                    <option value="123">стрижка</option>
                                                </select>
                                            </div>

                                            <span><?= localisation::txt('Разместить') ?></span>
                                            <div class="col-12">
                                                <select name="procedure" id="">
                                                    <option value="123"><?= localisation::txt('В конце') ?></option>
                                                    <option value="123"><?= localisation::txt('В начале') ?></option>
                                                    <option value="123" disabled
                                                            style="color: #b3b2b2"><?= localisation::txt('Разместить после') ?></option>
                                                    <option value="123">стрижка</option>
                                                    <option value="123">стрижка</option>
                                                    <option value="123">стрижка</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="form">
                                            <button class="btn btn-success mt-4 "
                                                    id="new_service_button"
                                                    name="new_service_form"><?= localisation::txt('Добавить услугу') ?></button>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                    <!--endregion-->

                    <!--region cervices list-->
                    <h3>Список услуг</h3>
                    <div>
                        <div class="btn btn-success" onclick="$('#pop-new-servise').toggle()">+ Услуга</div>
                        <div class="btn btn-success" onclick="$('#pop-new-category').toggle()">+ Категория</div>
                    </div>

                    <? foreach ($services->categories as $item) { ?>

                        <? if (isset($item['is_category'])) { ?>
                            <div class="category" style="">
                                <div style="margin-top: 10px">
                                    <a href="/setting/network?id=29"
                                       style="color:black;font-weight: bold;font-size: 20px"><span
                                                class="organisation_name"><?= $item['name'] ?></span> </a>
                                </div>

                            </div>
                        <? } ?>
                    <? } ?>

                    <div class="category" style="">
                        <div style="margin-top: 10px">
                            <a href="/setting/network?id=29" style="color:black;font-weight: bold;font-size: 20px"><span
                                        class="organisation_name">Trend Style</span> </a>
                        </div>
                        <div class="item-wraper">
                            <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                            <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                            <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                            <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                            <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                        </div>
                    </div>
                    <div class="category" style="">
                        <div style="margin-top: 10px">
                            <a href="/setting/network?id=29" style="color:black;font-weight: bold;font-size: 20px"><span
                                        class="organisation_name">Trend Style</span> </a>
                        </div>

                        <div class="item-wraper">

                            <div class="category" style="">
                                <div style="margin-top: 10px">
                                    <a href="/setting/network?id=29"
                                       style="color:black;font-weight: bold;font-size: 20px"><span
                                                class="organisation_name">Trend Style</span> </a>
                                </div>
                                <div class="item-wraper">
                                    <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                                    <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                                    <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                                    <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                                    <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                                </div>
                            </div>

                            <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                            <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                            <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                            <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                            <a class="item" href="/setting/spot?id=1">фывафы фыв фыва ф123</a>
                        </div>
                    </div>
                    <!--endregion-->


                </div>

            </div>


        </div>
    </div>
    <script>


        /*-------------------------------------------------------------------------------
	  Ajax Form
	-------------------------------------------------------------------------------*/


        $('.js-ajax-form').submit(function () {
            form = $(this);
            form_data = $(this).serialize();
            $.ajax({
                url: '/setting/services',
                type: 'post',
                data: form_data, // можно строкой, а можно, например, так: $('input[type="text"], input[type="radio"]:checked, input[type="checkbox"]:checked, select, textarea')
                dataType: 'json',

                beforeSend: function () {
                    // $('#sendajax').button('loading');
                    form.find(".preloader").show();

                },
                complete: function () {
                    form.find(".preloader").hide();

                },
                success: function (answer) {
                    if (answer.success === '1') {
                        form.find(".success-message").show();
                        location.href = location.href;
                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    form.find(".error-message").show();
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
            return false;
        });

    </script>