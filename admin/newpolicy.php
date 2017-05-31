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


<?php include "xh.php";?>

      <!-- Your Page Content Here by samson -->

        <!--<p class="login-box-msg">Register a new Apartment </p>-->
        
        <form id="newapartment" method="POST" action="">
            
        <div class="form-group has-feedback">
            <input type="text" name="policynum" pattern="[a-zA-Z\s]+" placeholder="Policy Number" value="" class="form-control" required>
        </div>
        <div class="form-group has-feedback">
            <input type="Text" placeholder="Policy" pattern="[a-zA-Z\s]+" name="policytype"  value="" class="form-control" required>
        </div>
        <div class="form-group has-feedback">
         <textarea placeholder="Other Details" pattern="[a-zA-Z\s]+" name="odtails" value="" class="form-control" required></textarea>
        </div>


            <div class="form-group">
                <button type="submit"  name="policy" class="btn btn-primary bg-red btn-flat">New Policy</button>
         
            </div>
            
            
        </form>
    
    
    <?php include '../connection/dbconn.php'; ?>
    <?php
    if (isset($_POST['policy'])){
$policynum=$_POST['policynum'];
$policy=$_POST['policytype'];
$otherdet=$_POST['odtails'];


if($policy !=''||$policynum !=''){
//$encrypted = md5($password); // Encrypting pssword using md5 algo
$query=mysql_query("INSERT INTO policy(`policynumber`,`policytype`,`otherdetails`,`logs`)
VALUES('$policynum','$policy','$otherdet','Policy added by admin')
")or die(mysql_error());
echo '<font color="Green"><b> Policy added to list </font></b>';
}
 else {
    echo '<font color="red"><b> Empty fields not allowed </font></b>';
}
    }
    
?>    
        <!--
       Add content here 
        -->
    <?php include "xf.php"; ?>