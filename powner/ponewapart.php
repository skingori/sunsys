<?php
// Inialize session
session_start();
include '../connection/conn.php';
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userid']) && isset($_SESSION['category'])) {
      switch($_SESSION['category']) {


                case 2:
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

<?php include 'xh.php'; ?>
<!--................<!-- Your Page Content Here by samson --.................................content here -->


      <div class="box-body">
        <!--<p class="login-box-msg">Register a new Apartment </p>-->
<form id="newapartment" method="POST" action="">
  <div class="form-group has-feedback">
  <label>Apartment Name:</label><input type="text" name="apartname" placeholder="Enter Name" id="apartname" value="" class="form-control" required="">
      </div>
      <div class="form-group has-feedback">
        <label>Location:</label><input type="Text" placeholder="Location" name="apartloc" id="apartloc" value="" class="form-control">
      </div>
      <div class="form-group has-feedback">
        <label>Owner Name:</label><input type="Text" placeholder="" name="ownername" readonly="" id="ownername" value="<?php echo "".$OtherNames."";?>" class="form-control" required="">
      </div>
      <div class="form-group has-feedback">
        <label>Mobile Number:</label><input type="Text" placeholder="" name="mobilenum" id="mobilenum" readonly="" value="<?php echo $mobnum;?>" class="form-control" required="">
      </div>
      <div class="form-group has-feedback">
        <label>Units:</label><input type="Text" placeholder="Units Available" name="numunits" id="" value="" class="form-control">
      </div>
      <div class="form-group has-feedback">
        <label>Status:</label><select name="status" id="status" value="" class="form-control" required>
          <option value="new">New</option>
          <option value="good">Good condition</option>
          <option value="old"> Old </option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <label>Pricing:</label><input type="number" placeholder="Amount" name="price" id="price" value="" class="form-control" required="" />
      </div>

      <!---  upload code
      <div class="form-group has-feedback">
        <label>Upload Property Image:</label>
        <input type="file" name="image"  id="in" class="form-control" required />
      </div>
       upload code end


      <div class="form-group has-feedback">
        <label>Registration date:</label><input type="datetime" autocomplete="off"  placeholder="End date" name="regdate" id="datepicker" value="" class="form-control" required>
      </div>
      <!-- My personal code -->


      <!-- my personal code -->
      <!--<div class="form-group has-feedback">
        <label>Cancelation Charges:<i><font color="red"> *To be used in case of canceled booking* </i></font> </label><input type="number" placeholder="Add charges" name="cancelcharge" id="regdate" value="" class="form-control">
      </div>-->
      <div class="form-group has-feedback">
        <label>Furniture</label><textarea placeholder="Items to find from this apartment" name="furniture" id="" value="" class="form-control"></textarea>

      </div>

      <div class="form-group has-feedback">
        <label>Other Details:</label><textarea placeholder="Other details" name="otherdet" id="" value="" class="form-control"></textarea>
      </div>

      <div class="col-xs-4">
        <input type="submit" value="New Apartment" name="create" class="btn btn-primary">
        <input type="button" onclick="location.href='upload.php';" value="Next" class="btn btn-primary"/>
      </div>

</form>




  </div>


  <?php include '../connection/dbconn.php'; ?>
  <?php
  if (isset($_POST['create'])){
    $apartname=$_POST['apartname'];
    $apartloc=$_POST['apartloc'];
    $ownername=$_POST['ownername'];
    $mobilenum=$_POST['mobilenum'];
    $status=$_POST['status'];
    $price=$_POST['price'];
    $regdate=$_POST['regdate'];
    $numunits=$_POST['numunits'];
    //$cancelcharge=$_POST['cancelcharge'];
    $furniture=$_POST['furniture'];
    $otherdet=$_POST['otherdet'];


    ///your insert code//
//$encrypted = md5($password); // Encrypting pssword using md5 algo

      $query=mysql_query("INSERT INTO apartments(`apart_name`,`apart_loc`,`owner_name`,`mobile_num`,`apart_status`,`apart_price`,`regdate`, `num_units`,`furniture` ,`other_det` ,`logs`)
VALUES('$apartname','$apartloc','$ownername','$mobilenum','$status','$price','$regdate', '$numunits', '$furniture' ,'$otherdet' ,'Apartment added')
")or die(mysql_error());
      echo '<font color="Green"><b> Apartment added to list </font></b>';

//logs
    $log_query=mysql_query("INSERT INTO logs(`activity`,`activity_by` ,`date`)
                        VALUES('New apartment added','By property owner' , now() )
                        ")or die(mysql_error());
    //end of logs


  }?>


  <!-- end of your contet --------------<!--  END Your Page Content Here by samson -------------------------->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      version 1.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="http://tarclink.com">tarclink</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->



<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstra.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2-->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- InputMas->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script>
  $("#e1").select2();
</script>

</body>
</html>
