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


<?php
include "xh.php";
?>
                <!-- Info boxes -->
                <!-- Your Page Content Here ..................................................................-->
                <link rel="stylesheet" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
                <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
                <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
                <table cellpadding="1" cellspacing="1" id="damage" width="100%" class="tbl table-striped">
                    <thead>
                    <tr style="background-color: #b3d271">
                        <th>#</th>
                        <th>DAMAGE BY</th>
                        <th>MOBILE NUMBER</th>
                        <th>DATE OF REG</th>
                        <th>DAMAGE</th>
                        <th>CHARGES</th>
                        <th>OTHER DETAILS</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr class="">
                        <th>#</th>
                        <th>DAMAGE BY</th>
                        <th>MOBILE NUMBER</th>
                        <th>DATE OF REG</th>
                        <th>DAMAGE</th>
                        <th>CHARGES</th>
                        <th>OTHER DETAILS</th>
                    </tr>
                    </tfoot>
                </table>

<script>
    $(function () {
        $("#damages").DataTable();
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#damage').DataTable({
            "columns": [
                {"data": "damageid"},
                {"data": "damageby"},
                {"data": "mobilenumber"},
                {"data": "date_reg"},
                {"data": "damage"},
                {"data": "charges"},
                {"data": "otherdetails"}

            ],
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: 'datatable/damages.php',
                type: 'POST'
            }
        });
    });
</script>

                <!-- ........................................................................... -->


<?php
include "xf.php";
?>