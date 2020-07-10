
<div id="sidebar">
    <div class="inner">

        <!-- Menu -->
        <nav id="menu">
            <header class="major">
                <h2><?=localisation::txt('Меню')?></h2>
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
<!--                <select name="" id="">-->
<!--                    <option value="">Название орг1</option>-->
<!--                    <option value="">Название орг1</option>-->
<!--                    <option value="">Название орг1</option>-->
<!--                    <option value="">Название орг1</option>-->
<!--                </select>-->
                <div class="mini-posts">
                    <article>
                        <!--                            <a href="#" class="image"><img src="images/pic08.jpg" alt=""></a>-->
                        <ul>
                            <li><a href="/calendar"><?=localisation::txt('Календарь')?></a></li>
                            <li><a href="/records"><?=localisation::txt('Заявки')?></a></li>
                            <li><a href="/calendar"><?=localisation::txt('Клиенты')?></a></li>
                            <li><a href="/statistic"><?=localisation::txt('Статистика')?></a></li>
                        </ul>
                    </article>
                    <article>
                        <ul>
                            <li><a href="/staff"><?=localisation::txt('Персонал')?></a></li>
                            <li><a href="/setting/services"><?=localisation::txt('Услуги')?></a></li>
                            <li><a href="/setting"><?=localisation::txt('Настройки')?></a></li>
                        </ul>
                    </article>
                    <article>
                        <ul>
                            <li><a href="/"><?=localisation::txt('Профиль')?></a></li>
                            <li><a href="/exit"><?=localisation::txt('Выход')?></a></li>
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
        if ($.cookie('calendar_state') == null) {
            $.cookie('calendar_state', '1', {expires: 365, path: '/'});
        } else {
            if ($.cookie('calendar_state') > 0) {
                $.cookie('calendar_state', '0', {expires: 365, path: '/'});
            } else {
                $.cookie('calendar_state', '1', {expires: 365, path: '/'});
            }
        }
    });
    $("#expand-time").click(function () {
        $(".hided-time").toggle('normal', 'linear');
        if ($.cookie('day_plan_state') == null) {
            $.cookie('day_plan_state', '1', {expires: 365, path: '/'});
        } else {
            if ($.cookie('day_plan_state') > 0) {
                $.cookie('day_plan_state', '0', {expires: 365, path: '/'});
            } else {
                $.cookie('day_plan_state', '1', {expires: 365, path: '/'});
            }
        }
    });


</script>

</html>
<script src="/views/js/jquery.min.js"></script>
<script src="/views/js/browser.min.js"></script>
<script src="/views/js/breakpoints.min.js"></script>
<script src="/views/js/util.js"></script>
<script src="/views/js/main.js"></script>
<script src="/views/lib/function.js"></script>
<script src="/views/lib/jquery.cookie.js"></script>

<script>
    save_scroll();

</script>