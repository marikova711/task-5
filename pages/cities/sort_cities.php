<?php
if (isset($_POST['submit_sort_city'])) {
    $field = htmlspecialchars(trim($_POST['sort_sity']));
    $order = htmlspecialchars(trim($_POST['sort_order_by']));

    $fields = ['id', 'name', 'sortindex'];
    if ($field == "" || $order == "") {
        echo "Выберите поле и направление сортировки";
        include __DIR__ . "/../../blocks/sort_form_cities.php";
        include "get_cities.php";
    } else if (!in_array($field, $fields)) {
        echo "Выберите существующее поле";
        include __DIR__ . "/../../blocks/sort_form_cities.php";
        include "get_cities.php";
    } else if ($order !== 'sort_asc' && $order !== 'sort_desc') {
        echo "Выберите направление сортировки";
        include __DIR__ . "/../../blocks/sort_form_cities.php";
        include "get_cities.php";
    } else {
        ?>
        <form action="" method="post">
            <div class="form flrig">
                <input type="submit" name="ins" value="Добавить" >
                <input type="submit" name="sort" value="Сортировать" >
            </div>
        </form>
        <?php
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
    }
} else {
    include __DIR__ . "/../../blocks/sort_form_cities.php";
    include "get_cities.php";
    ?>
    <script>
        $('.flrig input:last').css('display', 'none');
    </script>
    <?php
}
?>

