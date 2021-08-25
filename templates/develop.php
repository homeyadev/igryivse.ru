<!DOCTYPE html>
<html>
    <head>
        <title>Игры и всё - Разработка</title>

        <?php 
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
                ";
            }
            
            else {
                echo '<link rel="stylesheet" href="../css/develop.css" type="text/css"/>';

                $data = getProjects($conn);

                dbclose($conn);
            }
        ?>
    </head>
    <body>
        <div></div>
        <main id="main">
            <?php 
                if (!$conn->connect_errno) {

                    while ($row = $data->fetch_assoc()) {
                        $status = array(
                            0 => "В разработке",
                            1 => "Идёт бета-тест",
                            2 => "Вышел в релиз"
                        );

                        echo "
                        <div class=\"project-card\">
                            <h2>{$row["name"]}</h2>
                            <h4 id=\"ver\">Версия {$row["version"]}</h4>
                            <h4 id=\"stat\">{$status[$row["status"]]}</h4>
                            <h3>{$row["description"]}</h3>

                            <a href=\"/project?id={$row["id"]}\"><h5>Читать новости →</h5></a>
                        </div>
                        ";
                    }
                }
                
                else {
                    echo '<h2 id="innacessible">Сервер базы данных<br>сейчас недоступен. Пожалуйста,<br>попробуйте позже.</h2>';
                }
            ?>
        </main>
    </body>
</html>