<?php
    if (isset($_POST['submit_edit_city'])) {
        $id = htmlspecialchars(trim($_POST['id']));
        $name = htmlspecialchars(trim($_POST['edit_text_city']));
        $index = htmlspecialchars(trim($_POST['edit_text_rangir']));

        if ($id == "" || $name == "" || $index == "") {
            include __DIR__."/../../blocks/update_form_city.php";
            echo "Заполните все поля";
        } else if (!is_numeric($index) || !is_numeric($id)) {
            include __DIR__."/../../blocks/update_form_city.php";
            echo "Введите корректные данные";
        } else {
            update_city($id, $name, $index);
            include "get_cities.php";
        }
    } else {
        include __DIR__."/../../blocks/update_form_city.php";
    }
