<!DOCTYPE html>
<html>
    <head>
        <title>Главная</title>

        <?php
            if ($_POST['leave'] == 1) {
                setcookie("username", "", time() - 3600);
                setcookie("password", "", time() - 3600);

                header("HTTP/1.1 303 Redirect");
                header("Location: ?action=login");
            }
        ?>
    </head>
    <body>
        <main>
            <h1 id="page-header">Главная</h1>

            <?php
                echo "<h2 id=\"username\">Пользователь: {$_COOKIE['username']}</h2>";
            ?>
            <form action="" method="post">
                <button type="submit" name="leave" value="1" id="leave-btn" me>Выйти</button>
            </form>
        </main>
    </body>
</html>