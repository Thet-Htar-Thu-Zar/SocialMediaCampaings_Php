<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!--  link -->
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <?php
    $titlename = "Contact ";
    include("./execution/header.php");
    ?>

    <div class="form_contact">

        <div>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://lottie.host/88da84fb-1612-412e-88d1-91a9d7f9c719/iAGCmZA4Pa.json" speed="1"
                style="width: 400px;" loop autoplay direction="1" mode="normal"></lottie-player>
        </div>

        <form action="" method="post">

            <i class='bx bx-user-circle'></i>
            <input type="text" name="name" placeholder="enter name" required><br><br>
            <i class='bx bxs-envelope'></i>
            <input type="email" name="email" placeholder="example@gmail.com" required><br><br>
            <i class='bx bx-phone-call'></i>
            <input type="text" name="phone" placeholder="enter phone number" required><br><br>
            <i class='bx bx-current-location'></i>
            <input type="text" name="address" placeholder="enter address" required><br><br>
            <i class='bx bxs-chat'></i>
            <textarea placeholder="Write your message" name="message"></textarea><br><br>
            <button type="submit" name="send" value="Signup" id="send">Send</button>
            <button type="reset" name="cancel" value="Cancel">Cancel</button>
            <a href="term.php">Privacy&Policy</a><br>
        </form>

    </div>

    <?php
    if (isset($_POST["send"])) {

        if (isset($_SESSION["userid"])) {
            $uid = $_SESSION["userid"];
            $msg = $_POST["message"];
            $sql = "insert into message(userid, description) values ($uid , '$msg')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Message Send Successfully')</script>";
            }
        } else {
            echo "<script>alert('Please login')</script>";
        }
    }
    ?>
    <br>
    <br>
</body>

</html>
<?php
$footername = "Contact Page";
include("./execution/footer.php");
?>