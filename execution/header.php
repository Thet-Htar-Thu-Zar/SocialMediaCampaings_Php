<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titlename ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

    <?php
    include("./database/databaseconnection.php");
    session_start();
    ?>


    <nav class="nav-bar">
        <a href="#"><img src="./picture/logo1.png" alt="" class="logo"></a>
        <a href="Home.php">Home</a>
        <a href="Guidance.php">Guidance</a>
        <a href="Contact.php">Contact</a>

        <?php if (isset($_SESSION["userid"])) {
            $uid = $_SESSION['userid'];
            $sql = "select  * from user where userid = $uid";
            $fetch = mysqli_query($conn, $sql);
            $result = mysqli_fetch_array($fetch);
            $urname = $result['fname'] . $result['lname'];
        ?>

        <div class="dropdown">
            <button class="dropbtn"><?php echo $urname ?>
                <i class="bx bx-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="BrowsingHistory.php">Browsing History</a>
                <a href="Logout.php">Logout</a>
            </div>
        </div>


        <?php } else { ?> <a href="Login.php">Login</a>

        <?php } ?>
        <div class="dropdown">
            <button class="dropbtn" style="background-color: rgb(232, 197, 90);">Information
                <i class='bx bx-caret-down'></i>
            </button>
            <div class="dropdown-content">
                <a href="Social_Media_App.php">Apps</a>
                <a href="Support.php">Support</a>
                <a href="Livestreaming.php">Live</a>
            </div>
        </div>


        <form class="searchform" action="StaySafe.php" method="get" style="width: 100%; padding: 0;">
            <input id="mysearch" type="text" name="search" placeholder="Search.....">
            <i class='bx bxs-file-find' style="margin-top: 18px;font-size: 30px;"></i>
        </form>


    </nav>

</body>

</html>