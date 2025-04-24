<?php include 'db.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Upload Image</h2>
    <div class="form-container">
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Enter Image Title" required><br><br>
        <input type="file" name="image" accept="image/*" required><br><br>
        <button type="submit">Upload</button><br><br>
    </form>
</div>
</div>

    <hr>

    <h2>Gallery</h2>
    <div class="gallery">
        <?php
        $result = $conn->query("SELECT * FROM images ORDER BY uploaded_at DESC");
        while ($row = $result->fetch_assoc()):
        ?>
        <div class="image-card">
            <img src="uploads/<?= htmlspecialchars($row["filename"]) ?>" alt="<?= htmlspecialchars($row["title"]) ?>">
            <p><?= htmlspecialchars($row["title"]) ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>