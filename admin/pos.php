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

<!-- Main content -->

<img src="../images/cs.png" style="alignment:left:auto;">


<!-- ........................................................................... -->

<?php include 'xf.php'?>

<!-- page script -->
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
</head>


</body>
</html>
