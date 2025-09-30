<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once('config/config.php');
require_once(__DIR__ . '/../vendor/autoload.php');

\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property_id = $_POST['property_id'];
    $_SESSION['last_property_id'] = $property_id; // Store for local booking update
    $amount = $_POST['amount'];
    $currency = 'inr'; // Using INR as the currency
    
    try {
        // Create a PaymentIntent with the order amount and currency
        $payment_intent = \Stripe\PaymentIntent::create([
            'amount' => $amount * 100, // Convert to smallest currency unit (paise)
            'currency' => $currency,
            'metadata' => [
                'property_id' => $property_id,
                'user_email' => $_SESSION['email']
            ]
        ]);

        $output = [
            'clientSecret' => $payment_intent->client_secret,
        ];

        echo json_encode($output);
    } catch (Error $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?> 