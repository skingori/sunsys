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
    $mobnum= $res['phonenum'];

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
<?php include 'xh.php'?>
<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 18/05/2017
 * Time: 17:00
 */
include_once "../connection/db.php";

if (isset($_GET['rep'])) {

    $id = $_GET['rep'];


    $result = mysqli_query($con, "SELECT * FROM booking WHERE id='$id' AND book_contact='$mobnum' AND cdate >= NOW() - INTERVAL 1 MINUTE"); // using mysqli_query instead

    ?>

    <!--<span class="input-group-btn">
        <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-print"></i></button>&nbsp;
        <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-file"></i></button>
      </span>-->

        <small style="color: grey"> ALL APPLICATIONS.<br> P.O BOX 652567 NAIROBI.<br>
          KENYA.<br>
          PRINT BY: <?php echo "".$sirname."&nbsp;".$othernames.""; ?> <br>
          MOBILE: <?php echo "$mobnum"; ?><br>
          SIGN: ....................................<p>
        </small>
    <table style="font-size: small" border=0 cellpadding="1" cellspacing="1" id="table1" width="100%" class="table table-hover table-condensed table-bordered table-striped">

        <tr>

            <td>APARTMENT</td>
            <td>NAME</td>
            <td>CONTACT</td>
            <td>FROM</td>
            <td>TO</td>
            <td>DEPOSIT</td>
            <td>CHARGES</td>
            <td>OPTION</td>
            <td>M-PESA REF</td>
            <td>BANK REF</td>

        </tr>
        <?php
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
        while($res = mysqli_fetch_array($result)) {
            echo "<tr style='background-color: lightblue'>";
            echo "<td class=''>".$res['apart_booked']."</td>";
            //echo "<td class=''>".$res['owner_num']."</td>";
            echo "<td>".$res['booked_by']."</td>";
            echo "<td>".$res['book_contact']."</td>";
            echo "<td>".$res['book_from']."</td>";
            echo "<td>".$res['book_to']."</td>";
            echo "<td>".$res['deposit_paid']."</td>";
            echo "<td>".$res['charges_paid']."</td>";
            echo "<td>".$res['paymentmode']."</td>";
            echo "<td>".$res['mpesaref']."</td>";
            echo "<td>".$res['bankref']."</td>";
            //echo "<td><a href=\"delete.php?fed=$res[feedback_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='fa fa-trash-o'></a></td>";
        }
        ?>
    </table>

    <?php

}
?>

<?php

include 'xf.php';
