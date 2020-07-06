<?include_once VIEWS.'/includes/header.php'?>
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
                    <form action="" method="post" enctype="multipart/form-data" >
                        <a href="/setting" class="btn btn-outline-info  " ><?=localisation::txt('Назад')?></a>
                        <h2><?=localisation::txt('Персонал')?></h2>
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

                        <a href="/staff/new" class="btn btn-success " >Добавить сотрудника</a><BR>



                        <?
                        foreach ($user->data['networks'] as $network) {
                            if (!empty($network['staff'])){?>
                                <div class="" style="margin-bottom:  30px;padding: 0 0 10px 0;">
                                    <div style="margin-top: 10px">
                                        <a href="/setting/network?id=29" style="color:black;font-weight: bold;font-size: 20px"><span class="organisation_name"><?=$network['name']?></span> <span style="color: #f56a6a">🛠</span></a><br>
                                    </div>
                                    <div class="bg-style2" style="padding:5px 0px;background-color:white ">
                                    <?foreach ($network['staff'] as $staff) {?>
                                        <div style="padding:5px 10px">
                                            <?if($staff['name'].$staff['surname']==''){?>
                                            <a href="/setting/spot?id=2" style="font-size: 20px;color:gray"><?=$staff['email']?></a>
                                        <?}else{?>
                                                <a href="/setting/spot?id=2" style="font-size: 20px;"><?=$staff['name'].' '.$staff['surname']?></a>
                                            <?}?>
                                        </div>
                                   <?}?>
                                    </div>
                                    <?if(isset($network['spots'][0])){?>
                                    <div class="bg-style2" style="padding:5px 10px;background-color:white ">
                                    <?foreach ($network['spots'] as &$spot){?>
                                        <?if(isset($spot['staff'][0])){;?>
                                        <span  style="color:black;font-weight: bold;font-size: 15px;font-style: italic"><span class="organisation_name"><?=$spot['address']?></span> </span><br>
                                            <div class="bg-style2" style="padding:5px 10px;background-color:white ">
                                        <?foreach ($spot['staff'] as $staff){?>
                                                <div style="padding:5px 10px">
                                                    <a href="/setting/spot?id=1" style="font-size: 20px;"><?=($staff['name'].$staff['surname']==''?$staff['email']:$staff['name'].' '.$staff['surname'])?></a>
                                                </div>
                                         <?}?>
                                            </div>
                                        <?}?>
                                    <?}?>
                                            </div>
                                        <?}?>
                                </div>

                            <?}
                        }
                        ?>

                    </form>
                </div>
            </div>


        </div>
    </div>
    <?include_once VIEWS.'/includes/footer.php'?>
