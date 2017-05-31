<?php
// Inialize session
session_start();

include '../connection/db.php';

$uname=$_SESSION['userid'];

$result1 = mysqli_query($con,"SELECT * FROM users WHERE userid='$uname'");

while($res = mysqli_fetch_array($result1))
{
    $sirname= $res['sirname'];
    $othernames= $res['othernames'];
    $username= $res['username'];

}

if (isset($_SESSION['userid']) && isset($_SESSION['category'])) {
    switch($_SESSION['category']) {

        case 2:
            header('Location:../user/index.php');//redirect to  page
            break;
        case 1:
            header('Location:../powner/index.php');//redirect to  page
            break;


    }
}
elseif(!isset($_SESSION['userid']) && !isset($_SESSION['category'])) {
    header('Location:../sessions.php');
} else
{

    header('Location:index.php');
}
//
?>
<?php include 'xh.php' ?>
      <!-- Your Page Content Here by samson -->
      


        <!--<p class="login-box-msg">Register a new Apartment </p>-->
        
        <form id="newapartment" method="POST" action="">
            
        <div class="form-group has-feedback">
            <input type="text" name="damageby" pattern="[a-zA-Z\s]+" placeholder="Damage Caused by" value="" class="form-control" required>
        </div>
        <div class="form-group has-feedback">
            <input type="number" placeholder="Mobile Number"  name="dmobnumber"  value="" class="form-control" required>
        </div>
        <!--<div class="form-group has-feedback">
            <input type="Text" placeholder="Date today" name="date"  value="" class="form-control" required>
        </div>-->
        <div class="form-group has-feedback">
          <input type="Text" placeholder="Damage" pattern="[a-zA-Z\s]+" name="damage"  value="" class="form-control" required>
        </div>
        <div class="form-group has-feedback">
          <input type="number" placeholder="Charges" name="charges"  value="" class="form-control" required>
        </div>
        <div class="form-group has-feedback">
         <textarea placeholder="Other Details" pattern="[a-zA-Z\s]+" name="otherdtails" value="" class="form-control" required></textarea>
        </div>


            <div class="form-group">
                <button type="submit"  name="policy" class="btn btn-flat bg-red">Add Damage</button>

            </div>
            
            
        </form>
    

    <?php
include("../connection/dbconn.php");
    if (isset($_POST['policy'])){
$damageby=$_POST['damageby'];
$mobile=$_POST['dmobnumber'];
//$date=$_POST['date'];
$damage=$_POST['damage'];
$charges=$_POST['charges'];
$otherdetails=$_POST['otherdtails'];

if($damageby !=''||$damage !=''){
//$encrypted = md5($password); // Encrypting pssword using md5 algo
$query=mysql_query("INSERT INTO damages(`damageby`,`mobilenumber`,`date_reg`,`damage` ,`charges` ,`otherdetails` ,`logs`)
VALUES('$damageby','$mobile',now() ,'$damage','$charges','$otherdetails' ,'Damage added by admin')
")or die(mysql_error());


  //logs
  $log_query=mysql_query("INSERT INTO logs(`activity`,`activity_by` ,`date`)
                        VALUES('Damage Addaed','By admin' , now() )
                        ")or die(mysql_error());
  //end of logs
    ?>

    <script type="text/javascript">
        alert('Damage added to list');
        window.location="ad_damage.php";
    </script>

    <?php
}
 else {
    echo '<font color="red"><b> Empty fields not allowed </font></b>';
}
    }
    
?>    
        <!--
       Add content here
        -->
<?php include 'xf.php' ?>