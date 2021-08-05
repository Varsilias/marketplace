<?php
    require '../vendor/autoload.php';

    use App\client\Input;
    use App\core\Requests\UserRequest;
    use App\client\Redirect;

    session_start();

$errors = [];
$data = [];
$message = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST)) {


        $email = Input::getEmail($_POST['email']);
        if (empty($email)) {
            $errors['email'] = 'This field is required';
        }

        $data['email'] = $email;



        $password = Input::getPassword($_POST['password']);
        if (empty($password)) {
            $errors['password'] = 'This field is required';
        }
        
        $data['password'] = $password;

    }

    if (count($data) > 0) {
        $request = new UserRequest();
        $result = $request->sendLoginRequest($data);

        
        if ($result == 'Wrong user credentials') {

            $message['error'] =  'Wrong user credentials';

        } else if($result == 'Wrong password provided') {

            $message['error'] =  'Wrong password provided';

        } else {

            $_SESSION['id'] = $result['id'];
            $_SESSION['firstname'] = $result['firstname'];
            $_SESSION['lastname'] = $result['lastname'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['isLoggedIn'] = true;

            // echo '<pre>';
            // print_r($result);
            // echo '</pre>';
        }
        
        Redirect::to('dashboard/dashboard.php');
    }
    

    
    


}

?>

<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap Styles -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link type="application/javascript" href="bootstrap/js/bootstrap.min.js">

        <!-- FontAwesome Icons -->
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link type="application/javascript" href="fontawesome/js/all.min.js">

        <title>Login | Marketplace</title>
    </head>
<body>
    <div class="container">

            <?php if(count($message) > 0): ?>
                <div class="row justify-content-center px-4">
                    <?php if (isset($message['error'])) :?>
                        <div class="col-md-12 col-sm-12 justify-content-center px-4 py-2 my-2 bg-white">
                            <h6 class="mb-4 alert alert-danger">
                                <?php echo $message['error']?>
                            </h6>
                        </div>
                    <?php endif?>
                </div>
            <?php endif?>
            
        <div class="row justify-content-center px-0">
            <div class="col-md-4 col-sm-12 justify-content-center px-4 py-5 my-4 bg-white shadow-lg">

                <h5 class="mb-4">Log In</h5>
                <!-- <small class="form-text text-muted pb-2">Sign up with</small> -->
                <div class="col-md-12 col-sm-12 justify-content-center my-4 px-0">
                    
                    <div class="py-2 mt-2 btn col-md-12 shadow-sm bg-white rounded">
                        <span class="px-2"><i class="fab fa-google fa-1.5x"></i></span>
                        <span>Continue with Google</span>
                    </div>

                    <div class="py-2 mt-2 btn col-md-12 shadow-sm bg-white rounded">
                        <span class="px-2"><i class="fab fa-slack fa-1.5x"></i></span>
                        <span>Continue with Slack</span>
                    </div>

                    <div class="py-2 mt-2 btn col-md-12 shadow-sm bg-white rounded">
                        <span class="px-2"><i class="fab fa-github fa-1.5x"></i></span>
                        <span>Continue with GitHub</span>
                    </div>
                </div>
                
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

                    <div class="py-2 mt-2 btn col-md-12 bg-white">
                        <span>OR</span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" autofocus placeholder="nacheetah@example.com">

                        <?php if(count($errors)):?>
                            <span role="alert">
                                <?php if(isset($errors['email'])):?>
                                    <strong style="color: #d03443;"><?= $errors['email']?></strong>
                                <?php endif?>
                            </span>
                        <?php endif?>

                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password"  placeholder="••••••••">

                        <?php if(count($errors)):?>
                            <span role="alert">
                                <?php if(isset($errors['password'])):?>
                                    <strong style="color: #d03443;"><?= $errors['password']?></strong>
                                <?php endif?>
                            </span>
                        <?php endif?>

                    </div>

                    <div class="form-check my-2 d-flex align-item-center">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">        

                        <label class="form-check-label" for="completed">Remember Me</label>
                    </div>

                   <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">Login</button>
                   </div>
                </form>

                 <div class="py-2 mt-2 btn col-md-12 bg-white">
                    <span class="text-dark text-center"><small>Not registered yet? <a href="register.php" class="text-info">Sign up</a></small></span>
                </div>

                <div class="py-2 btn col-md-12 bg-white">

                    <a class="btn btn-link" href="password-reset.php">
                        <small class="text-info">Forgot Password?</small>
                    </a>
                    
                </div>

            </div>
        </div>    
    </div>
</body>
</html>
