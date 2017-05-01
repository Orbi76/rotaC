
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>recommend.php</title>
    <link rel="stylesheet" type="text/css" href="rcp.css"/>
</head>


<body>


<div id="main">
    <?php

        $ID = $_GET["ID"];

        // connect to the database
        $conn = new PDO("mysql:host=localhost;dbname=wadsongs;", "root", "root");
        // get details of the venue using the id
        $results = $conn->query("SELECT * FROM likes WHERE ID='$ID'");
        $row = $results->fetch();
        $old_likes = $row['likes'];

        $sql = "UPDATE likes SET recommended = recommended+1 WHERE ID='$ID'";
        $q = $conn->prepare($sql);
        $q->execute();
        $results = $conn->query("SELECT * FROM venues WHERE ID=$ID");
        $row = $results->fetch();
        $new_ = $row['recommended'];
        echo"<p><br />";
        echo "<p>Sofar $old_recommendation people recommend this venue, but </p>";
        echo "<p>with your vote now $new_recommendation people offer this place! </p>";
        echo "<p/>";


    ?>

</div>

<?php include 'footer.php';
write_footer();
?>

</body>
</html>