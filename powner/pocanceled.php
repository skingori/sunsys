<?php
// Inialize session
session_start();
include '../connection/conn.php';
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userid']) && isset($_SESSION['category'])) {
    switch($_SESSION['category']) {

        case 4:
            header('Location:../admin/index.php');//redirect to  page
            break;
        case 2:
            header('Location:../user/index.php');//redirect to  page
            break;


    }
}
elseif(!isset($_SESSION['userid']) && !isset($_SESSION['category'])) {
    header('Location:../sessions.php');
} else
{

    header('Location:index.php');
}

?>


<?php


//mag show sang information sang user nga nag login
include '../connection/db.php';

$uname=$_SESSION['userid'];

$result1 = mysqli_query($con,"SELECT * FROM users WHERE userid='$uname'");

while($res = mysqli_fetch_array($result1))
{
    $sirname= $res['sirname'];
    $othernames= $res['othernames'];
    $username= $res['username'];
    $mobile= $res['phonenum'];

}

//this gets information of the related data

$result=mysql_query("SELECT * from apartments where owner_name='$OtherNames'")or die(mysql_error);
$row=mysql_fetch_array($result);

$apartment=$row['apart_name'];

?>

<?php include 'xh.php';?>
        <!-- Info boxes -->
        <div class="panel" id="activate">
          <div class="content_section">
            <div class="box">
              <div class="box-header">
                <h6 style="color: grey"> CANCELED APPLICATIONS.<br> P.O BOX 652567 NAIROBI.<br>
                  KENYA.<br>
                  PRINT BY: <?php echo "".$sirname."&nbsp;".$othernames.""; ?> <br>
                  MOBILE: <?php echo "$mobile"; ?><br>
                  SIGN: ....................................
                </h6>
              </div>


              <?php
              include("../connection/dbconn.php");

              $query="SELECT * FROM booking WHERE apart_booked='$apartment' AND book_status='canceled'";

              $resource=mysql_query($query,$conn);
              echo "
                                <table align=\"center\" border=\"\" width=\"100%\" class=\"table table-bordered table-striped\">
                                <tr>
                                <td><b>Apartment Name</b></td> <td><b>Canceled by</b></td><td><b>Unit Booked</b></td><td><b>Date booked</b></td><td><b>Charges Paid</b></td></tr> ";
              while($result=mysql_fetch_array($resource))
              {
                echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[11]."</td><td>".$result[2]."</td><td>".$result[9]."</td></tr>";

                //get to tal amount
                $oamount=mysql_query("select SUM(charges_paid) AS tamount FROM booking WHERE apart_booked='$apartment' AND book_status='canceled'");
                $fetch=mysql_fetch_array($oamount);

                //display total amount
                // echo "<tfoot><td><font color='#9932cc'><b>TOTAL AMOUNT:</b></font> </td><td></td><td></td><td></td><td>".$fetch[tamount]."</td></tfoot>";
                //print '<br/><hr/>Total: '.$fetch['tamount'].' /=  <br/><br/><hr/>';
                // end of display
              }

              echo "</table>";

              ?>
              <?php
              print '<b><hr/> &nbsp;&nbsp;Total Amount: '.$fetch['tamount'].' /= </b> <hr/>';
              ?>


            </div>
          </div>


        </div>


        <!-- ...........................................................................-->

<?php include 'xf.php';?>
