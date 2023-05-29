<?php
if (isset($_POST['subm_ins_names'])) {
    $username = htmlspecialchars(trim($_POST['ins_name']));
    $lastname = htmlspecialchars(trim($_POST['ins_surname']));
    $city_id = htmlspecialchars(trim($_POST['selsity']));
    $image = $_FILES['uploadfile'];

    if (!is_dir(__DIR__ . '/../../images/users_pictures')) {
        mkdir(__DIR__ . '/../../images/users_pictures', 0777, true);
    }

    if ($username == "" || $lastname == "" || $city_id == "") {
        include __DIR__."/../../blocks/add_form_user.php";
        echo "Заполните все поля";
    } else if (!is_numeric($city_id)) {
        include __DIR__."/../../blocks/add_form_user.php";
        echo "Введите корректные данные о городе";
    } else if (!preg_match('/\.(?:jp(?:e?g|e|2)|gif|png|tiff?|bmp|ico)$/i', $image['name']) && $image['size'] !== 0) {
        include __DIR__."/../../blocks/add_form_user.php";
        echo "Введите корректный тип файла";
    } else {
        if ($image['size'] === 0) {
            $upload_image = null;
            echo "Файл не был загружен на сервер";
        } else {
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            $upload_image = time().".$extension";
            move_uploaded_file($_FILES['uploadfile']['tmp_name'], __DIR__ . '/../../images/users_pictures/' .$upload_image);
        }
        add_user($username, $lastname, $city_id, $upload_image);
        include "get_users.php";
    }

} else {
    include __DIR__."/../../blocks/add_form_user.php";
}