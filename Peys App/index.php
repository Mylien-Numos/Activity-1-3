<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>

<body>

    <h1>Peys App</h1>

    <?php
    // Set default values and assign user-provided values from POST request if available
    $size = $_POST['size'] ?? 60;
    $borderColor = $_POST['borderColor'] ?? '#000000';

    // Convert to integer to ensure the size is numeric
    $canvasSize = (int)$size;
    ?>

    <!-- Form for settings -->
    <form id="settingsForm" method="post">
        <label for="size">Select Photo Size:</label>
        <input type="range" id="sizeSlider" name="size" min="10" max="100" value="<?= $canvasSize ?>" step="10" oninput="this.nextElementSibling.value = this.value">
        <output><?= $canvasSize ?></output>
        
        <br><br>

        <label for="borderColor">Select Border Color:</label>
        <input type="color" id="borderColor" name="borderColor" value="<?= htmlspecialchars($borderColor) ?>">
        
        <br><br>

        <button type="submit" name="submit">Process</button>
        
        <br><br>

        <!-- Image display area with dynamic styling -->
        <div style="border:3px solid <?= htmlspecialchars($borderColor) ?>; width: <?= $canvasSize ?>px; height: <?= $canvasSize ?>px; overflow:hidden;">
            <img src="picture.jpg" alt="Image for Canvas" width="<?= $canvasSize ?>" height="<?= $canvasSize ?>">
        </div>
    </form>

</body>

</html>
