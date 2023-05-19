<form action="" method="post">
    <div class="form flrig">
        <input type="submit" name="ins" value="Добавить" >
        <input type="submit" name="sort" value="Сортировать" >
    </div>
</form>
<?php
if (isset($_POST['del_fors_city'])) {
    $id = $_POST['id'];
    delete_city($id);
}
$cities = get_cities_all();
if (!empty($cities)) {
    foreach ($cities as $city) {
        ?>
        <div class='cpsity'>
            <h3><?=$city['name']?></h3>
            <span>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?=$city['id']?>" >
                    <input type="submit" name="del_fors_city" onclick="return confirm('Вы действительно хотите удалить город?')" value="Удалить" >
                </form>
            </span>
            <span>
                <form action="" method="post" >
                    <input type="hidden" name="id" value="<?=$city['id']?>" >
                    <input type="submit" name="edit_fors_city" value="Редактировать" >
                </form>
            </span>
        </div>
        <?php
    }
} else {
    ?>
        <div class='cpsity'>
            <h3>Городов не найдено</h3>
        </div>
    <?php
}
?>
