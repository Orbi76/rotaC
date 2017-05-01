<?php

$ID = $_GET["ID"];
echo " You will give a review from this poi which ID is : $ID";
?>
<form method="post" action="webreview.php">
    <p>Pleas Add a review.<br />
    <p>Poi ID:<input type="text" name="poi_id" value="<?php echo $ID; ?>" /></p>
    <p>Your review:<textarea name="review" rows="5" cols="40"></textarea></p>




    <input type="submit" value="Submit Review"/><br />
</form>





