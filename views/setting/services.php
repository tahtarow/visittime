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

                .setting-services{

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
            </style>


            <section>
            </section>

            <div class="container grid-2 setting-services">
                <div class=" bg-style1 " style="padding-bottom:50px">
                    <div class="pop " id="pop-new-category" >
                        <div class="background"></div>
                        <div class="content">
                            <div class="board-centr" >
                                <div  style="padding: 5px;">
                                    <div class=" bg-style1">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div style="width: 100%;text-align: right;cursor:pointer;font-weight: bold;font-size: 20px"><span onclick="$('#pop-new-category').toggle()">X</span></div>
                                            <h2>Создание организации</h2>

                                            <span>Адрес</span>
                                            <div class="col-12"><input type="text" name="address" required="" minlength="3"></div>
                                            <span>Телефон</span><br>
                                            <span style="color:darkgray">(необязательное поле)</span>
                                            <div class="col-12"><input type="number" name="phone" minlength="3"></div>
                                            <span>Email</span><br>
                                            <span style="color:darkgray">(необязательное поле)</span>
                                            <div class="col-12"><input type="text" name="email" minlength="3"></div>
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
                    </div>
                    <div class="pop " id="pop-new-servise" >
                        <div class="background"></div>
                        <div class="content">
                            <div class="board-centr" >
                                <div  style="padding: 5px;">
                                    <div class=" bg-style1">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div style="width: 100%;text-align: right;cursor:pointer;font-weight: bold;font-size: 20px"><span onclick="$('#pop-new-servise').toggle()">X</span></div>
                                            <h2>Новая услуга</h2>

                                            <span>Адрес</span>
                                            <div class="col-12"><input type="text" name="address" required="" minlength="3"></div>
                                            <span>Телефон</span><br>
                                            <span style="color:darkgray">(необязательное поле)</span>
                                            <div class="col-12"><input type="number" name="phone" minlength="3"></div>
                                            <span>Email</span><br>
                                            <span style="color:darkgray">(необязательное поле)</span>
                                            <div class="col-12"><input type="text" name="email" minlength="3"></div>
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
                    </div>
                    <h3>Список услуг</h3>
                    <div>
                            <div class="btn btn-success" onclick="$('#pop-new-servise').toggle()">+ Услуга</div>
                            <div class="btn btn-success" onclick="$('#pop-new-category').toggle()">+ Категория</div>
                    </div>


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


                </div>

            </div>


        </div>
    </div>
