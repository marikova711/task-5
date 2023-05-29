<?php
    function connectDB() {
        $dbhost = "localhost";
        $dblogin = "root";
        $dbpass = "";
        $dbname = "test";
        $table_cities = "cities";
        $table_users = "users";

        $connect = new mysqli($dbhost, $dblogin, $dbpass);
        if ($connect->connect_error) return "Ошибка подключения: " . $connect->connect_error;
        if (!$connect->query("CREATE DATABASE IF NOT EXISTS `$dbname`")) return "Ошибка: " . $connect->error;
        $connect->close();

        $mysql = new mysqli($dbhost, $dblogin, $dbpass, $dbname);
        $mysql->query("SET NAMES 'utf8'");
        if ($mysql->connect_error) {
            return "Ошибка подключения: " . $mysql->connect_error;
        } else {
            $mysql->query("CREATE TABLE IF NOT EXISTS `$table_cities` (
            id INT (11) NOT NULL AUTO_INCREMENT,
            name VARCHAR (50) NOT NULL,
            sortindex INT(11) NOT NULL,
            PRIMARY KEY (id)
            )");

            $mysql->query("CREATE TABLE IF NOT EXISTS `$table_users` (
            id INT (11) NOT NULL AUTO_INCREMENT,
            username VARCHAR (50) NOT NULL,
            lastname VARCHAR (50) NOT NULL,
            city_id INT (11),
            img VARCHAR (100),
            PRIMARY KEY (id),
            FOREIGN KEY (city_id) REFERENCES $table_cities(id)
            )");
            return $mysql;
        }
    }
    function get_cities_all() {
        $mysql = connectDB();
        $sql = "SELECT `id`, `name` FROM `cities`";
        $result = $mysql->query($sql);
        $mysql->close();
        $count = $result->num_rows;
        $cities = [];
        if($count) {
            while ($row = $result->fetch_assoc()) {
                $cities[] = $row;
            }
        }
        return $cities;
    }
    function get_city($id) {
        $mysql = connectDB();
        $sql = "SELECT `name`, `sortindex` FROM `cities` WHERE `id` = '$id'";
        $result = $mysql->query($sql);
        $mysql->close();
        return $result->fetch_assoc();
    }
    function add_city($name, $index) {
        $mysql = connectDB();
        $sql = "INSERT INTO `cities` (`name`, `sortindex`) VALUES ('$name', '$index')";
        $mysql->query($sql);
        $mysql->close();
    }
    function delete_city($id) {
        $mysql = connectDB();
        $sql = "DELETE FROM `cities` WHERE `id` = '$id'";
        $mysql->query($sql);
        $mysql->close();
    }
    function update_city($id, $name, $index) {
        $mysql = connectDB();
        $sql = "UPDATE `cities` SET `name` = '$name', `sortindex` = '$index' WHERE `id`= '$id'";
        $mysql->query($sql);
        $mysql->close();
    }

    function sort_cities($field, $order) {
        $mysql = connectDB();
        $sql = "SELECT * FROM `cities` ORDER BY `$field`";
        $sql .= ($order == 'sort_desc') ? " DESC" : " ASC";
        $result = $mysql->query($sql);
        $mysql->close();
        $count = $result->num_rows;
        $cities = [];
        if($count) {
            while ($row = $result->fetch_assoc()) {
                $cities[] = $row;
            }
        }
        return $cities;
    }
    function get_users_all() {
        $mysql = connectDB();
        $sql = "SELECT `users`.*, `cities`.`name` FROM `users` INNER JOIN `cities` ON `cities`.`id` = `users`.`city_id`";
        $result = $mysql->query($sql);
        $mysql->close();
        $count = $result->num_rows;
        $users = [];
        if($count) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
    function get_user($id) {
        $mysql = connectDB();
        $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
        $result = $mysql->query($sql);
        $mysql->close();
        return $result->fetch_assoc();
    }
    function add_user($username, $lastname, $city, $img) {
        $mysql = connectDB();
        $sql = "INSERT INTO `users` (`username`, `lastname`, `city_id`, `img`) VALUES ('$username', '$lastname', '$city', '$img')";
        $mysql->query($sql);
        $mysql->close();
    }
    function delete_user($id) {
        $mysql = connectDB();
        $sql = "DELETE FROM `users` WHERE `id` = '$id'";
        $mysql->query($sql);
        $mysql->close();
    }
    function update_user($id, $username, $lastname, $city, $img) {
        $mysql = connectDB();
        $sql = "UPDATE `users` SET `username` = '$username', `lastname` = '$lastname', `city_id` = '$city', `img` = '$img' WHERE `id` = '$id'";
        $mysql->query($sql);
        $mysql->close();
    }
    function sort_users($field, $order) {
        $mysql = connectDB();
        $sql = "SELECT `users`.*, `cities`.`name` FROM `users` INNER JOIN `cities` ON `cities`.`id` = `users`.`city_id` ORDER BY `$field`";
        $sql .= ($order == 'sort_desc') ? " DESC" : " ASC";
        $result = $mysql->query($sql);
        $mysql->close();
        $count = $result->num_rows;
        $users = [];
        if($count) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
    function filter_users($city_id) {
        $mysql = connectDB();
        $sql = "SELECT * FROM `users` INNER JOIN `cities` ON `cities`.`id` = `users`.`city_id` WHERE `city_id` = '$city_id'";
        $result = $mysql->query($sql);
        $mysql->close();
        $count = $result->num_rows;
        $users = [];
        if($count) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
    function search_users($query) {
        $mysql = connectDB();
        $sql = "SELECT * FROM `users` INNER JOIN `cities` ON `cities`.`id` = `users`.`city_id` WHERE `username` LIKE '%$query%' OR `lastname` LIKE '%$query%'";
        $result = $mysql->query($sql);
        $mysql->close();
        $count = $result->num_rows;
        $users = [];
        if($count) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }







