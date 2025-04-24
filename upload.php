<?php

include "db.php";
if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST["title"];
    $image = $_FILES["image"];


    if($image["error"] === 0){
        $filename = time() . "_" .basename($image["name"]);
        $target = "uploads/" . $filename;

        if (move_uploaded_file($image["tmp_name"], $target)) {
            $stmt = $conn->prepare("INSERT into images ( title, filename) VALUES (?,?)");
            $stmt->bind_param("ss", $title, $filename);
            $stmt->execute();

            header("Location: index.php");
            exit();
        } else {
            echo "Failed to upload image";
        }
    } else{
        echo "Image upload error";
    }
}

?>