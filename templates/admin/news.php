<!DOCTYPE html>
<html>
    <head>
        <title>Управление новостями</title>

        <?php
            $conn = @dbconnect($db);
            
            if ($conn->connect_errno) {
                echo 
                "
                <style>
                    .action-form {
                        background-color: #ffa6a6;
                        border: solid #ff2b2b 2px;
                    }
                    .action-form #innacessible
                </style
                ";
            }

            else {
                $project_data = getProjects($conn);
                $news_data = getNews($conn);

                if ($_POST['todo'] == "add") {
                    if ($_POST['project_id'] != null && $_POST['newsitem_name'] != null && $_POST['newsitem_text'] != null) {
                        addNewsitem($conn, $_POST['project_id'], $_POST['newsitem_name'], $_POST['newsitem_text']);
                        header("200 Success");
                    }

                    else {
                        header("HTTP/1.1 400 Bad Request");
                    }

                } 
    
                elseif ($_POST['todo'] == "del") {
                    if ($_POST['newsitem_id'] != null) {
                        deleteNewsitem($conn, $_POST['newsitem_id']);
                        
                        header("200 Success");
                    }

                    else {
                        header("HTTP/1.1 400 Bad Request");
                    }
                }

                dbclose($conn);
            }
        ?>
    </head>
    <body>
        <main>
            <h1 id="page-header">Управление новостями</h1>

            <?php
                if (!$conn->connect_errno): 
            ?>
            <div class="action-form">
                <h3 class="subheader">Добавить новость</h3>

                <form action="" method="post">
                    <input type="hidden" name="todo" value="add" required>

                    <select class="list-select" name="project_id" required>
                        <option disabled selected hidden>Выберите проект</option>
                        <?php
                            while ($row = $project_data->fetch_assoc()) {
                                echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
                            }
                        ?>
                    </select>
                    <input class="txt-input" type="text" name="newsitem_name" placeholder="Введите имя новости" required>
                    <textarea name="newsitem_text" class="big-txt-input" placeholder="Введите текст новости" reqired></textarea>
                    <input type="submit" class="send-action" value="Добавить">
                </form>

                <?php
                    else:
                        echo "<h1>Сервер базы данных недоступен.</h1>";

                    endif;
                ?>
            </div>

            <?php
                if (!$conn->connect_errno): 
            ?>
            <div class="action-form">
                <h3 class="subheader">Удалить новость</h3>

                <form action="" method="post">
                    <input type="hidden" name="todo" value="del" reqired>

                    <select class="list-select-centered" name="newsitem_id" required>
                        <option disabled selected hidden>Выберите новость</option>
                        <?php
                            while ($row = $news_data->fetch_assoc()) {
                                echo "<option value=\"{$row['id']}\">{$row['header']}</option>";
                            }
                        ?>
                    </select>
                    <input type="submit" class="send-action" value="Удалить">
                </form>

                <?php
                    else:
                        echo "<h1>Сервер базы данных недоступен.</h1>";

                    endif;
                ?>
            </div>
        </main>
    </body>
</html>