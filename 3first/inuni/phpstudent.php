<?php
class Student
{
	private $name;
	private $course;
	private $mark;
	
	function __construct($nameIn,$courseIn)
	{
		$this->name=$nameIn;
		$this->course=$courseIn;
		$this->mark=0;
	}
	
	function printDetails()
	{
		echo "Name: " . $this->name . " , Course: " .$this->course;
		echo ", Mark is: " . $this->mark;  
		
		echo "<br />";
		
		if($this->mark < 0)
		{
			echo("The mark has to be between 0-100");
		}
		elseif($this->mark < 40)
		{
			echo("Fail");
		}
		elseif($this->mark<50)
		{
			echo("Third");
		}
		elseif($this->mark<70)
		{
			echo("Second");
		}
		elseif($this->mark<101)
		{
			echo("First");
		}
		else
		{
			echo("The mark has to be between 0-100");
		}
		
	}
	
	function setMark($markIn)
	{
		$this->mark=$markIn;
	}
	
};

$student1= new Student("Tim","Programming");
$student2= new Student("Mike","Gaming");

$student1->setMark(101);
$student1->printDetails();

?>	