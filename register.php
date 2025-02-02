<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- capture link -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <?php
    $titlename = "Registeration";
    include("./execution/header.php");
    ?>

    <div class="register_container">

        <div>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://lottie.host/564c0678-1d9c-4fb1-9f48-3c6c439099a4/YIfwewovbP.json" speed="1"
                style="width: 400px;height:300px;" loop autoplay direction="1" mode="normal"></lottie-player>
        </div>

        <form action="" method="post" class="form_register">

            <input type="text" name="ftname" placeholder="First Name" required><br>
            <input type="text" name="ltname" placeholder="Last Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirmpassword" placeholder="Confirm Password" required><br>
            <div class="g-recaptcha" id="captcha" data-sitekey="6Lcc5fsoAAAAAB-A4Sj34C9ya_lVz0Weyrw9Nyvc"></div>
            <button type="submit" name="signup" value="Signup" id="signup">Sign Up</button>
            <button type="reset" name="cancel" value="Cancel">Cancel</button><br>
            <p> Already have account? <a href="Login.php">Log in</a></p><br>
        </form>

        <script>
        $(document).ready(function() {
            $('#signup').click(function() {
                var response = grecaptcha.getResponse();
                if (response.length == 0)
                    alert("Please verify I'm not robot");
            })
        })
        </script>
    </div>

    <?php
    if (isset($_POST["signup"])) {
        $fname = $_POST["ftname"];
        $lname = $_POST["ltname"];
        $email = $_POST["email"];
        $pwd = $_POST["password"];
        $cpwd = $_POST["confirmpassword"];
        if (!($pwd == $cpwd)) {
            echo "<script> alert('password and confirmpassword are not match')
                </script>";
        }

        $sql1 = "select * from user  where email='$email'";
        $result = mysqli_query($conn, $sql1);
        if (mysqli_fetch_row($result) > 0) {
            echo "<script> alert('email already exit.')
                </script>";
        } else {
            $sql = "insert into user(fname,lname,email,password) values('$fname','$lname','$email','$pwd')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script> alert('register successful')
                </script>";
            }
        }
    }
    ?>

</body>


</html>
<?php
$footername = "Register Page";
include("./execution/footer.php");
?>