<?php
$id = $_POST['id'] ?? $_POST['id_red'];
$user = get_user($id);
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form">
        <h3>Форма Редактирования Пользователя</h3>
        <span>Имя <input type="text" name="edit_text_name" required="" value="<?=$user['username']?>"> </span>
        <span>Фамилия <input type="text" name="edit_text_surname" required="" value="<?=$user['lastname']?>"> </span>
        <span>Город
                <select size="1" name="edit_selsity">
                    <option disabled="">Выберите город</option>
                    <?php
                    $cities = get_cities_all();
                    if (!empty($cities)) {
                        foreach ($cities as $city) {
                            ?>
                            <option value="<?=$city['id']?>"><?=$city['name']?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </span>
        <img src="../../images/users_pictures/<?=$user['img']?>" class="image" alt="Фотография" width="100">
        <input type="file" name="uploadfile">
        <input type="hidden" name="photo" value="../../images/users_pictures/<?=$user['img']?>">
        <input type="hidden" name="id_red" value="<?=$id?>">
        <input type="submit" name="subm_edit_names" value="Подтвердить редактирование">
        <a href="/?page=2">Отмена</a>
    </div>
</form>
