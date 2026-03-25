<?php
header("Content-Type: application/json");

// Get username from AJAX
$username = $_POST['username'] ?? '';

// Example existing usernames
$taken_usernames = ['admin', 'root', 'user123'];

if (in_array(strtolower($username), $taken_usernames)) {
    $response = [
        "available" => false,
        "message" => "Sorry, that username is already taken!"
    ];
} else {
    $response = [
        "available" => true,
        "message" => "Username is available!"
    ];
}

echo json_encode($response);
?>