<?php session_start()?>
<?php include "../include/db.php"; ?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Expenses</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">



    <!-- TODO LIST -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

<?php
if(isset($_POST['lookupYear']))
    global $yearToDisplay;
$yearToDisplay = $_POST['lookupYear'];
?>


<?

$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])){

    $trans_descript = $_POST['description'];
    $trans_date =  $_POST['date_value'];
    $trans_value =  $_POST['trans_value'];

    $query_trans = "INSERT INTO `klickbar`.`transactions_$user_id` (`user_id`, `month`, `date`, `typ`, `amout`,`text`) VALUES ($user_id, 'month', '$trans_date', 'exp', $trans_value,'$trans_descript')";

    echo $query_trans;
    $query_insert_exp = mysqli_query($connection,$query_trans);


}




?>

<!-- Page Wrapper -->

<div id="wrapper">

    <!-- Sidebar -->
    <? include "include/sidebar.php"?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>



                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user_firstname']; ?></span>
                            <img class="img-profile rounded-circle" src="img/icons8-pinguin-96.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- End of Topbar -->
            <div class="container-fluid">

                <!-- Page Heading
                <h1 class="h3 mb-2 text-gray-800">Einnahmen</h1>
                <p class="mb-4">Eine Auflistung aller bisherigen Einnahmen</p>
                -->
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Expense</h6>
                    </div>

                    <div class="card-body">


                        <div class="add">
                            <!--  <form action="index.php" method="post"> -->
                            <form action="table_expenses.php" method="post">
                                <div class="add__container">

                                    <input type="text" class="add__description" name="description" placeholder="Add Description">
                                    <input type="text" class="add__description" name="date_value" placeholder="Date (MM-DD-YY HH:MM:SS)">
                                    <input type="number" class="add__value" name="trans_value" placeholder="Amount">

                                    <button class="add__btn btn btn-primary" style="padding: 12px 15px" name="submit" type="submit"><i class="ion-ios-checkmark-outline"></i> Add Expense</button>
                                </div>
                            </form>

                            <!--  </form> -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading
                <h1 class="h3 mb-2 text-gray-800">Einnahmen</h1>
                <p class="mb-4">Eine Auflistung aller bisherigen Einnahmen</p>
                -->
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Expenses</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="transaction_table-head">
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>

                                </tr>
                                </thead>

                                <tbody>

                                <?
                                $table = "klickbar.transactions_" . $_SESSION['user_id'];
                                $query_exp = "SELECT * FROM $table WHERE typ ='exp' ";
                                $selected_exp = mysqli_query($connection,$query_exp);


                                $firstname = ucfirst($_SESSION['user_firstname']);
                                $lastname = ucfirst($_SESSION['user_lastname']) ;
                                $user_name = $firstname." ".$lastname;



                                if($selected_exp){
                                    while ($row = mysqli_fetch_assoc($selected_exp)){

                                        $date = $row['date'];
                                        $text = $row['text'];
                                        $amount = $row['amout'];

                                        echo "
                                        <tr>
                                             <td>$user_name</td>
                                            <td> Expenses</td>
                                            <td>$date</td>
                                            <td>$text</td>
                                            <td>$amount €</td>
                                            
                                        </tr>

                                            ";

                                    }
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Dominik Pichler</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sicher schon genug gesehen?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Dann klicke auf "LOGOUT" um dich sicher abzumelden .</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbruch</button>
                <a class="btn btn-primary" href="../index.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>




<!-- TODO List -->

<script type ="text/javascript" src="js/ToDo-Animation.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>


</body>

</html>
