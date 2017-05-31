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
$userid=$_SESSION['userid'];

$result=mysql_query("SELECT * from users where userid='$userid'")or die(mysql_error);
$row=mysql_fetch_array($result);

$SirName=$row['sirname'];
$OtherNames=$row['othernames'];
$UserName=$row['username'];
$mobnum=$row['phonenum'];

//this gets information of the related data

$result=mysql_query("SELECT * from apartments where owner_name='$OtherNames'")or die(mysql_error);
$row=mysql_fetch_array($result);

$apartment=$row['apart_name'];

?>
<?php include 'xh.php'; ?>
        <!-- Info boxes -->
        <div class="panel" id="activate">
          <div class="content_section">
            <div class="box">
              <div class="box-header">
                <h6 style="color: grey"> ALL APPLICATIONS.<br> P.O BOX 652567 NAIROBI.<br>
                  KENYA.<br>
                  PRINT BY: <?php echo "".$SirName."&nbsp;".$OtherNames.""; ?> <br>
                  MOBILE: <?php echo "$mobnum"; ?><br>
                  SIGN: ....................................
                </h6>
              </div>


              <?php
              include("../connection/dbconn.php");

              $query="SELECT * FROM booking WHERE apart_booked='$apartment' AND book_status='applied'";

              $resource=mysql_query($query,$conn);
              echo "
                                <table align=\"center\" border=\"\" width=\"100%\" class=\"table table-bordered table-striped\">
                                <tr>
                                <td><b>Apartment Name</b></td> <td><b>Booked By</b></td><td><b>Date to Start</b></td><td><b>Last Date</b></td><td><b>Deposit(Ksh)</b></td></tr> ";
              while($result=mysql_fetch_array($resource))
              {
                echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td><td>".$result[5]."</td></tr>";


                //get to tal amount
                $oamount=mysql_query("select SUM(deposit_paid) AS tamount FROM booking WHERE apart_booked='$apartment' AND book_status='applied'");
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

      <?php include 'xf.php'; ?>
