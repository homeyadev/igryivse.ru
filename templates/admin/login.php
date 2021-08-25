<!DOCTYPE html>
<html>
    <head>
        <?php
            if ($_POST['login'] != null && $_POST['password'] != null)
            {
                $login = $_POST['login'];
                $password = $_POST['password'];

                $conn = @dbconnect($db);
                if ($conn->connect_errno) {
                    echo 
                    "
                    <style>
                        #form {
                            background-color: #ffa6a6;
                            border: solid #ff2b2b 2px;
                        }
                        #form h1 {
                            color: #ff2b2b;
                            margin-top: 15vh;
                        }
                    </style>

                    <title>Сервер недоступен</title>
                    ";
                }

                else {
                    $res = checkLoginData($conn, $login, $password);
                    dbclose($conn);

                    if ($res) {
                        header("HTTP/1.1 303 Redirect");
                        header("Location: ?action=main");
                    }

                    else  {
                        echo 
                        "
                        <style>
                        form .input {
                            border: solid #ff2b2b 2px !important;
                        }
                        </style>
                        ";
                    }
                }
            }
        ?>

        <title>Вход</title>
    </head>
    <body>
        <main>
            <div id="form">
                <?php
                    if (!$conn->connect_errno): 
                ?>

                <form action="" method="post">
                    <h1>ВХОД В АДМИН-ПАНЕЛЬ</h1>
                    <input class="input" type="text" placeholder="ЛОГИН" name="login" required>
                    <input class="input" type="password" placeholder="ПАРОЛЬ" name="password" required>
                    <input id="login-btn" type="submit" value="ВХОД">
                </form>

                <?php
                    else:
                        echo "<h1>Сервер базы данных недоступен</h1>";

                    endif;
                ?>
            </div>
        </main>
    </body>
</html>