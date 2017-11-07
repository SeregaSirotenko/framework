<div class="myNews">
    <div class="myTable">
        <table border="1" cellpadding="4" cellspacing="1">
            <tr>
                <th>идендификатор</th>
                <th>тема</th>
                <th>идендификеатор автора</th>
            </tr>
            <?php foreach ($res as $val): ?>
            <tr>
                <td><?= $val['id_topic']; ?></td>
                <td><?= $val['topic_name']; ?></td>
                <td><?= $val['id_author']; ?></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>