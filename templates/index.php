<!DOCTYPE html>
<html>
    <head>
        <title>Игры и всё - Главная</title>
        <link rel="stylesheet" href="../css/index.css" type="text/css"/>
    </head>
    <body>
        <div></div>
        <main id="main" style="padding-top: 1px;">
            <div class="card-holder" style="background-color: #ededed; padding-bottom: 3vw;">
                <h1 id="last-video-txt" class="main-txt">Последнее видео</h1>
                <h3 id="last-video-subtxt" class="main-subtxt">на моём Youtube канале</h1>
                <?php 
                    $channel_id = 'UCnweBe19u5Rn_uLNDHfpOrA';
                    $link = 'https://youtube.com/';
                     
                    $xml = simplexml_load_file(sprintf('https://www.youtube.com/feeds/videos.xml?channel_id=%s', $channel_id));
                    $videoId = $xml->entry->children('yt', true)->videoId;

                    echo '<iframe id="yt-video-box" width="70%" height="608vw" src="https://www.youtube.com/embed/'.$videoId.'"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="display: block"></iframe>';
                ?>
            </div>

            <div class="card-holder" style="background-color: #5865f2; padding-bottom: 3vw;">
                <h1 id="join-community-txt" class="main-txt">Присоединяйся к коммьюнити,</h1>
                <h3 id="join-community-subtxt" class="main-subtxt">чтобы пообщаться с моими зрителями</h1>
                <img src="../sources/ds-logo.png" id="ds-img">
                <h2 id="ds-txt">Discord сервер</h2>
                <h4 id="ds-subtxt">Тут можно пообщаться<br>с моими зрителями и модерацией,<br>а также со мной в общем чате!</h4>
                <a href="https://discord.gg/9EbyDnG" target="_blank" style="margin-left: 50.5vw;"><button id="ds-join-btn">ПРИСОЕДИНИТЬСЯ</button></a>
            </div>

            <div class="card-holder" style="background-color: #ededed; padding-bottom: .5vw;">
                <h1 id="about-me-txt" class="main-txt">Немного обо мне</h1>
                <h3 id="about-me-subtxt">Я - начинающий блогер,<br>который пытается делать качественный контент в меру своих возможностей и<br>быть лучше, чем многие блогеры моего возраста.<br>На своём Youtube канале я прохожу игры,<br>а также снимаю ролики о программировании.<br>На этом сайте я рассказываю новости о своих проектах.<br>Буду очень признателен, если Вы поддержите моё развитие как блогера.<br>Спасибо!</h3>
            </div>
        </main>
    </body>
</html>
