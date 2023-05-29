<?php
    if (isset($_POST['subminscity'])) {
        $name = htmlspecialchars(trim($_POST['instextcity']));
        $index = htmlspecialchars(trim($_POST['instextrangir']));

        if ($name == "" || $index == "") {
            include __DIR__."/../../blocks/add_form_city.php";
            echo "Заполните все поля";
        } else if (!is_numeric($index)) {
            include __DIR__."/../../blocks/add_form_city.php";
            echo "Введите корректный индекс сортировки";
        } else {
            add_city($name, $index);
            include "get_cities.php";
        }
    } else {
        include __DIR__."/../../blocks/add_form_city.php";
    }
