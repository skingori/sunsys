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

<?php
//mag show sang information sang user nga nag login
$userid=$_SESSION['userid'];
include("../connection/dbconn.php");

$result=mysql_query("SELECT * from users where userid='$userid'")or die(mysql_error);
$row=mysql_fetch_array($result);

$SirName=$row['sirname'];
$OtherNames=$row['othernames'];
$UserName=$row['username'];
$mobnum=$row['phonenum'];
?>

<?php include "xh.php";?>

        <!-- Info boxes -->
        <!-- Your Page Content Here ..................................................................-->
        <p> <a href="booking.php"><i class="fa fa-mail-reply-all"></i> Back</a></p>
        <?php


        $id=$_REQUEST['mobile_num'];


        $do=mysql_query("SELECT * from users where phonenum='$id' ")or die(mysql_error());
        $array=mysql_fetch_array($do);
        $count=mysql_num_rows($do);
        if($count >0)

        {

          ?>

          <table style="border: 3px double #FF6600; background:url(../images/back.jpg);background-size:cover; padding:12px; color:#003366">
            <tr>
              <td scope="col" colspan="3" align="center"> </td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="175" height="34">APARTMENT OWNER :</td>
              <td width="251"><?php echo $array['othernames'];?> </td>
              <td rowspan="5"><img src="../dist/img/user2-160x160.jpg" width="200" height="200"  id="images"/></td>
            </tr>
            <tr>
              <td>MOBILE NUMBER: </td>
              <td><?php echo $array['phonenum'];?></td>
            </tr>
            <tr>
              <td height="38">BANK NAME: </td>
              <td><?php echo $array['bank_name'];?></td>
            </tr>
            <tr>
              <td height="40">ACCOUNT NUMBER: </td>
              <td><?php echo $array['bank_account'];?> </td>
            </tr>


            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="center">SUN APARTMENTS</td>
            </tr>
          </table>
          <?php
        }
        ?>



        <!-- ...........................................................................-->

 <?php include "xf.php"; ?>
