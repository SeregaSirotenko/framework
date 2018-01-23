<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <meta charset="UTF-8">
        <title>Главная страница</title>
    </head>
    <body>
        <div class="myNews">
            <?php foreach($res as $val): ?>
            <div class="news">
                <div class="item-1">
                    <span><?= $val['topic_name']; ?></span>
                </div>
                <div class="item-2">
                    <span><?= $val['description']; ?></span>
                </div>
                <div class="item-3">
                    <span><a href="/page/WorldNews?id=<?=$val['id'];?>">Подробнее</a></span>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>