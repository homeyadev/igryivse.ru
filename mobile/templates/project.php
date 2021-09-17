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
                echo '<link rel="stylesheet" href="mobile/css/project.css" type="text/css"/>';

                $project_data = getProjectByID($conn, $id)->fetch_assoc();
                $news = getNewsByProjectID($conn, $id);
                $changelogs = getChangelogsByProjectID($conn, $id);
                
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

                        echo 
                        "
                        <div id=\"info-switcher\">
                            <a style=\"float: left;\" href=\"#news\" id=\"nb\" onclick=\"var nb = document.getElementById('nb'); nb.style.background='#246dff'; var nc = document.getElementById('nc'); nc.style.background='transparent'; nb.firstChild.style.color = '#fff'; nc.firstChild.style.color = '#000';\"><h5>Новости</h5></a>
                            <a style=\"float: right;\" href=\"#changelogs\" id=\"nc\" onclick=\"var nc = document.getElementById('nc'); nc.style.background='#246dff'; var nb = document.getElementById('nb'); nb.style.background='transparent'; nc.firstChild.style.color = '#fff'; nb.firstChild.style.color = '#000';\"><h5>Обновления</h5></a>
                        </div>
                        ";

                        echo "<div id=\"news\">";
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
                            echo "</div>";
                        }

                        echo "<div id=\"changelogs\">";
                            while ($row = $changelogs->fetch_assoc()) {
                                $json = $row["text"];
                                $json = preg_replace('/[[:cntrl:]]/', '', $json);
                                $json = json_decode($json, true);

                                echo 
                                "
                                <div class=\"changelog-card\">
                                    <h2>Лог изменений для версии {$json['version']}</h2>
                                ";
                                for ($i = 0; $i < $json['entries']; $i++) {
                                    if ($json['changelog'][$i] != "") {
                                        echo "<h4>● {$json['changelog'][$i]}</h4>";
                                    }
                                }
                                echo "</div>";
                            }
                        echo "</div>";
                    }

                    else {
                        echo "<h2 id=\"nf\">Проект не найден. Возможно,<br>ссылка не верна.</h2>";
                    }
                }
                
                else {
                    echo '<h2 id="innacessible">Сервер базы данных<br>сейчас недоступен. Пожалуйста,<br>попробуйте позже.</h2>';
                }   
            ?>
            <script>
                window.location.hash = '#' + 'news';
                var nb = document.getElementById('nb'); nb.style.background='#246dff';
                nb.firstChild.style.color = '#fff';
            </script>
        </main>
    </body>
</html>