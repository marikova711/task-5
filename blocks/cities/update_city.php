<?php
    $id = $_POST['id'];
    $city = get_city($id);
    if (isset($_POST['submit_edit_city'])) {
        $name = $_POST['edit_text_city'];
        $index = $_POST['edit_text_rangir'];
        update_city($id, $name, $index);
        include "get_cities.php";
    } else {
?>
<form action="" method="post">
    <div class="form">
        <h3>Форма редактирования города</h3>
        <span>Название:<input type="text" name="edit_text_city" required="" value="<?=$city['name']?>"></span>
        <span>Индекс Сортировки:<input type="text" name="edit_text_rangir" required="" value="<?=$city['sortindex']?>"></span>
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="submit" name="submit_edit_city" value="Подтвердить редактирование">
        <a href="/?page=1">Отмена</a>
    </div>
</form>
<?php
    }
?>