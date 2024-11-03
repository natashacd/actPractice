<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
    <style>
        .image-preview {

            width: 100px;
            height: 100px;
            border: 5px solid #000000; 
            margin: 50px;
        }
    </style>
</head>
<body>
    <h1>Peys App</h1>

    <?php

    $size = 100;
    $borderColor = "#000000";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $size = isset($_POST['photoSize']) ? intval($_POST['photoSize']) : 100;
        $borderColor = isset($_POST['borderColor']) ? htmlspecialchars($_POST['borderColor']) : "#000000";
    }
    ?>

    <form method="post">
        <label for="photoSize">Select Photo Size: </label>
        <input type="range" id="photoSize" name="photoSize" min="50" max="300" value="<?php echo $size; ?>"><br>

        <label for="borderColor">Select Border Color:</label>
        <input type="color" id="borderColor" name="borderColor" value="<?php echo $borderColor; ?>"><br>

        <input type="submit" name="btnprocess" value="Process"><br>
    </form>

    <img src="images/peys-app.jpg" 
         class="image-preview" 
         alt="Image Preview"
         style="width: <?php echo $size; ?>px; 
                height: <?php echo $size; ?>px; 
                border: 5px solid <?php echo $borderColor; ?>;">
</body>
</html>
