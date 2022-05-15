<?php

class Bag {
  private $things = [];

  function __construct($things) {
    $this->things = $things;
  }

  function getSum() {
    return array_sum($this->things);
  }
}

function getDifference(Bag $bag, $insurance) {
  return $bag->getSum() - $insurance;
}

$bag = new Bag([
  'scate' => 200, 
  'painting' => 200, 
  'shoes' => 1]);

echo getDifference($bag, 400);