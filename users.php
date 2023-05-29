<div class="post">
    <div class="postheader"> </div>
    <div class="postcontent">
        <h2>Список Пользователей</h2>
        <p><a name="top"></a></p>
        <?php
        if (isset($_POST['ins2']) || isset($_POST['subm_ins_names'])) {
            include 'pages/users/add_user.php';
        } else if (isset($_POST['edit_fors_names']) || isset($_POST['subm_edit_names'])) {
            include 'pages/users/update_user.php';
        } else if (isset($_POST['sort2']) || isset($_POST['submit_sort_names'])) {
            include 'pages/users/sort_users.php';
        } else {
            include 'pages/users/get_users.php';
        }
        ?>
    </div>
    <div class="postbottom">
    </div>
</div>
