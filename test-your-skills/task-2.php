<?php

if ($_GET) {
  $good_prop = [$_GET['good-height'], $_GET['good-width'], $_GET['good-depth']];
  $door_prop = [$_GET['door-height'], $_GET['door-width']];
}

?>

<form method="GET">
  <p>Розмір товару:</p>
  <input type="number" name="good-height" placeholder="висота" value="<?=$good_prop[0]; ?>">
  <input type="number" name="good-width" placeholder="ширина" value="<?=$good_prop[1]; ?>">
  <input type="number" name="good-depth" placeholder="глибина" value="<?=$good_prop[2]; ?>">
  <p>Розмір дверей:</p>
  <input type="number" name="door-height" placeholder="висота" value="<?=$door_prop[0]; ?>">
  <input type="number" name="door-width" placeholder="ширина" value="<?=$door_prop[1]; ?>"><br><br>
  <input type="submit" value="Розрахувати">
</form>

<?php

if (!$_GET) return;

rsort($good_prop);
rsort($door_prop);

if ($good_prop[0] <= $door_prop[0]) {
  echo 'Влізе';
} else {
  echo 'Не влізе';
}