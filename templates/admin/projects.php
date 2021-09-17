<!DOCTYPE html>
<html>
    <head>
        <title>Управление проектами</title>

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
                </style
                ";
            }

            else {
                echo 
                "
                <style>
                    main {
                        min-height: 155vh;
                    }
                </style
                ";

                $project_data = getProjects($conn);
                $project_data2 = getProjects($conn);

                if ($_POST['todo'] == "add") {
                    if ($_POST['project_name'] != null && $_POST['project_desc'] != null) {
                        addProject($conn, $_POST['project_name'], $_POST['project_desc']);

                        header("200 Success");
                    }

                    else {
                        header("HTTP/1.1 400 Bad Request");
                    }

                } 
    
                elseif ($_POST['todo'] == "del") {
                    if ($_POST['project_id'] != null) {
                        deleteProject($conn, $_POST['project_id']);

                        header("200 Success");
                    }

                    else {
                        header("HTTP/1.1 400 Bad Request");
                    }
                }

                elseif ($_POST['todo'] == "upd") {
                    if ($_POST['project_id'] != null && $_POST['project_ver'] != null && $_POST['project_stat'] != null && $_POST['changelog'] != null) {
                        updateProject($conn, $_POST['project_id'], $_POST['project_ver'], $_POST['project_stat']);
                        $changelogHandler = new JSONFuncs;
                        $json = $changelogHandler->createChangelogJSON($_POST['changelog'], $_POST['project_ver']);
                        addNewsitem($conn, $_POST['project_id'], ':', $json, 01);

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
            <h1 id="page-header">Управление проектами</h1>

            <?php
                if (!$conn->connect_errno): 
            ?>
            <div class="action-form">
                <h3 class="subheader">Добавить проект</h3>

                <form action="" method="post">
                    <input type="hidden" name="todo" value="add" required>

                    <input class="txt-input-centered" type="text" name="project_name" placeholder="Введите имя проекта" required>
                    <textarea name="project_desc" class="big-txt-input" placeholder="Введите описание проекта" reqired></textarea>
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
                <h3 class="subheader">Удалить проект</h3>

                <form action="" method="post">
                    <input type="hidden" name="todo" value="del" required>
                    
                    <select class="list-select-centered" name="project_id" required>
                        <option disabled selected hidden>Выберите проект</option>
                        <?php
                            while ($row = $project_data->fetch_assoc()) {
                                echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
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

            <?php
                if (!$conn->connect_errno): 
            ?>
            <div class="action-form">
                <h3 class="subheader">Обновить состояние проекта</h3>

                <form action="" method="post">
                    <input type="hidden" name="todo" value="upd" required>
                    
                    <select class="list-select" name="project_id" required>
                        <option disabled selected hidden>Выберите проект</option>
                        <?php
                            while ($row = $project_data2->fetch_assoc()) {
                                echo "<option value=\"{$row['id']}\">{$row['name']}</option>";
                            }
                        ?>
                    </select>
                    <input class="txt-input" type="text" name="project_ver" placeholder="Введите версию проекта" required>
                    <select class="list-select-centered" style="margin-top: 2vh;" name="project_stat" required>
                        <option disabled selected hidden>Выберите тип</option>
                        
                        <option value="0">В разработке</option>
                        <option value="1">Идёт бета-тест</option>
                        <option value="2">Вышел в релиз</option>
                    </select>
                    <textarea name="changelog" class="big-txt-input" placeholder="Создайте changelog" reqired></textarea>
                    <input type="submit" class="send-action" value="Обновить">
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