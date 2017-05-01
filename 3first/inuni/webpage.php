<?php
class WebPage
{
	private $title;
	private $stylesheet;
	private $author;
	private $year;
	
	function __construct($titleIn)
	{
		$this->title=$titleIn;
	}
	
	function open()
	{
	echo " <!DOCTYPE html>";
	echo'<html lang="en-US">';
	}
	
	function setCSS($stylesheetIn)
	{
		$this->stylesheet = $stylsheetIn;
	}
	
	function writeHead()
	{
	echo " <title>" . $this->title . "</title>" . '<link rel="stylesheet" href="' . $this->stylesheet . '">';
	}
	
	function writeHeading()
	{
	echo "<h1>" . $this->title . "</h1>" . "<hr />";
	}
	
	function writeFooter()
	{
	echo '<div id="footer"> ';
	echo "This website copyright (c) " . $this->author . " " . $this->year;
	echo "</div>";
	}
	//<div id="footer">
//Copyright
//</div>

	function close()
	{
	echo "</body>";
	echo "</html>";
	}
};	
$webpage1= new WebPage("Weboldal Tim");
//$student2= new Student("Mike","Gaming");

//$student1->setMark(101);
//$student1->printDetails();
$webpage1->open();	
$webpage1->setCSS($stylesheet);
$webpage1->writeHead();
$webpage1->writeHeading();
$webpage1->writeFooter();
$webpage1->close();

?>	