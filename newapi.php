<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php

    $titlename = "News API";

    include("./execution/header.php");
    ?>

    <?php

    $apiurl = "https://newsapi.org/v2/everything?q=how+to+stay+safe+social+media+for+teenagers&sortBy=publishedAt&apiKey=b1ab93a2d8c24bcf8a38f03c76d83229";

    $curl = curl_init($apiurl);

    // Set URL options
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Batch3'); // Set your application name as the User-Agent

    // Execute cURL session and get the response
    $response = curl_exec($curl);

    // Check for cURL errors
    if (curl_errno($curl)) {
        echo "cURL Error: " . curl_error($curl) . "\n";
    } else {
        $data = json_decode($response, true);

        if (isset($data['status']) && $data['status'] === 'error') {
            echo "API Error: {$data['message']}\n";
        } else {
            echo "<div class='box-container'>";
            $articles = $data['articles'];
            $row = 1;
            foreach ($articles as $article) { ?>

                <div class="box" style="position: relative">
                    <div class="box-text">
                        <p class="title"><?php echo $article['title'] ?></p>
                    </div>
                    <div class="box-img">
                        <img class="image" src=" <?php echo $article['urlToImage'] ?>">
                    </div>
                    <div class="box-text">
                        <p class="description"><?php echo $article['description'] ?></p>
                    </div>
                    <div class="box-text" class="readmore">
                        <button class="btnread"><a href="<?php echo $article['url'] ?>">Read More</button>
                    </div>
                </div>
    <?php $row++;
                if ($row > 12)
                    break;
            }
            echo "</div>";
        }
    }
    curl_close($curl);
    ?>

    <?php
    $footername = "News Page ";
    include("./execution/footer.php");
    ?>
</body>

</html>