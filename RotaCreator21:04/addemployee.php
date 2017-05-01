<?php

session_start();
$_SESSION['user_id'] = '1';

//echo $_SESSION['name'];
if (@$_SESSION['user_id']) {

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/RotaCreator/header.php";
    include_once($path);

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/RotaCreator/class.dbconnection.php";
    include_once($path);

    include_once("navbar.php");


    function GetEmployeeInfo($fname,$user_id){
        $db_connection = new dbConnection();
        $link = $db_connection->connect();
        $query = $link->query("SELECT * FROM Employee WHERE first_name = '$fname' AND users_user_ID='$user_id'");
        $rowCount = $query->rowCount();

        //echo $fname;
        //Check the connection
     /*   if ($db_connection->connect_error) {
            die("Connection failed: " . $db_connection->connect_error);
        }
        echo "Connected successfully in GetEmployeeInfo";
     */
        //echo $user_id;

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

    function add_emplo($user_id, $first_name, $last_name, $holiday_hours, $contracted_hourspw, $Shifts_shiftID, $Positions_positionID){
        $db_connection = new dbConnection();
        $link = $db_connection->connect();

        //Check the connecion
    /*
        if ($db_connection->connect_error) {
            die("Connection failed: " . $db_connection->connect_error);
        }
        echo "Connected successfully in add_emplo";
    */
        //    $query = $link->prepare("INSERT INTO employee (users_user_ID,first_name, last_name, holiday_hours, gender, dob, contracted_hourspw, phone, Shifts_shiftID, Positions_positionID, Address_idAddress) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        //   $values = array ($user_id,$first_name,$last_name, $holiday_hours, $gender, $dob, $contracted_hourspw, $phone, $Shifts_shiftID, $Positions_positionID, $Address_idAddress);
        $query = $link->prepare("INSERT INTO Employee (users_user_ID, first_name, last_name, holiday_hours, contracted_hourspw, Shifts_shiftID, Positions_positionID) VALUES(?,?,?,?,?,?,?)");
        $values = array ($user_id,$first_name,$last_name, $holiday_hours, $contracted_hourspw, $Shifts_shiftID, $Positions_positionID);
        $query->execute($values);
        $count = $query->rowCount();
       // echo $user_id,$first_name,$last_name,$holiday_hours,$contracted_hourspw,$Shifts_shiftID,$Positions_positionID;
       // echo $values [1];
        return $count;
    }




    if(isset($_POST['submit']))
    {
        $check_emp = GetEmployeeInfo($_POST['fname'],$_SESSION['user_id']);

    //    echo $_POST['fname'];
    //    echo $_SESSION['user_id'];

        if($check_emp === 0){
            $count= add_emplo($_SESSION['user_id'],$_POST['fname'],$_POST['lname'],$_POST['holhours'],$_POST['cohours'],$_POST['shift'],$_POST['position']);

         //   echo $_SESSION['user_id'],$_POST['fname'],$_POST['lname'],$_POST['holhours'],$_POST['cohours'],$_POST['shift'],$_POST['position'];
         //   echo $user_id,$first_name,$last_name,$holiday_hours,$contracted_hourspw,$Shifts_shiftID,$Positions_positionID;
            echo $count [1];
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


} else {
    echo "You are not logged in yet. please go back and login again";
    exit();
}

?>



<div class="container">

    <div class="row">
        <div class="col-lg-6">
            <div class="jumbotron">
                Here can add an Employee to the database.
                <form class="form-horizontal" method="post" action="">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Add Employee</legend>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fname">First Name</label>
                            <div class="col-md-8">
                                <input id="fname" name="fname" type="text" placeholder=""
                                       class="form-control input-md" required="">
                                <span class="help-block">e.g John, Mike</span>
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="lname">Last Name</label>
                            <div class="col-md-8">
                                <input id="lname" name="lname" type="text" placeholder=""
                                       class="form-control input-md" required="">
                                <span class="help-block">e.g Costello</span>
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="holhours">Holiday Hours</label>
                            <div class="col-md-8">
                                <input id="holhours" name="holhours" type="text" placeholder=""
                                       class="form-control input-md" required="">

                            </div>

                        </div> <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cohours">Contracted Hours</label>
                            <div class="col-md-8">
                                <input id="cohours" name="cohours" type="text" placeholder=""
                                       class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="position">Position</label>
                            <div class="col-md-8">
                                <select id="position" name="position" class="form-control">
                                    <option value="1">Inspector</option>
                                    <option value="2">Dealer/Inspector</option>
                                    <option value="3">Dealer</option>

                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="shift">Shifts</label>
                            <div class="col-md-8">
                                <select id="shift" name="shift" class="form-control">
                                    <option value="1">Day shift only</option>
                                    <option value="2">Night shift only</option>
                                    <option value="3">Day and Night shifts</option>

                                </select>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="submit"></label>
                            <div class="col-md-4">
                                <button id="submit" name="submit" class="btn btn-success">Add Employee</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>


      <!--  --------------   -->
        <div class="col-lg-6">
            <div class="jumbotron">
                <?php
               // echo $_SESSION['user_id'];
                if($_SESSION['user_id']){

                    function deleteemp($empnu, $user_id){
                        $db_connection = new dbConnection();
                        $link = $db_connection->connect();
                        $link->query("DELETE FROM  `casino_emp`.`Employee` WHERE  `Employee`.`employee_number` ='$empnu' AND `Employee`.`users_user_ID`='$user_id'");
                    }
                    if(isset($_GET['delete'])){
                        deleteemp($_GET['id'],$_SESSION['user_id']);
                        echo 	'<div class="alert alert-success">  
                                <a class="close" data-dismiss="alert">X</a>  
                                <strong>Tada Success! </strong>Successfully Deleted.  
                                </div>';
                    }

                    // This function lists all the timetable created till now.. with options like delete, edit
                    function Employeelist($user_id){
                        $db_connection = new dbConnection();
                        $link = $db_connection->connect();
                        $query = $link->query("SELECT * FROM Employee WHERE users_user_ID='$user_id'");
                        $query->setFetchMode(PDO::FETCH_ASSOC);


                        echo
                            "<h2>List of Employees who Already Added</h2>".
                            "<table class='table'>".
                            "<thead>".
                            "<tr>".
                            "<th>First name</th>".
                            "<th>Last name</th>".
                            "<th>Holiday hours</th>".
                            "<th>Contracted hours</th>".
                            "<th>Position</th>".
                            "<th>Shift</th>".
                            "<th>Option</th>".
                            "</tr>".
                            "</thead>".
                            "<tbody>";

                        while($result = $query->fetch()){
                            echo "<tr>"
                                ."<td>".$result['first_name']."</td>"
                                ."<td>".$result['last_name']."</td>"
                                ."<td>".$result['holiday_hours']."</td>"
                                ."<td>".$result['contracted_hourspw']."</td>"
                                ."<td>".$result['Position_positionID']."</td>"
                                ."<td>".$result['Shifts_shiftId']."</td>"
                                ."<td><a href='addemployee.php?delete=true&id=".$result['employee_number']."'>Delete</a></td>"
                                ."</tr>".
                                "</tr>";
                        }
                        echo	"</tbody>".
                            "</table>".
                            "</div>";

                    }

                    Employeelist($_SESSION['user_id']);
                }
                else{
                    echo "You are not logged in yet. Please go back and login again";
                }
                ?>

            </div>
        </div>
    </div>



</div>



