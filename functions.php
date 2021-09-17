<?php
class UIFuncs {
    function createModalWindow(string $header, string $text) {
        echo 
        "
        <div id=\"mw\">
            <div id=\"modal-win\">
                <h2 id=\"header\">{$header}</h2>
                <h3 id=\"txt\">{$text}</h3>
                <a href=\"\" id=\"close\">Закрыть</a>
            </div>
        </div>
        ";
    }
}

class JSONFuncs {
    function createChangelogJSON(string $str, string $ver) {
        $str = explode(PHP_EOL, $str);
        $count = count($str);

        $json = [
            "version" => "{$ver}",
            "entries" => "{$count}",
            "changelog" => $str
        ];
        $json = json_encode($json, JSON_UNESCAPED_UNICODE);

        return $json;
    }
}
?>