<?php



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php foreach ($images as $item): ?>
<?php echo $item['title']; ?>
<?php endforeach; ?>
<a href="./add.php">Добавить фото</a>
</body>
</html>