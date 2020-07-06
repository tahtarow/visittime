
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

            <section>
            </section>

            <div class="container grid-2 setting">
                    <? if (empty($user->data['networks'])) { ?>
                <div class=" bg-style1 " style="text-align: center">
                <h3><?=localisation::txt('Список Организаций пуст')?></h3>
                        <a href="/network/new">
                            <button class="btn btn-success mt-4">Добавить организацию</button>
                        </a>
                        <br>
                        <br>
                    <? } else {?>
                    <div class=" bg-style1 " >
                        <h3><?=localisation::txt('Список Организаций')?></h3>
                        <div>
                            <a href="/network/new"><button class="btn btn-success">Добавить организацию</button></a>
                        </div>
                    <?foreach ($user->data['networks'] as $network) {
                            ?>

                        <div class="" style="margin-bottom:  30px;padding: 0 0 10px 0;">
                        <div style="margin-top: 10px" >
                        <a href="/setting/network?id=<?=$network['id']?>" style="color:black;font-weight: bold;font-size: 20px"><span class="organisation_name"><?= $network['name'] ?></span> <span style="color: #f56a6a">&#128736;</span></a><br>
                        </div>
                            <? if (!empty($network['spots'])) {?>
                                <div class="bg-style2" style="padding: 10px;background-color:white ">
                                <?foreach ($network['spots'] as $spot) {
                                    ?>
                                    <div style="margin-top: 10px">
                                        <a href="/setting/spot?id=<?=$spot['id']?>" style="font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;<?=$spot['address']?></a>
                                    </div>

                                <?  } ?>
                                <div style="margin-top:10px">
                                    <a href="/setting/spot/new?id_network=<?=$network['id']?>" style="font-size: 18px;color:blue;">&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success">добавить новое заведение</button></a>
                                </div>
                                </div>
                            <? } ?>
                        </div>
                    <? } ?>
                        

                    <? } ?>


                    </div>

            </div>


        </div>
    </div>

