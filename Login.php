<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php

    $titlename = "Login";
    $_SESSION["error"] = "";
    include("./execution/header.php");
    if (isset($_SESSION["locktime"])) {
        $difference = time() - $_SESSION["locktime"];
        if ($difference > 10) {
            $_SESSION["locked"] = false;
            $_SESSION["attempt"] = 0;
            unset($_SESSION["locktime"]);
            unset($_SESSION["error"]);
            header("location:Login.php");
            exit();
        }
    }

    ?>

    <div class="form_container">

        <div>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://lottie.host/0a02cbd4-2663-4dee-8fe8-ddf69be66140/J8A1aB2FAZ.json" speed="1"
                style="width: 400px;height:300px;" loop autoplay direction="1" mode="normal"></lottie-player>
        </div>

        <form action="" method="post" class="login">
            <?php
            if (isset($_SESSION["error"]))
                echo $_SESSION["error"] . "<br>";
            ?>

            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="pwd" placeholder="********"><br>
            <?php
            if (isset($_SESSION["locked"]) && $_SESSION["locked"] == true) {
                $_SESSION["locktime"] = time();
                echo "<script>";
                echo " var locked= " . $_SESSION["locked"];
                echo "var  locktime=" . $_SESSION["locktime"];
                echo "</script>";
            ?>
            <p id="locked"></p>
            <?php } else {

            ?>

            <button type="submit" name="login" value="login">Login</button>
            <button type="reset" name="cancel" value="Cancel">Cancel</button><br>
            <p> Don't have account? <a href="./register.php">Register</a></p><br>
            <?php
            }

            ?>
        </form>
        <?php
        $_SESSION["error"] = "";
        if (isset($_POST["login"])) {

            $email = $_POST["email"];
            $pwd = $_POST["pwd"];
            $sql = "select email from user where email='$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $sql1 = "select * from user where email='$email' and password='$pwd'";
                $data = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($data) > 0) {
                    $row = mysqli_fetch_assoc($data);
                    $_SESSION["userid"] = $row["userid"];
                    header("location:Home.php");
                } else {
                    $_SESSION["error"] = "email and password are not match";
                    isset($_SESSION["attempt"]) ? $_SESSION["attempt"]++ : $_SESSION["attempt"] = 1;
                }
            } else {
                $_SESSION["error"] = "user not found";
                isset($_SESSION["attempt"]) ? $_SESSION["attempt"]++ : $_SESSION["attempt"] = 1;
            }
            if ($_SESSION["attempt"] > 2) {
                $_SESSION["locked"] = true;
            }
        }

        ?>

        <script>
        const lockedElement = document.getElementById("locked");
        let count = 10;
        if (locked) {
            const interval = setInterval(() => {
                if (count > 0) {
                    count !== 0 ? lockedElement.innerHTML = "Please wait for " + count +
                        " seconds. Don't refresh the page" : lockedElement.innerHTML = "Please Wait... ";
                    count = count - 1;
                } else {
                    clearInterval(interval);
                    window.location.reload();
                }
            }, 1000);
        }
        </script>
    </div>

    <?php
    $footername = "Login Page";
    include("./execution/footer.php");
    ?>
</body>

</html>