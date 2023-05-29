<?php
if (isset($_POST['submit_sort_names'])) {
    $field = htmlspecialchars(trim($_POST['sort_name']));
    $order = htmlspecialchars(trim($_POST['sort_order_by_2']));

    $fields = ['id', 'username', 'lastname', 'name'];
    if ($field == "" || $order == "") {
        echo "Выберите поле и направление сортировки";
        include __DIR__ . "/../../blocks/sort_form_users.php";
        include "get_users.php";
    } else if (!in_array($field, $fields)) {
        echo "Выберите существующее поле";
        include __DIR__ . "/../../blocks/sort_form_users.php";
        include "get_users.php";
    } else if ($order !== 'sort_asc' && $order !== 'sort_desc') {
        echo "Выберите направление сортировки";
        include __DIR__ . "/../../blocks/sort_form_users.php";
        include "get_users.php";
    } else {
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
        $sorted_users = sort_users($field, $order);
        if (!empty($sorted_users)) {
            foreach ($sorted_users as $user) {
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
        <?php
    }
} else {
    include __DIR__ . "/../../blocks/sort_form_users.php";
    include "get_users.php";
?>
<script>
    $('.flrig2 input:last').css('display', 'none');
</script>
    <?php
}
?>
