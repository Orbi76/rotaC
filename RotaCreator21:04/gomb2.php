<?php
session_start();
//$_SESSION['user_id'] = 'a';
echo $_SESSION['user_id'];
if(@$_SESSION['user_id']) {

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/RotaCreator/header.php";
    include_once($path);

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/RotaCreator/class.idedb.php";
    include_once($path);

    include_once("navbar.php");


    function GetSubjectInfo($nevk,$user_id){
        $db_connection = new dbConnection();
        $link = $db_connection->connect();
        $query = $link->query("SELECT * FROM ember WHERE kn = '$nevk' AND user_id='$user_id'");
        $rowCount = $query->rowCount();
        if($rowCount ==1)
        {
            $result = $query->fetchAll();
            return $result;
        }
        else
        {
            return $rowCount;
        }
    }

    function add_subjects($user_id,$fname,$sname,$age){
        $db_connection = new dbConnection();
        $link = $db_connection->connect();
        $query = $link->prepare("INSERT INTO ember (user_id,kn,vn,kor) VALUES(?,?,?,?)");
        $values = array ($user_id,$fname,$sname,$age);
        $query->execute($values);
        $count = $query->rowCount();
        return $count;
    }

    if(isset($_POST['submit']))
    {
        $check_subject = GetSubjectInfo($_POST['nevk'],$_SESSION['user_id']);
        if($check_subject === 0){
            $count= add_subjects($_SESSION['user_id'],$_POST['fname'],$_POST['sname'],$_POST['age']);

            if($count){

                echo 	'<div class="alert alert-success">  
					<a class="close" data-dismiss="alert">X</a>  
					<strong>Tada Success! </strong>Added Successfully.  
					</div>';
            }
            else{
                echo '<div class="alert alert-block">  
					<a class="close" data-dismiss="alert">X</a>  
					<strong>Opps Error!</strong>Not Added.  
					</div>';
            }
        }
        else{
            echo '<div class="alert alert-block">  
					<a class="close" data-dismiss="alert">X</a>  
					<strong>Opps Error!</strong>Subject Already Exists.  
					</div>';
        }

    }

}
else{
    echo "You are not logged in yet. please go back and login again";
    exit();
}






?>

<body>

<form class="form-horizontal" method="post" action="">


    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">First Name</label>
        <div class="col-md-1">
            <input id="fname" name="fname" type="text" placeholder="" class="form-control input-md" required="">
            <span class="help-block">e.g John, Mike</span>
        </div>
    </div> <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">Sure Name</label>
        <div class="col-md-1">
            <input id="sname" name="sname" type="text" placeholder="" class="form-control input-md" required="">

        </div>
    </div> <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">Age</label>
        <div class="col-md-1">
            <input id="age" name="age" type="text" placeholder="" class="form-control input-md" required="">

        </div>
    </div> <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">Ude</label>
        <div class="col-md-1">
            <input id="ude" name="ude" type="text" placeholder="" class="form-control input-md" required="">

        </div>
    </div>


    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="submit"></label>
        <div class="col-md-8">
            <button id="submit" name="submit" class="btn btn-primary">Add name</button>
        </div>
    </div>


</form>
</body>

