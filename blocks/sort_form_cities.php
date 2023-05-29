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

