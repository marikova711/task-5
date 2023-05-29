<?php
if (isset($_POST['del_fors_names'])) {
    $id = htmlspecialchars(trim($_POST['id']));
    if ($id == "") {
        echo "Выберите пользователя для удаления";
    } else if (!is_numeric($id)) {
        echo "Введите корректные данные об удаляемом пользователе";
    } else {
        delete_user($id);
        echo "Пользователь удален";
    }
}

if (isset($_POST['sort_fc'])) {
    $city_id = htmlspecialchars(trim($_POST['selsity_2']));
    if ($city_id == "") {
        echo "Выберите город для фильтрации пользователей";
    } else if (!is_numeric($city_id)) {
        echo "Введите корректные данные о городе";
    } else {
        $users = filter_users($city_id);
    }
} else {
    $users = get_users_all();
}
?>
<h3><a href="#down">Вниз</a></h3>
<div class="flrig2" style="display:inline-block">
    <form action="" method="post">
        <input type="submit" name="ins2" value="Добавить">
        <input type="submit" name="sort2" value="Сортировать">
    </form>
</div>
<?php
include __DIR__ . "/../../blocks/filter_form_users.php";

if (!empty($users)) {
    foreach ($users as $user) {
        ?>
        <div class="users">
            <img src="../../images/users_pictures/<?=$user['img']?>" class="image" alt="Фотография" width="100">
            <div class="userdan">
                <h4><?=$user['username']." ".$user['lastname']?></h4>
                <p>Город: <?=$user['name']?></p>


                <form action="" method="post">
                    <input type="hidden" name="id" value="<?=$user['id']?>">
                    <input type="submit" name="del_fors_names" value="Удалить" onclick="return confirm('Вы действительно хотите удалить пользователя?')">
                </form>

                <form action="" method="post">
                    <input type="hidden" name="id" value="<?=$user['id']?>">
                    <input type="submit" name="edit_fors_names" value="Редактировать">
                </form>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class='cpsity'>
        <h3>Пользователей не найдено</h3>
    </div>
    <?php
}
?>
<a name="down"></a>
<h3><a href="#top">Наверх</a></h3>
