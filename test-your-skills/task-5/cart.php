<?php

require_once('connect.php');

foreach (json_decode($_GET['cart']) as $good) {
  $id = $good[0];

  $selected[] = $good[1];
  $result = $db->query("SELECT * FROM `goods` WHERE `id` = $id");

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data[] = [
        'id' => $row['id'],
        'title' => $row['title'],
        'availability' => $row['availability']
      ];
    }
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
  <script>
    if (!window.location.href.includes('?')) {
      window.location.replace("cart.php?cart=" + localStorage.cart);
    }
  </script>
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
      <h1 class="title">Корзина</h1>
      <div class="goods-list">
        <?php foreach ($data as $key => $item): ?>
          <div class="goods-list-item">
            <div class="goods-list-item-left">
              <p class="goods-list-item--name"><?=$item['title'];?></p>
            </div>
            <div class="goods-list-item-right">
              <p class="goods-list-item-right--count">
                Кількість: <?=($selected[$key] > $item['availability']) ? $item['availability'] : $selected[$key];?>
              </p>
            </div>
            <?php if ($selected[$key] > $item['availability']): ?>
              <p>Зверніть увагу: обрана кількість товару перевищує за наявність, встановлено максимальну можливу кількість товару.</p>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </main>
  </div>
  <script src="https://unpkg.com/vue@next"></script>
  <script src="js/main.js"></script>
</body>
</html>