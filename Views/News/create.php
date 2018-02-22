<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Добавление новостей</title>
    </head>
    <body>
        <form name="form1" method="post" enctype="multipart/form-data" action="/page/create">
            <table width="55%">
                <tr>
                    <td width="50%">Название новости</td>
                    <td><input type="text" name="name" id="name"></td>
                </tr>
                <tr>
                    <td>Описание новости</td>
                    <td><textarea name="description" cols="70" rows="2"></textarea></td>
                </tr>
                <tr>
                    <td>Загрузить изображение</td>
                    <td><input type="file" name="picture" multiple accept="image/*,image/jpeg"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Отправить"></td>
                </tr>
            </table>
        </form>
    </body>
</html>