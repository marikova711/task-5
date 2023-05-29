<form action="" method="post">
    <div class="form">
        <h3>Поиск по имени и/или фамилии пользователя</h3>
        <span>
            <input type="search" pattern="[A-Za-zА-Яа-яЁё]{3,16}" name="ins_sh_name" value="<?=$_POST['ins_sh_name'] ?? ''?>" placeholder="Введите запрос">
        </span>
        <input type="submit" name="sub_sh_name" value="Поиск">
    </div>
</form>
<?php
if (isset($_POST['sub_sh_name'])) {
    $query = htmlspecialchars(trim($_POST['ins_sh_name']));
    if ($query == "") {
        echo "Пожалуйста, заполните это поле";
    } else if (!preg_match('/[A-Za-zА-Яа-яЁё]{3,16}/', $query)) {
        echo "Пожалуйста, введите корректные данные";
    } else {
        $users = search_users($query);

        if (!empty($users)) {
            foreach ($users as $user) {
                ?>
                <div class="users">
                    <img src="../../images/users_pictures/<?=$user['img']?>" class="image" alt="Фотография" width="100">
                    <div class="userdan">
                        <h4><?=$user['username']." ".$user['lastname']?></h4>
                        <p>Город: <?=$user['name']?></p>
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
    }
}
?>
