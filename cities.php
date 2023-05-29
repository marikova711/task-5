<div class="post">
    <div class="postheader"> </div>
    <div class="postcontent">
        <h2>Список городов</h2>
        <?php
        if (isset($_POST['ins']) || isset($_POST['subminscity'])) {
            include 'pages/cities/add_city.php';
        } else if (isset($_POST['sort']) || isset($_POST['submit_sort_city'])) {
            include 'pages/cities/sort_cities.php';
        } else if (isset($_POST['edit_fors_city']) || isset($_POST['submit_edit_city'])) {
            include 'pages/cities/update_city.php';
        } else {
            include 'pages/cities/get_cities.php';
        }
        ?>
    </div>
    <div class="postbottom"> </div>
</div>

