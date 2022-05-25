<?php

require_once('connect.php');

foreach (json_decode($_GET['favourite']) as $good_id) {
  $result = $db->query("SELECT * FROM `goods` WHERE `id` = $good_id");

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data[] = [
        'id' => $row['id'],
        'title' => $row['title']
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
      window.location.replace("favourite.php?favourite=" + localStorage.favourite);
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
      <h1 class="title">Ваше обране</h1>
      <div class="goods-list">
        <?php foreach ($data as $item): ?>
          <div class="goods-list-item">
            <div class="goods-list-item-left">
              <p class="goods-list-item--name"><?=$item['title'];?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </main>
  </div>
  <script src="https://unpkg.com/vue@next"></script>
  <script src="js/main.js"></script>
</body>
</html>