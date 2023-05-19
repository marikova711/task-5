<?php
include "functions/db.php";
require_once "blocks/header.php";
?>
    <div id="content">
        <div id="left">
<?php
    include_once "blocks/counter.php";
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    switch ($page) {
        case 1:
            require_once "cities.php";
            break;
        case 2:
            require_once "users.php";
            break;
        case 3:
            require_once "search.php";
            break;
    }
?>
        </div>
<?php
    require_once "blocks/sidebar.php";
?>
        <div class="clear"></div>
    </div>
<?php
require_once "blocks/footer.php";
?>

