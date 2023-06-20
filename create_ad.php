<?php
require_once 'includes/utils.php';

header("Content-Type: application/json");
if (!isset($_SESSION['user_id']) || $_SERVER["REQUEST_METHOD"] != "POST") {
    echo json_encode(["success" => false, "error" => "Invalid request."]);
    exit();
}
$title = trim($_POST['title']);
$description = trim($_POST['description']);
$user_id = $_SESSION['user_id'];

// Create the ad in the database
$ad_id = create_ad($title, $description, $user_id);

$result = $mysqli->query("SELECT advertisments.*, users.username FROM advertisments JOIN users ON advertisments.user_id = users.id WHERE advertisments.id = $ad_id ORDER BY created_at DESC");

$row = $result->fetch_assoc();


if ($ad_id) {
    echo json_encode([
        "success" => true,
        "ad" => [
            "title" => $title,
            "description" => $description,
            "username" => $row['username']
        ]
    ]);
} else {
    echo json_encode(["success" => false, "error" => "Error creating ad. Please try again later."
]);
}

