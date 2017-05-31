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

      <?php
      include("../connection/dbconn.php");
      $query="SELECT * FROM users WHERE category<>'4' ";

      $resource=mysql_query($query,$conn);
      echo "
		<table align=\"center\" border=\"0\" width=\"100%\" class=\"table table-bordered table-striped\">
		<tr>
		<td><b>Names</b></td><td><b>Email</b></td><td><b>Category</b></td></td><td><b>Action</b></td></tr> ";
      while($result=mysql_fetch_array($resource))
      {
        echo "<tr><td>".$result[6]."&nbsp".$result[7]."</td><td>".$result[2]."</td><td>".$result[8]."</td><td>
	<a href=\"del_.php?userid=".$result[0]."\"><img border=\"0\" src=\"../images/deleter.png\"/></a>
	</td></tr>";
      } echo "</table>";
      ?>
      
<!-- ...........................................................................-->

<?php include 'xf.php'?>