<div class="filter">
    <form action="" method="post">
        <h3>Фильтр по Городам</h3>
        <select size="1" name="selsity_2">
            <option disabled="">Выберите город</option>
            <?php
            $cities = get_cities_all();
            if (!empty($cities)) {
                foreach ($cities as $city) {
                    ?>
                    <option value="<?=$city['id']?>" <?=($_POST['selsity_2'] == $city['id']) ? "selected='selected'" : ''?>><?=$city['name']?></option>
                    <?php
                }
            }
            ?>
        </select>
        <input type="submit" name="sort_fc" onclick="hhh()" value="Показать">
    </form>
</div>
