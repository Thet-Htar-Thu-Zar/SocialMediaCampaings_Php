<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Search Information</title>
</head>
<?php
include("./execution/header.php");
?>

<body>

    <div class="box-container">

        <?php

        if (isset($_GET["search"])) {
            $sname = $_GET["search"];
            if (isset($_SESSION["userid"])) {
                $userid = $_SESSION["userid"];
                $sql = "insert into search_history(userid,search_name)values($userid,'$sname')";
                mysqli_query($conn, $sql);
            }
            $sql1 = "select * from technology_search where category like'$sname%'";
            $result = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>

        <div class="box">
            <div class="box-img"><img src="./picture/<?php echo $row['image'] ?>"></div>
            <div class="box-text">
                <p><?php echo $row['description'] ?></p>
            </div>
        </div>
        <?php }
            } else {
                echo "<script>alert('no result')</script>";
            }
        }
        ?>
    </div>

    <?php
    $footername = "Application Page";
    include("./execution/footer.php");
    ?>

</body>

</html>