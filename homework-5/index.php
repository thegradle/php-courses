<?php

class Animal 
{
	public $food;
	public $location;
	
	public function __construct($food, $location)
	{
		$this->food = $food;
		$this->location = $location;
	}
	
	public function makeNoise() 
	{
		echo 'Така тварина спить';
	}
	
	public function eat() 
	{
		echo 'Така тварина їсть: ';
	}
	
	public function sleep() 
	{
		
	}
	
	public function getFood() 
	{
		return $this->food;
	}
	
	public function getLocation() 
	{
		return $this->location;
	}
}

class Dog extends Animal 
{
	public $breed;
	
	public function makeNoise() 
	{
		echo 'Гав';
	}
	
	public function eat() 
	{
		parent::eat();
		echo 'кістку';
	}
}

class Cat extends Animal 
{
	public $breed;
	
	public function makeNoise() 
	{
		echo 'Мяу';
	}
	
	public function eat() 
	{
		parent::eat();
		echo 'сметану';
	}
}

class Horse extends Animal 
{
	public $speed;
	
	public function makeNoise() 
	{
		echo 'Гага';
	}
	
	public function eat() 
	{
		parent::eat();
		echo 'яблуко';
	}
}

class Veterinarian
{
	public function treatAnimal(Animal $animal)
	{
		echo $animal->getFood() . ' ' . $animal->getLocation();
	}
}

$animals = [
	new Dog('food1', 'location1'),
	new Cat('food2', 'location2'),
	new Horse('food3', 'location3')
];

$veterinarian = new Veterinarian();
foreach ($animals as $animal)
{
	$veterinarian->treatAnimal($animal);
	echo '<br>';
}