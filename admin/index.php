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
<?php include 'xh.php' ?>
      <!-- Your Page Content Here -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><a href="viewallapart.php"><i class="fa fa-home"></i></a></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Properties</span>
                            <span class="info-box-number"><small>View All</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><a href="canceled.php"><i class="fa fa-minus"></i></a></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Canceled</span>
                            <span class="info-box-number"><small>All canceled</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><a href="fullypaid.php"><i class="fa fa-paypal"></i></a></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Fully Paid</span>
                            <span class="info-box-number"><small>Payment Report</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><a href="allusers.php"><i class="ion ion-ios-people-outline"></i></a></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Users</span>
                            <span class="info-box-number"><small>All Users</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><a href="viwdamage.php"><i class="ion ion ion-bonfire"></i></a></span>

                        <div class="info-box-content">
                            <span class="info-box-text">DAMAGES</span>
                            <span class="info-box-number"><small>View All</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><a href="viewpolicy.php"><i class="ion ion-easel"></i></a></span>

                        <div class="info-box-content">
                            <span class="info-box-text">POLICIES</span>
                            <span class="info-box-number"><small>View Policy</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red-gradient"><a href="ecard.php"><i class="ion ion-card"></i></a></span>

                        <div class="info-box-content">
                            <span class="info-box-text">E-CARD</span>
                            <span class="info-box-number"><small>On Progress</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><a href="pos.php"><i class="ion ion-android-cart"></i></a></span>

                        <div class="info-box-content">
                            <span class="info-box-text">POS</span>
                            <span class="info-box-number"><small>Coming Soon</small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

        <!-- /.col -->

        <!-- -->

<?php include'xf.php' ?>