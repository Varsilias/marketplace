<?php
    require '../../vendor/autoload.php';
    require 'helpers/fileupload.php';

    use App\client\Input;
    use App\core\Requests\ProductRequest;
    use App\client\Redirect;

    session_start();

    if (!isset($_SESSION['isLoggedIn'])) {
        Redirect::to('../login.php');
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['logout'])) {
            $true = session_destroy();

            if ($true) {
                Redirect::to('../index.php');
            }
        }
    }

$errors = [];
$data = [];
$message = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST)) {

        $productName = Input::getName($_POST['name']);
        if (empty($productName)) {
            $errors['name'] = 'Product Name field is required';
        }
        $data['name'] = $productName;



        $description = Input::getName($_POST['description']);
        if (empty($description)) {
            $errors['description'] = 'Product description field is required';
        }
        $data['description'] = $description;



        $stock = Input::getName($_POST['stock']);
        if (empty($stock)) {
            $errors['stock'] = 'Amount in stock field is required';
        }
        $data['stock'] = $stock;


        $price = Input::getName($_POST['price']);
        if (empty($price)) {
            $errors['price'] = 'Product Price field is required';
        }
        $data['price'] = $price;

        $discount = Input::getName($_POST['discount']);
        if (empty($discount)) {
            $errors['discount'] = 'Product discount field is required';
        }
        $data['discount'] = $discount;


        $userId = Input::getName($_POST['user_id']);
        $data['user_id'] = $userId;

        $productId = Input::getName($_POST['id']);
        $data['id'] = $productId;
        
        

    }
    
    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';


    if (count($data) > 0) {
        $request = new ProductRequest();
        $status = $request->updateProduct($data);

        if ($status == 'One record affected') {
            $message['success'] = "Product Updated successfully";
        } else {
            $message['error'] = "An error occured please try once more";
        } 
    }
    

}

    

?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Successful | Market Place</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MARKETPLACE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

        
            <!-- Nav Item - Product -->
            <li class="nav-item active">
                <a class="nav-link" href="products.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Products</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    
                    <!-- <form class="form-inline"> -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    <!-- </form> -->

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <?php if (isset($_SESSION['isLoggedIn'])) :?>

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['firstname'] ?> <?=$_SESSION['lastname'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">

                                <?php endif?>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <?php if(count($message) > 0): ?>
                        <div class="row justify-content-center px-4">
                            <?php if (isset($message['success'])) :?>
                                <div class="col-md-12 col-sm-12 justify-content-center px-4 py-2 my-2 bg-white">
                                    <h6 class="mb-4 alert alert-success">
                                        <?php echo $message['success']?>
                                    </h6>
                                </div>
                            <?php endif?>

                            <?php if (isset($message['error'])) :?>
                                <div class="col-md-12 col-sm-12 justify-content-center px-4 py-2 my-2 bg-white">
                                    <h6 class="mb-4 alert alert-danger">
                                        <?php echo $message['error']?>
                                    </h6>
                                </div>
                            <?php endif?>
                        
                        </div>
                    <?php endif?>

                       <?php if (count($errors) > 0) :?>
                            <div class="col-md-12 col-sm-12 justify-content-center px-4 py-2 my-2 bg-white">
                            <?php foreach ($errors as $error):?>
                                <h6 class="mb-4 alert alert-danger">
                                    <?= $error ?> </br>
                                </h6>
                            </div>
                            <?php endforeach ?>
                        <?php endif?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Market Place <?= date('Y')?> Made with &#10084; by <a href="https://twitter.com/@varsilias">Daniel Okoronkwo</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to <strong>Logout</strong>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                        <button class="btn btn-danger" name="logout">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Product Modal -->
    <div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    

                    <!-- End of form container -->
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="./vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./js/demo/datatables-demo.js"></script>

</body>

</html>