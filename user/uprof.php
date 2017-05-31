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

        case 4:
            header('Location:../admin/index.php');//redirect to  page
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
<?php

include '../connection/conn.php';
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userid']) && isset($_SESSION['category'])) {
      switch($_SESSION['category']) {


                case 1:
      		header('location:../index.php');//redirect to  page
      		break;

		case 4:
		  header('location:../index.php');//redirect to  page
        break;

      }
	  }else
	  {

header('Location:index.php');
}

?>

<?php
include '../connection/dbconn.php';
//mag show sang information sang user nga nag login
$userid=$_SESSION['userid'];

$result=mysql_query("SELECT * from users where userid='$userid'")or die(mysql_error);
$row=mysql_fetch_array($result);

$SirName=$row['sirname'];
$OtherNames=$row['othernames'];
$UserName=$row['username'];
$mobnum=$row['phonenum'];
?>
<?php include 'xh.php';?>

        <!--<p class="login-box-msg">Register a new Apartment </p>-->

        <form id="newapartment" method="POST" action="">
          <div class="form-group has-feedback">
              <label> Username </label>

              <input type="text" autocomplete="off" width="50%" class="form-control" id="" readonly="" name="username" placeholder="" value="<?php echo ''.$UserName.'';?>"/>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
              <label> Other Names</label>
              <input type="text" class="form-control" autocomplete="off" placeholder="" name="other_names" minlength="3" value="<?php print "".$OtherNames."" ?>" required/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
              <label> Sir Name</label>
              <input type="text" class="form-control" autocomplete="off" placeholder="" name="sir_name" minlength="3" value="<?php print "".$SirName."" ?>" required/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
              <label>Password</label>
              <input type="password" class="form-control" autocomplete="off" placeholder="" name="pass" minlength="3" value="" required/>
                <span class="glyphicon glyphicon-qrcode form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <label>Confirm Password</label>
              <input type="password" class="form-control" autocomplete="off" placeholder="" name="re_pass" minlength="3" value="" required/>
                <span class="glyphicon glyphicon-qrcode form-control-feedback"></span>
          </div>

            <div class="form-group">
                <button type="submit" value="" name="updatepo" class="btn btn-primary btn-flat">Save Information</button>

            </div>


        </form>

    <?php
            if (isset($_POST['updatepo'])){
                include("../connection/conn.php");
                $Usernamep=$_POST['username'];
                $OtherNamesp=$_POST['other_names'];
                $Sirnamep=$_POST['sir_name'];

                $mypassword=$_POST['pass'];
                $repassword=$_POST['re_pass'];
                //before ecrypt

                $encrypted=hash("sha256" ,$mypassword);

                if ($mypassword == $repassword)
                    {
                $query="UPDATE users SET username='$Usernamep' , othernames='$OtherNamesp' , sirname='$Sirnamep' ,password='$encrypted',pass_status='secure' WHERE userid='".$userid."'";


              //logs
              $log_query=mysql_query("INSERT INTO logs(`activity`,`activity_by` ,`date`)
                        VALUES('Profile updated','By user' , now() )
                        ")or die(mysql_error());
              //end of logs

                if(!mysql_query($query,$conn))
                {die ("An unexpected error occured while activating Please try again!");}


                ?>

                <script type="text/javascript">
                    alert('Information updated');
                    window.location="../logout.php";
                </script>

                <?php
            }

            ?>
            <script type="text/javascript">
                    alert('Incorrect password combination');
                    window.location="";
            </script>
            <?php
            }
            ?>



    <!-- Main content -->    <!-- right col -->
<?php include 'xf.php';?>
