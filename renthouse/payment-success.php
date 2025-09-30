<?php
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', 1);

session_start();
require_once('config/config.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Local solution: update property as booked using session
    if (isset($_SESSION['last_property_id'])) {
        $property_id = $_SESSION['last_property_id'];
        $sql = "UPDATE add_property SET booked = 'Yes' WHERE property_id = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $property_id);
        mysqli_stmt_execute($stmt);
        unset($_SESSION['last_property_id']); // Clean up
    }
    echo "<h2>Payment Successful!</h2><p>Your payment was processed successfully.</p>";
    exit();
}

require_once(__DIR__ . '/../vendor/autoload.php');
\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

$endpoint_secret = STRIPE_WEBHOOK_SECRET;
$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? null;
$event = null;

if ($sig_header) {
    try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
    } catch(\UnexpectedValueException $e) {
        http_response_code(400);
        exit();
    } catch(\Stripe\Exception\SignatureVerificationException $e) {
        http_response_code(400);
        exit();
    }

    if ($event->type === 'payment_intent.succeeded') {
        $payment_intent = $event->data->object;
        $property_id = $payment_intent->metadata->property_id;
        $user_email = $payment_intent->metadata->user_email;
        
        // Update property status in database
        $sql = "UPDATE add_property SET booked = 'Yes' WHERE property_id = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $property_id);
        mysqli_stmt_execute($stmt);
        
        // Record the payment in a new payments table
        $sql = "INSERT INTO payments (property_id, user_email, amount, payment_intent_id, status) 
                VALUES (?, ?, ?, ?, 'completed')";
        $stmt = mysqli_prepare($db, $sql);
        $amount = $payment_intent->amount / 100; // Convert back from paise to rupees
        mysqli_stmt_bind_param($stmt, "ssds", $property_id, $user_email, $amount, $payment_intent->id);
        mysqli_stmt_execute($stmt);
    }
}

http_response_code(200);
?> 