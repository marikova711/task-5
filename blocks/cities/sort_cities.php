<?php
if (isset($_POST['submit_sort_city'])) {
    ?>
    <form action="" method="post">
    <div class="form flrig">
        <input type="submit" name="ins" value="Добавить" >
        <input type="submit" name="sort" value="Сортировать" >
    </div>
    </form>
    <?php
    $field = $_POST['sort_sity'];
    $order = $_POST['sort_order_by'];
    $sorted_cities = sort_cities($field, $order);
    if (!empty($sorted_cities)) {
        foreach ($sorted_cities as $city) {
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
} else {
?>
<form action="" method="post">
    <div class="sortform">
        <div class="pole">
            <h3>Поле сортировки</h3>
            <span><input type="radio" name="sort_sity" value="id" checked=""> <b>id</b></span>
            <span><input type="radio" name="sort_sity" value="name"> <b>Название Города</b></span>
            <span><input type="radio" name="sort_sity" value="sortindex"> <b>Индекс Сортировки</b></span>
        </div>
        <div class="napr">
            <h3>Направление сортировки</h3>
            <span><input type="radio" name="sort_order_by" value="sort_asc" checked=""> <b>Возрастание</b></span>
            <span><input type="radio" name="sort_order_by" value="sort_desc"> <b>Убывание</b></span>
        </div>
        <input type="submit" name="submit_sort_city" value="Сортировать">
        <a href="/?page=1">Отмена</a>
    </div>
</form>
<?php
include "get_cities.php";
?>
<script>
    $('.flrig input:last').remove();
</script>
<?php
}
?>

