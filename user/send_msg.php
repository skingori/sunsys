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
// Inialize session
session_start();
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
            <input type="text" name="sent_by" readonly placeholder="" value="<?php echo "".$OtherNames."";?>" class="form-control" required>
          </div>
          <div class="form-group has-feedback">
            <input type="Text" readonly placeholder="" name="contact"  value="<?php echo "$mobnum";?>" class="form-control" required>
          </div>
          <div class="form-group has-feedback">
            <select value=" " name="apartment" id="apartment" placeholder="Current Apartment"  class="form-control" required >
            <option>
            <option>
            <?php
            $result = mysql_query("SELECT apart_name FROM apartments ");
            while($row = mysql_fetch_array($result))
              {
                echo '<option value="'.$row['apart_name'].'">';
                echo $row['apart_name'];
                echo '</option>';
              }
            ?>
          </select>
          </div>
          <div class="form-group has-feedback">
            <select id="" name="msgtype" required  class="form-control">
              <option value="1">Message</option>
              <option value="2">Complaint</option>
            </select>
          </div>
          <div class="form-group has-feedback">
            <textarea placeholder="Type your message here" autofocus rows="10" cols="80" name="message" value="" class="form-control" required></textarea>
          </div>


          <div class="form-group">
            <button type="submit"  name="policy" class="btn btn-primary btn-flat bg-olive">Submit</button>

          </div>


        </form>

      <?php
      include '../connection/dbconn.php';
      if (isset($_POST['policy'])){
        $sent_by=$_POST['sent_by'];
        $contact=$_POST['contact'];
        $apartment=$_POST['apartment'];
        $msgtype=$_POST['msgtype'];
        $message=$_POST['message'];


         if($message !=''||$apartment !=''){
        //$encrypted = md5($password); // Encrypting pssword using md5 algo
         $query=mysql_query("INSERT INTO message(`type`,`message`,`sent_by` ,`apartment` ,`contact_num` , `msg_status` ,`date_sent`)
        VALUES('$msgtype','$message','$sent_by' ,'$apartment','$contact' ,'unread' ,'now()')
        ")or die(mysql_error());


          //logs
          $log_query=mysql_query("INSERT INTO logs(`activity`,`activity_by` ,`date`)
                        VALUES('message Addaed','By user' , now() )
                        ")or die(mysql_error());
          //end of logs

          echo '<font color="Green"><b> Message sent </font></b>';
        }
        else {
          echo '<font color="red"><b> Empty fields not allowed </font></b>';
        }
      }
      ?>

    <?php include 'xf.php';?>
