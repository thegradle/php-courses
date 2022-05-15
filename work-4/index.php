<?php

class Student
{
    public $firstName;
    public $lastName;
    public $group;
    public $marks;

    public function __construct($firstName, $lastName, $group, $marks)
    {
        if (gettype($marks) != 'array')
        {
            throw new InvalidArgumentException(
                '$marks must be an array of integers'
            );
        }

        foreach ($marks as $mark) {
            if (gettype($mark) != 'integer')
            {
                throw new InvalidArgumentException(
                    '$marks must be an array of integers'
                );
            }
        }
        
        foreach ($marks as $mark) {
            if ($mark > 5 || $mark < 1)
            {
                throw new InvalidArgumentException(
                    'mark must be at least 1, but not bigger than 5'
                );
            }
        }
        
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->group = $group;
        $this->marks = $marks;
    }

    public function __toString()
    {
        return 'Student: ' . $this->firstName . ' ' . $this->lastName . ', ' . 
            $this->group . ' group, avarage mark is ' . $this->Mark();
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        return null;
    }

    public function Mark() {
        $sum = 0;

        foreach ($this->marks as $mark) {
            $sum += $mark;
        }

        return round(($sum / count($this->marks)), 1);
    }

    public function getScholarship() {
        if ($this->Mark() == 5)
        {
            return 100;
        }
        else
        {
            return 80;
        }
    }

    public function printScholarship() {
        echo 'Scolarship for ' . $this->firstName . ' ' . 
            $this->lastName . ' (' . $this->group .  ')' . 
            ': ' . $this->getScholarship() . ' грн <br>';
    }
}

class Aspirant extends Student
{
    public $scientificWork;

    public function __construct($firstName, $lastName, $group, $marks, $scientificWork)
    {
        parent::__construct($firstName, $lastName, $group, $marks);
        $this->scientificWork = $scientificWork;
    }

    public function __toString()
    {
        return 'Aspirant: ' . $this->firstName . ' ' . $this->lastName . ', ' . 
            $this->group . ' group, avarage mark is ' . $this->Mark() . 
            ', scientific work "' . $this->scientificWork . '"';
    }

    public function getScholarship() {
        if ($this->Mark() == 5)
        {
            return 200;
        }
        else
        {
            return 180;
        }
    }
}

$student = new Aspirant('John', 'Adams', 409, [5, 5], 'Important project');
echo $student . '<br>';
$student->printScholarship();
echo '<br>';

$students = [
    new Student('Jodie', 'Downs', 109, [4, 5]),
    new Aspirant('Aria', 'Cottrell', 409, [1], 'Very interesting project'),
    new Student('Chanelle', 'Dolan', 209, [5, 5])
];

foreach ($students as $student)
{
    $student->printScholarship();
}