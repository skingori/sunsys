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
<?php include 'xh.php'?>

      <!-- Your Page Content Here ..................................................................-->
<section class="content">
      <!-- Info boxes -->
  <div class="panel" id="activate">
                <div class="content_section">
                <div class="box">
                        <div class="box-header">
                            <span class="input-group-btn">

                            <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-print"></i></button>&nbsp;
                            <button type='submit' name='search' id='print' onclick="printData();" class="btn btn-flat btn-default "><i class="fa fa-file"></i></button>
                            </span>
                          </div>

                <?php 
                                 include("../connection/dbconn.php");	
                         $query="SELECT * FROM booking where book_status='paid'";

                                  $resource=mysql_query($query,$conn);
                                  echo "
                                <table align=\"center\" border=\"0\" width=\"100%\" class=\"table table-bordered table-striped\" id=\"table1\">
                                <tr>
                                <td><b>Apartment Name</b></td> <td><b>Booked by</b></td><td><b>Date booked</b></td><td><b>Deposit Paid</b></td><td><b>Balance Paid(Kshs)</b></td></tr>";
                while($result=mysql_fetch_array($resource))
                        { 
                        echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[5]."</td><td>".$result[6]."</td></tr>";
                        
                        } 
                        
                        echo "</table>";
                        
                         ?>

                </div>

                </div>


    </div>       
      
      
<!-- ...........................................................................-->

<?php include 'xf.php'?>
