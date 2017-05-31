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
    $mobile= $res['phonenum'];

}

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
//
?>

<?php include 'xh.php'; ?>
      <!-- Info boxes -->
  <div class="panel" id="activate">
                <div class="content_section">
                    <div class="box">
                        <div class="box-header">
                          <h6 style="color: grey"> ALL MY PROPERTIES.<br> P.O BOX 652567 NAIROBI.<br>
                            KENYA.<br>
                            PRINT BY: <?php echo "".$sirname."&nbsp;".$othernames.""; ?> <br>
                            MOBILE: <?php echo "$mobile"; ?><br>
                            SIGN: ....................................
                          </h6>
                          </div>


                <?php
                                 include("../connection/dbconn.php");

                         $query="SELECT * FROM apartments WHERE mobile_num='$mobile'";

                                  $resource=mysql_query($query,$conn);
                                  echo "
                                <table align=\"center\" border=\"\" width=\"100%\" class=\"table table-bordered table-striped\">
                                <tr>
                                <td><b>Apartment Name</b></td> <td><b>Owner Name</b></td><td><b>Located</b></td><td><b>Status</b></td><td><b>Rent(Ksh)</b></td></tr> ";
                while($result=mysql_fetch_array($resource))
                        {
                        echo "<tr><td>".$result[0]."</td><td>".$result[2]."</td><td>".$result[1]."</td><td>".$result[4]."</td><td>".$result[5]."</td></tr>";

                        }

                        echo "</table>";

                         ?>


                    </div>
                </div>


    </div>


<!-- ...........................................................................-->
<?php include 'xf.php'; ?>
