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

<?php include 'xh.php'; ?>
        <!-- Info boxes -->
        <!-- Your Page Content Here ..................................................................-->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
        <table cellpadding="1" cellspacing="1" id="users" width="100%" class="table table-bordered table-hover ">
          <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>LOCATION</th>
            <th>MOBILE NUMBER</th>
            <th>STATUS</th>
            <th>RENT</th>
          </tr>
          </thead>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>Sir Name</th>
            <th>Other Names</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Status</th>
          </tr>
          </tfoot>
        </table>

        <script type="text/javascript">
          $(document).ready(function () {
            $('#users').DataTable({
              "columns": [
                {"data": "id"},
                {"data": "apart_name"},
                {"data": "apart_loc"},
                {"data": "mobile_num"},
                {"data": "apart_status"},
                {"data": "apart_price"}
              ],
              "processing": true,
              "serverSide": true,
              "ajax": {
                url: 'datatable/allapartments.php',
                type: 'POST'
              }
            });
          });
        </script>
<script>
    $(function () {
        $("#users").DataTable();
        $('#').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    });
</script>

        <!-- ........................................................................... -->
<?php include "xf.php"; ?>