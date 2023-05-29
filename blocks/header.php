<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Тестовое задание Webcompany</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../styles/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../js/jquery-1.1.3.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="../js/jquery.lavalamp.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#1, #2, #3").lavaLamp({
                fx: "backout",
                speed: 700,
                click: function (event, menuItem) {
                    return true;
                }
            });
        });
    </script>
    <link href="../styles/lavalamp.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrap">
    <div id="topbg"> </div>
    <div id="wrap2">
        <div id="topbar">
            <img style="float:left;margin:0 150px 0 20px;height:65px;" src="../images/logo.svg" alt="logo">
            <h1 id="sitename"><a href="#">Тестовое задание</a> <span class="description"></span></h1>
        </div>
        <div id="header">
            <div id="headercontent"> </div>
            <div id="topnav">
                <ul class="lavaLampWithImage" id="1">
                    <?php
                    $pages = [["title" => "Города", "page" => 1],
                              ["title" => "Пользователи", "page" => 2],
                              ["title" => "Поиск", "page" => 3]];
                    foreach ($pages as $item) {
                    ?>
                        <li <?php if($_GET['page']==$item['page']) echo 'class="current"'; ?>><a href="?page=<?=$item['page']?>"><?=$item['title']?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

