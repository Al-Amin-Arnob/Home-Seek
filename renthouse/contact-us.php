<?php 
session_start();

include("navbar.php");
 ?>
   
   <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us - RentHouse</title>
  <link rel="stylesheet" href="contact-style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

  <div class="container">
    <h1>Contact Us</h1>
    <p>Have a question or need help with renting a home? We’re here for you.</p>

    <div class="contact-box">
      <div class="contact-info">
        <h2>Get in Touch</h2>
        <p><strong>📍 Address:</strong> Mirpur 1, Dhaka, Bangladesh</p>
        <p><strong>📞 Phone:</strong> +880 1631 273213</p>
        <p><strong>📧 Email:</strong> homeseek@gmail.com</p>
      </div>

      <div class="contact-form">
        <form action="#" method="post">
          <input type="text" name="name" placeholder="Your Name" required />
          <input type="email" name="email" placeholder="Your Email" required />
          <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
          <button type="submit">Send Message</button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
