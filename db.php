<?php
    function dbconnect(array $db) {
        return new mysqli($db["host"], $db["user"], $db["passwd"], $db["dbname"]);
    }

    function getProjects(mysqli $conn) {
        return $conn->query("SELECT * FROM projects", MYSQLI_STORE_RESULT);
    }

    function getProjectByID(mysqli $conn, int $id) {
        return $conn->query("SELECT * FROM projects WHERE id = {$id}", MYSQLI_STORE_RESULT);
    }

    function getNewsByProjectID(mysqli $conn, int $id) {
        return $conn->query("SELECT * FROM news WHERE project_id = {$id} ORDER BY id DESC", MYSQLI_STORE_RESULT);
    }

    function getNewsitem(mysqli $conn, int $id) {
        return $conn->query("SELECT * FROM news WHERE id = {$id}", MYSQLI_STORE_RESULT);
    }

    function getNews(mysqli $conn) {
        return $conn->query("SELECT * FROM news ORDER BY id DESC", MYSQLI_STORE_RESULT);
    }

    function addNewsitem(mysqli $conn, $project_id, $name, $txt) {
        return $conn->query("INSERT INTO news (project_id, header, text) VALUES ('{$project_id}', '{$name}', '{$txt}')");
    }

    function addProject(mysqli $conn, $name, $desc) {
        return $conn->query("INSERT INTO projects (name, description, version, status) VALUES ('{$name}', '{$desc}', '0.1', 0)");
    }

    function deleteNewsitem(mysqli $conn, $id) {
        return $conn->query("DELETE FROM news WHERE id = {$id}");
    }

    function deleteProject(mysqli $conn, $id) {
        return $conn->query("DELETE FROM projects WHERE id = {$id}");
    }

    function updateProject(mysqli $conn, $id, $ver, $stat) {
        return $conn->query("UPDATE projects SET version = '{$ver}', status = {$stat} WHERE id = {$id}");
    }

    function checkLoginData(mysqli $conn, string $username, string $password, bool $htmlInput = true) {
        if ($htmlInput) {
            htmlspecialchars($password);
            htmlspecialchars($username);
        }

        $dbobject = $conn->query("SELECT * FROM admin_users WHERE username = '{$username}'", MYSQLI_STORE_RESULT);
        $row = $dbobject->fetch_assoc();

        if ($row == null) {
            header("HTTP/1.1 401 Unauthorized");
            return false;
        }

        else {
            $hash = @password_hash($password, PASSWORD_DEFAULT, ["salt" => $row['salt']]);

            if ($hash == $row['password']) {
                if ($htmlInput) {
                    setcookie("username", $username, time() + 3600);
                    setcookie("password", $password, time() + 3600);
                }

                return true;
            }

            else {
                header("HTTP/1.1 401 Unauthorized");
                return false;
            }
        }
    }

    function dbclose(mysqli $conn) {
        return $conn->close();
    }
?>