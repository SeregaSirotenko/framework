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
                    <img src="../<?= $val['img']; ?>" width="100" height="100">
                </div>
                <div class="item-2">
                    <span><?= $val['topic_name']; ?></span>
                </div>
                <div class="item-3">
                    <span><?= $val['description']; ?></span>
                </div>
                <div class="item-4">
                    <span><a href="/page/ditail?id=<?=$val['id'];?>">Подробнее</a></span>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>