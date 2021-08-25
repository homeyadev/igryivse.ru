<!DOCTYPE html>
<html>
    <head>
        <?php
            $id = (int)$_GET['id'];

            $conn = @dbconnect($db); 
            
            if ($conn->connect_errno) {
                echo 
                "
                <style>
                    #innacessible {
                        text-align: center;
                        width: 50vw;
                        font-size: 50px;
                        font-weight: 900;
                        margin-left: 25vw;
                        color: #4d4d4d;
                    }

                    main {
                        padding-top: 1px;
                    }
                </style>

                <title>Сервер недоступен</title>
                ";
            }

            else {
                echo '<link rel="stylesheet" href="mobile/css/news.css" type="text/css"/>';

                $newsitem_data = getNewsitem($conn, $id)->fetch_assoc();
                dbclose($conn);

                if ($newsitem_data != null) {
                    echo "<title>Игры и всё - {$newsitem_data["header"]}</title>";
                }

                else {
                    echo
                    "
                    <style>
                        #nf {
                            text-align: center;
                            width: 50vw;
                            font-size: 50px;
                            font-weight: 900;
                            margin-left: 25vw;
                            color: #4d4d4d;
                        }

                        main {
                            padding-top: 1px;
                        }
                    </style>

                    <title>Новость не найдена</title>
                    ";
                }
            }
        ?>
    </head>
    <body>
        <div></div>
        <main id="main">
            <?php 
                if (!$conn->connect_errno) {
                    if ($newsitem_data != null) {

                        echo "<h1 id=\"name\">{$newsitem_data["header"]}</h1>";
                        echo "<h3 id=\"text\">{$newsitem_data["text"]}</h3>";

                    }

                    else {
                        echo "<h2 id=\"nf\">Новость не найдена. Возможно,<br>ссылка не верна.</h2>";
                    }
                }
                
                else {
                    echo '<h2 id="innacessible">Сервер базы данных<br>сейчас недоступен. Пожалуйста,<br>попробуйте позже.</h2>';
                }   
            ?>
        </main>
    </body>
</html>