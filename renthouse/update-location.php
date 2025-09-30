<?php
session_start();
include('config/config.php');

// Check if user is logged in
if (!isset($_SESSION["email"]) || empty($_SESSION['email'])) {
    header("Location: tenant-login.php");
    exit();
}

// Check if user is the property owner
$user_email = $_SESSION['email'];
$property_id = $_POST['property_id'];
$check_owner = "SELECT * FROM add_property WHERE owner_id = (SELECT owner_id FROM owner WHERE email = '$user_email') AND property_id = '$property_id'";
$owner_result = mysqli_query($db, $check_owner);

if (mysqli_num_rows($owner_result) > 0) {
    // User is the owner, proceed with update
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    
    // Update the location in database
    $update_query = "UPDATE add_property SET latitude = '$latitude', longitude = '$longitude' WHERE property_id = '$property_id'";
    
    if (mysqli_query($db, $update_query)) {
        // Success
        header("Location: view-property.php?property_id=" . $property_id . "&update=success");
    } else {
        // Error
        header("Location: view-property.php?property_id=" . $property_id . "&update=error");
    }
} else {
    // User is not the owner
    header("Location: view-property.php?property_id=" . $property_id . "&update=unauthorized");
}
exit();
?> 