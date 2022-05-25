<?php

require_once('connect.php');

$result = $db->query("SELECT * FROM `goods`");
$data = [];

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'title' => $row['title'],
      'img-path' => $row['img-path'],
      'availability' => $row['availability']
    ];
  }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roketka — Найкращий інтернет-магазин</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container" id="app">
    <header>
      <div class="header-brand">
        <h1 class="header-brand--name">Roketka</h1>
      </div>
      <div class="header-menu">
        <a href="index.php" class="header-menu--item">Головна</a>
        <a href="favourite.php" class="header-menu--item">Обране ({{ favourite_size }})</a>
        <a href="cart.php" class="header-menu--item">Корзина ({{ cart_size }})</a>
      </div>
    </header>
    <main>
      <h1 class="title">Каталог</h1>
      <div class="catalog">
        <?php foreach ($data as $item): ?>
          <div class="catalog-item">
            <img src="img/<?=$item['img-path'];?>" alt="<?=$item['title'];?>" class="catalog-item--img">
            <p class="catalog-item--name"><?=$item['title'];?></p>
            <a href="#" class="catalog-item--btn <?=($item['availability'] == 0) ? "catalog-item--btn__disabled" : "" ?>" @click="addToCart(<?=$item['id'];?>)">Купити</a>
            <a href="#" class="catalog-item--btn" @click="addToFavourite(<?=$item['id'];?>)">Додати в обране</a>
          </div>
        <?php endforeach; ?>
      </div>
    </main>
  </div>
  <script src="https://unpkg.com/vue@next"></script>
  <script src="js/main.js"></script>
</body>
</html>