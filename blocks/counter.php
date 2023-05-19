<?php
    include "functions/cookies.php";
    set_cookies();
    $counter = get_cookie();
    $counter_site = $_COOKIE['COUNTER_CITIES'] + $_COOKIE['COUNTER_USERS'] + $_COOKIE['COUNTER_SEARCH'];
?>
<div class="post">
    <div class="postheader"> </div>
    <div class="postcontent">
        <h2>Общее количество загрузок страницы = <b><?=$counter_site?></b></h2>
    </div>
    <div class="postbottom">
        <h3 style=" margin-left: 25px; ">Вы посещали эту страницу <b><?=$counter?></b> раз</h3>
    </div>
</div>
<?php
    counter();
?>


