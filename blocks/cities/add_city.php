<?php
    if (isset($_POST['subminscity'])) {
        $name = $_POST['instextcity'];
        $index = $_POST['instextrangir'];
        add_city($name, $index);
        include "get_cities.php";
    } else {
?>
<form action="" method="post" class="dopsity">
    <h3>Форма добовления города</h3>
    <input type="text" name="instextcity" required="" placeholder="Название города">
    <input type="text" name="instextrangir" required="" placeholder="Индекс Сортировки">
    <br>
    <input type="submit" value="Добавить" name="subminscity">
    <a href="/?page=1">Отмена</a>
</form>
<?php
    }
?>