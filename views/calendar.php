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
    <div id="main" style="min-height: 1500px">
        <div class="inner">


            <style>a {
                    border-bottom: none;
                }</style>

            <section>
                <!--                <div class=' my-container main-menu1' style="margin: 20px 0  -20px 0">-->
                <!--                    <div class=' menu1 bg1 '>-->
                <!--                        <ul>-->
                <!--                            <li><a href="">sdfsa</a></li>-->
                <!--                            <li><a href="">sdfsa</a></li>-->
                <!--                            <li><a href="">sdfsa</a></li>-->
                <!--                            <li><a href="">sdfsa</a></li>-->
                <!--                        </ul>-->
                <!--                    </div>-->
                <!--                </div>-->


                <? if (isset($user->data['networks']) and !empty($user->data['networks'])) { ?>
                    <!--                --><? // if (false) { ?>
                    <div class=' my-container bg-style1 container' style=" ;margin-bottom: 10px">
                        <div class="row align-content-md-start">
                            <div class="col-sm-12 col-md-<? if (!empty($spots)) {
                                echo '6';
                            } else {
                                echo '12';
                            } ?> d-lg-inline-flex">
                                <span style="padding-top:6px;padding-right: 5px"><?= localisation::txt('Выбрать организацию') ?></span>

                                <select onchange="top.location=this.value" onchange="top.location=this.value"
                                        style="width: 95%">
                                    <option value="/calendar?year=<?= ($_GET['year']) ?>&month=<?= $_GET['month'] ?>&spot=<?= $_GET['spot'] ?>&network=all">
                                        <?= localisation::txt('Все') ?>
                                    </option>
                                    <? foreach ($user->data['networks'] as $network) { ?>
                                        <option value="/calendar?year=<?= ($_GET['year']) ?>&month=<?= $_GET['month'] ?>&spot=<?= $_GET['spot'] ?>&network=<?= $network['id'] ?>"
                                            <? if ($network['id'] == $_GET['network']) echo ' selected ' ?>
                                        ><?= $network['name'] ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 d-lg-inline-flex">
                                <? if (!empty($spots)) { ?>
                                    <span class=' ' style="padding-top:6px">Select spot</span>
                                    <select onchange="top.location=this.value" onchange="top.location=this.value"
                                            style="width: 95%">
                                        <option
                                                value="/calendar?year=<?= ($_GET['year']) ?>&month=<?= $_GET['month'] ?>&network=<?= $_GET['network'] ?>&spot=all"
                                            <? if ($_GET['spot'] == 'all') echo 'selected' ?> ><?= localisation::txt('Все') ?>
                                        </option>

                                        <? if (!empty($spots)) { ?>
                                            <? foreach ($spots as $spot) { ?>
                                                <option value="/calendar?year=<?= ($_GET['year']) ?>&month=<?= $_GET['month'] ?>&network=<?= $_GET['network'] ?>&spot=<?= $spot['id'] ?>"
                                                    <? if (isset($spot['id']) and $spot['id'] == $_GET['spot']) echo ' selected ' ?>
                                                >
                                                    <?= $spot['address'] ?>
                                                </option>
                                            <? } ?>
                                        <? } ?>
                                    </select>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                <? } else { ?>
                    <div class=' my-container bg-style1 container' style=" ;margin-bottom: 10px">
                        <div class="col-sm-12 col-md-12 d-lg-inline-flex">
                            <span class=' ' style="padding-top:6px;padding-right: 5px">Select spot</span>
                            <select onchange="top.location=this.value" onchange="top.location=this.value"
                                    style="width: 95%">
                                <option
                                        value="/calendar?year=<?= ($_GET['year']) ?>&month=<?= $_GET['month'] ?>&network=<?= $_GET['network'] ?>&spot=all"
                                    <? if ($_GET['spot'] == 'all') echo 'selected' ?> ><?= localisation::txt('Все') ?>
                                </option>

                                <? if (!empty($spots)) { ?>
                                    <? foreach ($spots as $spot) { ?>
                                        <option value="/calendar?year=<?= ($_GET['year']) ?>&month=<?= $_GET['month'] ?>&network=<?= $_GET['network'] ?>&spot=<?= $spot['id'] ?>"
                                            <? if ($spot['id'] == $_GET['spot']) echo ' selected ' ?>
                                        >
                                            <?= $spot['address'] ?>
                                        </option>
                                    <? } ?>
                                <? } ?>
                            </select>
                        </div>
                    </div>
                <? } ?>

                <div class=' my-container'>
                    <div class=' big-calendar bg1'>
                        <div class=' calendar-head'>
                            <div class="buttons-container">
                                <a href="/calendar?year=<?= ($_GET['month'] == 1 ? $_GET['year'] - 1 : $_GET['year']) ?>&month=<?= ($_GET['month'] == 1 ? 12 : $_GET['month'] - 1) ?>&network=<?= $_GET['network'] ?>&spot=<?= $_GET['spot'] ?>">
                                    <div class=' big-dark-btn-arrow dark_hover circle-btn'><</div>
                                </a>
                                <div class=' big-dark-btn month'><?= $month_names[$_GET['month'] - 1]['name_' . localisation::$lang] ?> <?= $_GET['year'] ?></div>
                                <a href="/calendar?year=<?= ($_GET['month'] == 12 ? $_GET['year'] + 1 : $_GET['year']) ?>&month=<?= ($_GET['month'] == 12 ? 1 : $_GET['month'] + 1) ?>&network=<?= $_GET['network'] ?>&spot=<?= $_GET['spot'] ?>">
                                    <div class=' big-dark-btn-arrow dark_hover circle-btn'>></div>
                                </a>
                            </div>
                            <div class=' float-off'></div>
                            <div class=' week'>
                                <? foreach ($days_names as $day) { ?>
                                    <div class=' day-name'>
                                        <div>
                                            <span class="mini"><?= $day['name_short_' . localisation::$lang] ?></span><span
                                                    class="full"><?= $day['name_' . localisation::$lang] ?></span></div>
                                    </div>
                                <? } ?>

                            </div>
                            <?
                            $day_on_week = 1;

                            ?>

                            <!--                            --><? // for ($i = 0; $i <= $quantity_days_in_last_month_on_calendar; $i++) {
                            //                                if ($day_on_week == 1) {
                            //                                    echo "<div class=' week hided-week'>";
                            //                                }?>
                            <!--                                <div class='day ' style="background-color: #b2b2b2; "><a href="/">-->
                            <!--                                        <div class=' head'>-->
                            <!--                                            <div class=' number'>-->
                            <? //= $first_day_on_calendar + $i ?><!--</div>-->
                            <!--                                            <div class=' message'>NEW(1)</div>-->
                            <!--                                        </div>-->
                            <!--                                        <div class='events'>Events: <span class="count">1</span></div>-->
                            <!--                                        <span class="mobile-events"><span class="count">9</span><span-->
                            <!--                                                    class="new"></span></span>-->
                            <!--                                    </a></div>-->
                            <!--                            --><? //
                            //                                if ($day_on_week == 7) {
                            //                                    echo "</div>";
                            //                                    $day_on_week = 0;
                            //                                }
                            //                                $day_on_week++;
                            //                            }?>
                            <?

                            foreach ($calendar_page as $day) {
                                if ($day_on_week == 1) {
                                    if (
                                        ($day['month'] == Calendar::get_current_month()) and
                                        (
                                            ($current_day + 7 < $day['day'])
                                            or
                                            ($current_day - 6 > $day['day'])
                                        )
                                    ) {
                                        $hide = '';
                                        if (!isset($_COOKIE['calendar_state'])) {
                                            $hide = "style='display: none'";
                                        } elseif ($_COOKIE['calendar_state'] == 0) {
                                            $hide = "style='display: none'";
                                        }


                                        echo "<div class=' week hided-week' " . $hide . ">";
                                    } else {
                                        echo "<div class=' week '>";
                                    }
                                } ?>
                                <div class=' day
<? if ($day['month'] > $_GET['month'] or $day['month'] < $_GET['month']) echo ' another-month-day '; ?>
<? if ($day['day'] == $current_day and $day['month'] == Calendar::get_current_month() and $_GET['year'] == Calendar::get_current_year()) echo ' current_day ' ?>
<? if ($day['day'] == $_GET['day']) echo ' selected-day ' ?>
'>
                                    <a href="/calendar?year=<?= $day['year'] ?>&month=<?= $day['month'] ?>&day=<?= $day['day'] ?>&spot=<?= $_GET['spot'] ?>">
                                        <div class=' head'>
                                            <div class=' number '><?= $day['day'] ?></div>
                                            <!--                                            <div class=' message'>NEW(1)</div>-->
                                        </div>

                                        <? if ($day['count_records'] > 0) { ?>
                                            <div class='events'>Events: <span
                                                        class="count"><?= $day['count_records'] ?></span></div>
                                            <span class="mobile-events"><span
                                                        class="count"><?= $day['count_records'] ?></span><span
                                                        class="new"></span></span>
                                        <? } else { ?>
                                            <br>
                                        <? } ?>
                                    </a></div>
                                <?
                                if ($day_on_week == 7) {
                                    echo "</div>";
                                    $day_on_week = 0;
                                }
                                $day_on_week++;
                            } ?>

                        </div>
                        <div class="block-gcenter circle-bg1 bg-color-light1" style="margin-top:-10px;z-index: 2">
                            <div id="expand-calendar" class="big-dark-btn-arrow circle-btn dark_hover block-gcenter"
                                 style="text-align: center;margin-top:5px"> &#8661;
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class=' my-container ' style=" align-items: flex-start; margin: ;0">
                <div class='day-plan  bg-style1'>
                    <div class="block-gcenter circle-bg1 bg-color-light1" style="margin-top:-30px;z-index: 2">
                        <div id="expand-time" class="big-dark-btn-arrow circle-btn dark_hover block-gcenter"
                             style="text-align: center;margin-top:5px"> &#8661;
                        </div>
                    </div>
                    <?
                    for ($i = 0; $i <= 24; $i++) {

                        $hided_time = '';
                        $hided_bg = '';
                        if ($i < $min_time) {
                            $hided_time = 'hided-time ';
                            $hided_bg = 'bg-info';
                        }
                        if ($i > $max_time) {
                            $hided_time = 'hided-time ';
                            $hided_bg = 'bg-info';
                        }

                        $hide = '';
                        if (isset($_COOKIE['day_plan_state'])) {
                            if (!empty($hided_time) and $_COOKIE['day_plan_state'] == 0) $hide = "style='display: none'";
                        }

                        $mktime1 = mktime($i, 00, 00, $_GET['month'], $_GET['day'], $_GET['year']);
                        $mktime2 = mktime($i, 30, 00, $_GET['month'], $_GET['day'], $_GET['year']);
                        $mktime3 = mktime($i + 1, 00, 00, $_GET['month'], $_GET['day'], $_GET['year']);

                        if ($i < 10) $i = '0' . $i;
                        $detect = 0;
                        foreach ($records as $rec) {
                            if ($rec['mktime'] >= $mktime1 and $rec['mktime'] < $mktime2) {
                                ?>
                                <div class="hour <?= $hided_time ?> <? if ($i == $_GET['hour'] and $_GET['min'] < 30) echo 'selected-hour' ?> " <?= $hide ?>>
                                    <a href="/calendar?year=<?= $_GET['year'] ?>&month=<?= $_GET['month'] ?>&day=<?= $_GET['day'] ?>&hour=<?= $i ?>&min=00&spot=<?= $_GET['spot'] ?>&rec=<?= $rec['id'] ?>"
                                       class="item "
                                       style="width: 100%;height:30px;display: block">
                                        <div class="time <?= $hided_bg ?>"><? if ($detect === 0) { ?><?= $i ?>:00<? } ?></div>
                                        <div class="rec"><?= $rec['procedure_id'] ?></div>
                                        <span class="cost"><?= $rec['cost'] . ' ' . $rec['currency_id'] ?></span>
                                    </a>
                                </div>
                                <? $detect = 1; ?>
                            <? } ?>
                        <? } ?>
                        <? if ($detect === 0) { ?>
                            <div class="hour <?= $hided_time ?> <? if ($i == $_GET['hour'] and $_GET['min'] < 30) echo 'selected-hour' ?> " <?= $hide ?>>
                                <a href="/calendar?year=<?= $_GET['year'] ?>&month=<?= $_GET['month'] ?>&day=<?= $_GET['day'] ?>&hour=<?= $i ?>&min=00&spot=<?= $_GET['spot'] ?>"
                                   class="item "
                                   style="width: 100%;height:30px;display: block">
                                    <div class="time <?= $hided_bg ?>"><?= $i ?>:00</div>
                                    <div class="rec"></div>
                                    <span class="cost"></span>
                                </a>
                            </div>
                        <? } ?>

                        <? foreach ($records as $rec) {
                            if ($rec['mktime'] >= $mktime2 and $rec['mktime'] < $mktime3) {
                                ?>
                                <div class="hour  <?= $hided_time ?> <? if ($i == $_GET['hour'] and $_GET['min'] >= 30) echo 'selected-hour' ?> " <?= $hide ?>>
                                    <a href="/calendar?year=<?= $_GET['year'] ?>&month=<?= $_GET['month'] ?>&day=<?= $_GET['day'] ?>&hour=<?= $i ?>&min=30&spot=<?= $_GET['spot'] ?>&rec=<?= $rec['id'] ?>"
                                       class="item"
                                       style="width: 100%;height:30px;display: block">
                                        <div class="time <?= $hided_bg ?>"><? if ($detect === 0) { ?><?= $i ?>:30<? } ?></div>
                                        <div class="rec"><?= $rec['procedure_id'] ?></div>
                                        <span class="cost"><?= $rec['cost'] . ' ' . $rec['currency_id'] ?></span>
                                    </a>
                                </div>
                                <? $detect = 1; ?>
                            <? } ?>
                        <? } ?>
                        <? if ($detect === 0) { ?>
                            <div class="hour  <?= $hided_time ?> <? if ($i == $_GET['hour'] and $_GET['min'] >= 30) echo 'selected-hour' ?> " <?= $hide ?>>
                                <a href="/calendar?year=<?= $_GET['year'] ?>&month=<?= $_GET['month'] ?>&day=<?= $_GET['day'] ?>&hour=<?= $i ?>&min=30&spot=<?= $_GET['spot'] ?>"
                                   class="item"
                                   style="width: 100%;height:30px;display: block">
                                    <div class="time <?= $hided_bg ?>"><?= $i ?>:30</div>
                                    <div class="rec"></div>
                                    <span class="cost"></span>
                                </a>
                            </div>
                        <? } ?>
                    <? } ?>


                </div>


                <div class='rec-info  '>
                    <form action="" method="post">
                        <div class="bg-style1 text-light bg-success">
                            <div class="col-12">
                                <div class="row align-center">
                                    <div class="col-3 selected-time"><?= $_GET['hour'] ?>:<?= $_GET['min'] ?></div>
                                    <div class="col-9 ">
                                        <span><?= localisation::txt('Доступно для записи') ?></span><br><br>
                                    </div>
                                    <div class="col-0 col-sm-3"></div>
                                    <div class="col-12 col-sm-9 ">
                                        <button class="btn btn-danger"
                                                name="lock-hour"><?= localisation::txt('Заблокировать') ?></button>
                                    </div>

                                </div>
                            </div>
                            <br>
                        </div>


                        <div class="bg-style1" style="margin-top:10px">
                            <ul class="nav nav-tabs" style="border-bottom: 2px dashed gray;padding-bottom:2px">
                                <?
                                $active_n = '';
                                $active_c = '';
                                if (isset($record)) {
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#change">Редактировать</a>
                                    </li>
                                    <?
                                    $active_c = 'show active';
                                } else {
                                    $active_n = 'show active';
                                } ?>
                                <li class="nav-item">
                                    <a class="nav-link <?= $active_n ?>" data-toggle="tab"
                                       href="#new"><?= localisation::txt('Создать') ?></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade <?= $active_c ?>" id="change">
                                    <div class="bg-style1" style="margin-top:10px">
                                        <span style="padding-bottom:10px">Перенести</span>
                                        <br>
                                        <div class="col-12">
                                            <div class="row ">
                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <div class="form-group  col-10 col-lg-6">
                                                            <input type="date" class="form-control"
                                                                   value="<?= $_GET['year'] ?>-<?= $_GET['month'] ?>-<?= $_GET['day'] ?>">
                                                            <input type="time" class="form-control"
                                                                   value="<?= $current_hour ?>:<?= $current_min ?>">
                                                        </div>
                                                        <div class="col-10 col-lg-6">
                                                            <button class="btn btn-warning btn-lg">Перенести</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-style1" style="margin-top:10px">

                                        <span>Имя</span>
                                        <div class="col-12"><input type="text" name="name"
                                                                   value="<?= $record->data['name'] ?>"></div>
                                        <span>Фамилия</span>
                                        <div class="col-12"><input type="text" name="surname"
                                                                   value="<?= $record->data['surname'] ?>"></div>
                                        <span>Тел.</span>
                                        <div class="col-12"><input type="number" name="phone"
                                                                   value="<?= $record->data['phone'] ?>"></div>

                                        <span>Услуга</span>
                                        <div class="col-12">
                                            <select name="procedure" id="">
                                                <option value="123">стрижка</option>
                                                <option value="123">стрижка</option>
                                                <option value="123">стрижка</option>
                                                <option value="123">стрижка</option>
                                                <option value="123">стрижка</option>
                                                <option value="123">стрижка</option>
                                            </select>
                                        </div>
                                        <span>дополнительно</span>
                                        <div class="col-12"><textarea rows="4"><?= $record->data['extra'] ?></textarea>
                                        </div>
                                        <span>цена</span>
                                        <div class="col-12">
                                            <input type="number" name="cost" style="width: 80px;float: left"
                                                   value="<?= $record->data['cost'] ?>">
                                            <select name="currency" id="" style="width: 120px;float: left">
                                                <option value="123">eur</option>
                                                <option value="123">eur</option>
                                                <option value="123">eur</option>
                                                <option value="123">eur</option>
                                                <option value="123">eur</option>
                                                <option value="123">eur</option>
                                            </select>
                                        </div>
                                        <div class="float-off"></div>
                                        <br>

                                        <input type="hidden" name="id" value="<?= $record->data['id'] ?>">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-warning btn-lg" name="change">
                                                Изменить
                                            </button>
                                            <button type="submit" class="btn btn-danger btn-lg" name="delete">Удалить
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade <?= $active_n ?>" id="new" style="padding-top:30px">

                                    <? if ($_GET['spot'] == 'all') { ?>
                                        <h3 style="text-align: center"><?= localisation::txt('Для создания новой записи нужно выбрать адрес заведения') ?></h3>
                                    <? } else { ?>

                                        <span>Имя</span>
                                        <div class="col-12"><input type="text" name="name"></div>
                                        <span>Фамилия</span>
                                        <div class="col-12"><input type="text" name="surname"></div>
                                        <span>Тел.</span>
                                        <div class="col-12"><input type="number" name="phone"></div>
                                        <span>Услуга</span>
                                        <div class="col-12">
                                            <select name="procedure" id="">
                                                <option value="123">стрижка</option>
                                                <option value="123">стрижка</option>
                                                <option value="123">стрижка</option>
                                                <option value="123">стрижка</option>
                                                <option value="123">стрижка</option>
                                                <option value="123">стрижка</option>
                                            </select>
                                        </div>
                                        <span>дополнительно</span>
                                        <div class="col-12"><textarea name="extra" rows="4"
                                                                      placeholder="текст"></textarea>
                                        </div>
                                        <span>цена</span>
                                        <div class="col-12">
                                            <input type="number" name="cost" style="width: 80px;float: left">
                                            <select name="currency" style="width: 120px;float: left">
                                                <option value="123">eur</option>
                                                <option value="123">eur</option>
                                                <option value="123">eur</option>
                                                <option value="123">eur</option>
                                                <option value="123">eur</option>
                                                <option value="123">eur</option>
                                            </select>
                                        </div>
                                        <div class="float-off"></div>
                                        <br>
                                        <? if (isset($_GET['spot']) and $_GET['spot'] <> "all") { ?>
                                            <input type="hidden" name="spot_id" value="<?= $_GET['spot'] ?>">
                                        <? } ?>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success btn-lg" name="new_record">
                                                Добавить
                                            </button>
                                        </div>
                                    <? } ?>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

