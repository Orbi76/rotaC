<?php


class Student
{
    // Attributes
    private $name;
    private $course;
    
    // methods
    function __construct($nameIn,$courseIn)
    {
        $this->name=$nameIn;
        $this->course=$courseIn;
    }

    function display()
    {
        echo "Name " . $this->name . " Course " .$this->course;
        echo "<br />";
    }
};


$student1 = new Student("John" , "Software Engineering");
$student2 = new Student("Surjan" , "Web Design");
$student1->display();
$student2->display();
?>