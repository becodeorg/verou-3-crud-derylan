<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>
</head>
<body>

<h1>Track your collection of Mario Games</h1>

<table>
    <th>Name</th>
    <th>Year</th>
    <th>Console</th>
    <th>Edit</th>
    <?php foreach ($cards as $card) : ?>
        <tr>
        <td><?= $card['name'] ?></td>
        <td><?= $card['year'] ?></td>
        <td><?= $card['console'] ?></td>
        <td><a href="<?= "?id={$card['id']}&action=modify"?>">Modify</a></td>
        <td><a href="?action=delete&id=<?=$card['id']?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="create.php">Add new data</a>

<?php var_dump($_GET)?>
</body>
</html>