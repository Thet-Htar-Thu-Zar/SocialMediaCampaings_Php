<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guidance</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <?php
    $titlename = "Contact ";
    include("./execution/header.php");
    ?>

    <div class="card_body">
        <div class="card">
            <img src="./picture/guidance1.png" alt="" class="card_photo">
            <h2>For Children</h2>

            <p>Children’s Online Privacy Protection Act (COPPA): Focuses on protecting children’s privacy online. Social
                media platforms must obtain parental consent for users under 13 years old.</p>
            <button>Show More</button>
        </div>

    </div>

    <div class="ani_content">

        <div class="ani_image">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://lottie.host/a7aff08b-7ce0-49c0-95f8-6ddb4a0fe179/p1WInRSaGU.json" speed="1"
                style="width: 500px;height:auto;" loop autoplay direction="1" mode="normal"></lottie-player>
        </div>

        <div class="ani_text">
            <h2>Connect on Our Social Media Campaings</h2>
            <p>Various organizations and industry bodies provide best practice guidance for online social media use,<br>
                including guidelines on content moderation, data privacy, cybersecurity, and user safety.Social
                media<br>
                platforms typically have their own terms of service and community guidelines that users must adhere
                to.<br>
                These policies outline acceptable behavior, content standards, and consequences for violations.</p>
        </div>
    </div>

    <br>

    <div class="card_body">
        <div class="card">
            <img src="./picture/guidance3.png" alt="" class="card_photo">
            <h2>For Online Billing</h2>
            <p>
                The Online Safety Bill is a set of new laws designed to protect both children and adults online.
                The bill aims to create a safer online environment by addressing harmful content and promoting
                responsible platform management</p>
            <button>Show More</button>
        </div>
    </div>

    <br>
    <br>
</body>

</html>

<?php
$footername = "Guidance Page";
include("./execution/footer.php");
?>