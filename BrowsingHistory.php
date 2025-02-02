<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browsing_History</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php

    $titlename = "Browsing_History";

    include("./execution/header.php");
    $userid = $_SESSION["userid"];

    ?>
    <div class="browsing_history">
        <table border="1">
            <tr>
                <th>History</th>
                <th>Remove</th>
            </tr>

            <?php
            $recordpage = 10;
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) * $recordpage;
            $sql = "select * from search_history where userid=$userid limit $offset, $recordpage ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['search_name'] ?></td>
                <td><a href="Delete.php?id=<?php echo $row['search_id'] ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </table>

        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://lottie.host/b8d212cb-8fd7-474f-9712-ce28f6681637/c4PVnRH8jd.json" speed="1"
            style="width: 500px;height:auto;padding-left: 100px; " loop autoplay direction="1" mode="normal">
        </lottie-player>

    </div>

    <?php
    $totalRecords = $conn->query("SELECT COUNT(userid) as total FROM search_history where userid=$userid")->fetch_assoc()['total'];

    $totalPages = ceil($totalRecords / $recordpage);
    echo "<div>Page:";
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?page=$i'>$i   </a>";
    }

    ?>

    <br>
    <br>

    <?php
    $footername = "Browsing_History ";
    include("./execution/footer.php");
    ?>
</body>

</html>