<?php
    require '../vendor/autoload.php';

    use App\client\Input;
    use App\core\Requests\UserRequest;
    // use App\client\Redirect;

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
        $result = $request->sendPasswordResetRequest($data);

        
        if ($result == 'Wrong user credentials') {

            $message['error'] =  'Wrong user credentials';

        } else if ($result == 'Error: Record not updated') {

            $message['error'] =  'An error occured while resetting password';

        } else {
            $message['success'] =  "Password reset successful proceed to <strong><a href='login.php' class'text-success'>Login</a></strong>";
        }
        
        // Redirect::to('login.php');
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
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="fontawesome/js/all.min.js">

    <title>Reset Password</title>
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

                <?php elseif(isset($message['success'])):?>

                    <div class="col-md-12 col-sm-12 justify-content-center px-4 py-2 my-2 bg-white">
                        <h6 class="mb-4 alert alert-success">
                            <?php echo $message['success']?>
                        </h6>
                    </div>
                <?php endif?>
            </div>
        <?php endif?>

        <div class="row justify-content-center px-4">
            <div class="col-md-4 col-sm-12 justify-content-center px-4 py-5 my-4 bg-white shadow-lg">

                <h5 class="mb-4">Reset Password</h5> 
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

                    <div class="mb-4">
                        <small class='text-mute'>Best practices recommends that we send a mail to the email you specified but for testing and learning purposes, we will allow you reset your password by providing a valid email that is available in the Database</small>
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

                   <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">Reset Password</button>
                   </div>
                </form>

            </div>
        </div>    
    </div>
</body>
</html>