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

        $firstname = Input::getName($_POST['firstname']);
        if (empty($firstname)) {
            $errors['firstname'] = 'This field is required';
        }
        $data['firstname'] = $firstname;



        $lastname = Input::getName($_POST['lastname']);
        if (empty($lastname)) {
            $errors['lastname'] = 'This field is required';
        }
        $data['lastname'] = $lastname;



        $email = Input::getEmail($_POST['email']);
        if (empty($email)) {
            $errors['email'] = 'This field is required';
        }
        $data['email'] = $email;



        $password = Input::checkPassword($_POST['password'], $_POST['password_confirmation']);
        if (empty($password)) {
            $errors['password'] = 'This field is required';
        }
        if ($password == 'Passwords do not match') {
            $errors['passwordMismatch'] = 'Passwords do not match';
        }
        $data['password'] = $password;

    }

    if (count($data) > 0) {
        $request = new UserRequest();
        $status = $request->sendRegisterRequest($data);

        if ($status == 'One record affected') {
            $message['success'] = "Registration successful proceed to <strong><a href='login.php' class'text-success'>Login</a></strong>";
        }
        
        // Redirect::to('login.php');
    }
    

    
    


}

// DB::getInstance();
    
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

        <title>Register | Market Place</title>
    </head>
<body>
    <div class="container">
        <?php if(count($message) > 0): ?>
            <div class="row justify-content-center px-4">
                <?php if (isset($message['success'])) :?>
                    <div class="col-md-12 col-sm-12 justify-content-center px-4 py-2 my-2 bg-white">
                        <h6 class="mb-4 alert alert-success">
                            <?php echo $message['success']?>
                        </h6>
                    </div>
                <?php endif?>
            </div>
        <?php endif?>

        <div class="row justify-content-center px-0">
            <div class="col-md-4 col-sm-12 justify-content-center px-4 my-4 py-5 bg-white shadow-lg">

                <h4>Sign Up</h4>
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

                <div class="py-2 mt-2 btn col-md-12 bg-white">
                    <span>OR</span>
                </div>
                
                <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" id="InputFirstname" name="firstname" placeholder="Firstname" autofocus>

                        <?php if(count($errors)):?>
                            <span role="alert">
                                <?php if(isset($errors['firstname'])):?>
                                    <strong style="color: #d03443;"><?= $errors['firstname']?></strong>
                                <?php endif?>
                            </span>
                        <?php endif?>
                        
                    </div>

                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" id="InputLastname" name="lastname" placeholder="Lastname">

                        <?php if(count($errors)):?>
                            <span role="alert">
                                <?php if(isset($errors['lastname'])):?>
                                    <strong style="color: #d03443;"><?= $errors['lastname']?></strong>
                                <?php endif?>
                            </span>
                        <?php endif?>

                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="email" placeholder="nacheetah@example.com">
                            
                        <?php if(count($errors) > 0):?>
                            <span role="alert">
                                <?php if(isset($errors['email'])):?>
                                    <strong style="color: #d03443;"><?= $errors['email']?></strong>
                                <?php endif?>
                            </span>
                        <?php endif?>

                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" type="password" class="form-control" name="password" autocomplete="new-password" placeholder="••••••••">

                        <?php if(count($errors) > 0):?>
                            <span role="alert">
                                <?php if(isset($errors['password'])):?>
                                    <strong style="color: #d03443;"><?= $errors['password']?></strong>
                                <?php endif?>
                            </span>
                        <?php endif?>

                    </div>

                    
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="••••••••">

                        <?php if(count($errors) > 0):?>
                        <span role="alert">
                            <?php if(isset($errors['passwordMismatch'])):?>
                                <strong style="color: #d03443;"><?= $errors['passwordMismatch']?></strong>
                            <?php endif?>
                        </span>
                        <?php endif?>
                    </div>

                   <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">SignUp</button>
                   </div>
                </form>
                <div class="m-auto">
                    <small class="text-dark text-center">Already registered? <a href="login.php" class="text-info">Login</a></small>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
