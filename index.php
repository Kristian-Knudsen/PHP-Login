<?php
require('functions.php');
if (isset($_POST['loginbtn'])) {
    $loggedin = login($_POST['lusername'], $_POST['lpassword']);
    if ($loggedin === True) {
        session_start();
        $_SESSION["userauth"] = True;
        header('Location: feed.php');
        die();
    } else {
        $loginerror = "Username or password is incorrect. Try again";
    }
}
if (isset($_POST['registerbtn'])) {
    $registered = register($_POST['rusername'], $_POST['remail'], $_POST['rpassword'], $_POST['rconfpassword']);
    if ($registered === True) {
        echo "registered";
    } else {
        $
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="master.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>


            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <!-- Login content-->
                    <div class="container" id="logincontent">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <?php if (isset($loginerror)) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?php echo ($loginerror); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } ?>
                                <h3 class="display-4">Login</h3>
                                <p class="text-muted mb-4">Welcome back</p>
                                <form method="POST">
                                    <div class="form-group mb-3">
                                        <input name="lusername" type="text" placeholder="Username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input name="lpassword" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <button name="loginbtn" type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                    <button type="button" id="shifttr" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Want to register? Press here</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Register content-->
                    <div class="container" id="registercontent">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="display-4">Register</h3>
                                <p class="text-muted mb-4">We will never share your information with anyone</p>
                                <form method="POST">
                                    <div class="form-group mb-3">
                                        <input name="rusername" type="text" placeholder="Username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input name="remail" type="email" placeholder="Email" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input name="rpassword" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input name="rconfpassword" type="password" placeholder="Confirm password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <button name="registerbtn" type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign up</button>
                                    <button type="button" id="shifttl" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Already have a user? Press here</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(() => {
            $("#registercontent").hide();
        });
        $("#shifttr").click(function() {
            $(document).attr("title", "Register");
            $("#logincontent").slideUp(function() {
                $("#registercontent").slideDown("slow");
            });
        });
        $("#shifttl").click(function() {
            $(document).attr("title", "Login");
            $("#registercontent").slideUp(function() {
                $("#logincontent").slideDown("slow");
            });
        });
    </script>
</body>

</html>