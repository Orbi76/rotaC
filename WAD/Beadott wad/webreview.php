<?php



$review = $_POST['review'];
$poi_id = $_POST['poi_id'];



if ($review == '' || !isset($review))
{
    header("HTTP/1.1 400 Not Found");
    echo" your review cant be blank !";
}
elseif ( $poi_id=='' || !isset($poi_id))
{
    header("HTTP/1.1 400 Not Found");
    echo" The given id does not exist!";
}

else
{

// Connect to the database
$conn = new PDO("mysql:host=localhost;dbname=gorban;", "gorban", "kaihiegh");
//    $conn = new PDO("mysql:host=localhost;dbname=gabordb;", "root", "root");
//huuwaisa a masik jelszo


    $results = $conn->query("select * from pointsofinterest where ID ='$poi_id'");
    $row = $results->fetch();
//echo "$results.row["name"] ";

//    echo " .$row['name'] . ";
//echo "<p>Sofar $old_recommendation people recommend this venue, but </p>";

        if ($row == 0) {
            echo " The given poi_id ID does not exist";

        } else {

            echo " name of the given poi ID is: $row[name]<br/>";
            $result = $conn->query("INSERT INTO poi_reviews (poi_id,review) VALUES ('$poi_id','$review')");

            echo "<p>Thank you for your review. This is your review what we added to the database: </p>";
            echo "<p>$review <p/>";

        }

}
//  http://localhost:8888/WAD/Assign/webreview.php?poi_id=3,review=valami
?>