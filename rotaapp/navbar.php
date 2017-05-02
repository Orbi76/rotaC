<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">Rota Creator</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="datepicker.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="datepic.php"><span class="glyphicon glyphicon-user"></span> Choose Employee</a></li>
                <li><a href="addemployee.php"><span class="glyphicon glyphicon-book"></span> Add Employee</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-book"></span> Log in!</a></li>
                <li><a href="table_insp.php"><span class="glyphicon glyphicon-book"></span> Table!</a></li>
                <li><a href="tableweek.php"><span class="glyphicon glyphicon-book"></span> Tableweek!</a></li>


                <!--  <li><a href="add.course.php"><span class="glyphicon glyphicon-education"></span> Add Course</a></li>
                  <li><a href="edit.timing.php"><span class="glyphicon glyphicon-time"></span> Timing</a></li>
                  <!--<li><a href="teaching.load.php">Teaching Load</a></li>
                  <li><a href="subject.allocation.php">Subject Allocation</a></li>
                  <li><a href="help.php">Help</a></li>  -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>Welcome <?php if(@$_SESSION['name'])echo $_SESSION['name']; ?></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
            </ul>
        </div>
    </div>
</nav>



