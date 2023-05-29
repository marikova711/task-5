<?php
if (isset($_POST['subm_edit_names'])) {
    $user_id = htmlspecialchars(trim($_POST['id_red']));
    $username = htmlspecialchars(trim($_POST['edit_text_name']));
    $lastname = htmlspecialchars(trim($_POST['edit_text_surname']));
    $city_id = htmlspecialchars(trim($_POST['edit_selsity']));
    $image = $_FILES['uploadfile'];

    if ($username == "" || $lastname == "" || $user_id == "" || $city_id == "") {
        include __DIR__."/../../blocks/update_form_user.php";
        echo "Заполните все поля";
    } else if (!is_numeric($city_id) || !is_numeric($user_id)) {
        include __DIR__."/../../blocks/update_form_user.php";
        echo "Введите корректные данные о городе";
    } else if (!preg_match('/\.(?:jp(?:e?g|e|2)|gif|png|tiff?|bmp|ico)$/i', $image['name']) && $image['size'] !== 0) {
        include __DIR__."/../../blocks/update_form_user.php";
        echo "Введите корректный тип файла";
    } else {
        if ($image['size'] === 0) {
            $upload_image = substr(strrchr($_POST['photo'], "/"), 1);
        } else {
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            $upload_image = time().".$extension";
            move_uploaded_file($_FILES['uploadfile']['tmp_name'], __DIR__ . '/../../images/users_pictures/' .$upload_image);
        }
        update_user($user_id, $username, $lastname, $city_id, $upload_image);
        include "get_users.php";
    }

} else {
    include __DIR__."/../../blocks/update_form_user.php";
}

