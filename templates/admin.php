<?php 
    $actions = array(
        "login" => "admin/login.php",
        "news" => "admin/news.php",
        "projects" => "admin/projects.php",
        "main" => "admin/main.php"
    );

    if ($actions[$_GET['action']] != null) {
        echo '<link rel="stylesheet" href="../css/admin.css" type="text/css"/>';

        if ($_COOKIE['username'] != null && $_COOKIE['password'] != null) {
            $conn = @dbconnect($db);

            $username = $_COOKIE['username'];
            $password = $_COOKIE['password'];

            $res = checkLoginData($conn, $username, $password, false);

            if ($res) {
                include $actions[$_GET['action']];
                include "admin/menu.php";
            }

            else {
                header("HTTP/1.1 303 Redirect");
                header("Location: /admin?action=login");
            }
        }

        else {
            if ($_GET['action'] == "login") {
                include $actions['login'];
            }

            else {
                header("HTTP/1.1 303 Redirect");
                header("Location: /admin?action=login");
            }
        }
    }

    else {
        header("HTTP/1.1 303 Redirect");
        header("Location: /");
    }
?>