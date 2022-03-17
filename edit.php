<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="GET" action="index.php">
        <label for="name">Name</label>
        <input type="text" id="name" name="newName" value="<?=$fetch['name']?>">
        <label for="year">Year</label>
        <input type="text" id="year" name="newYear" value="<?=$fetch['year']?>">
        <label for="console">Console</label>
        <input type="text" id="console" name="newConsole" value="<?=$fetch['console']?>">
        <input type="submit" name="action" value="modify">
    </form>
</body>

</html>