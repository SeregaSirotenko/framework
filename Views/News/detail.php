<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="../../css/style-2.css">
		<meta charset="UTF-8">
		<title>Новости</title>
	</head>
	<body>
		<div class="news">
			<div class="caption">
				<span><?= $result['topic_name'];?></span>
			</div>
			<div class="description">
				<span><?= $result['description']?></span>
			</div>
			<div class="delete">
				<span><a href="/page/delete?id=<?=$_GET['id']?>">Удалить новость</a></span>
			</div>
		</div>
	</body>
</html>