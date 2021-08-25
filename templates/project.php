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
                echo '<link rel="stylesheet" href="../css/project.css" type="text/css"/>';

                $project_data = getProjectByID($conn, $id)->fetch_assoc();
                $news = getNewsByProjectID($conn, $id);
                
                dbclose($conn);

                if ($project_data != null) {
                    echo "<title>Игры и всё - {$project_data["name"]}</title>";
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

                    <title>Проект не найден</title>
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
                    if ($project_data != null) {

                        echo "<h1 id=\"name\">{$project_data["name"]}</h1>";
                        echo "<h3 id=\"description\">{$project_data["description"]}</h3>";

                        while ($row = $news->fetch_assoc()) {
                            $text = $row["text"];
                            if (mb_strlen($text) >= 2067) {
                                $text = mb_substr($text, 0, 2067)."...";
                            }

                            echo 
                            "
                            <div class=\"newsitem-card\">
                                <h2>{$row["header"]}</h2>
                                <h4>{$text}</h4>

                                <a href=\"/news?id={$row[id]}\"><h5>Читать полностью →</h5></a>
                            </div>
                            ";
                        }
                    }

                    else {
                        echo "<h2 id=\"nf\">Проект не найден. Возможно,<br>ссылка не верна.</h2>";
                    }
                }
                
                else {
                    echo '<h2 id="innacessible">Сервер базы данных<br>сейчас недоступен. Пожалуйста,<br>попробуйте позже.</h2>';
                }   
            ?>
        </main>
    </body>
</html>