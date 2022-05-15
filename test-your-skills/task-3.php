<?php

function compareFloat($value1, $value2) {
  $epsilon = 0.00001;

  if (abs($value1 - $value2) < $epsilon) {
    return true;
  } else {
    return false;
  }
}

function getTotal($goods) {
  $discount_number = 0;
  $discount_total = 0;
  $max_discount_price = $goods[0];
  $total = 0;

  foreach ($goods as $good) {
    if (compareFloat($good - intval($good), 0.99)) {
      $discount_number++;
      $discount_total += $good;

      if ($max_discount_price < $good) {
        $max_discount_price = $good;
      }
    } else {
      $total += $good;
    }
  }

  if ($discount_number >= 3) {
    return $total + $max_discount_price;
  } else {
    return $total + $discount_total;
  }
}

echo getTotal([2.99, 1.99, 5]);
