<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // User not logged in, redirect to login
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Us</title>
    <style>
      body {
        font-family: "Poppins", sans-serif;
        background: #f4f7f8;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
        padding: 40px 20px;
        box-sizing: border-box;
      }
      .container {
        background: #fff;
        max-width: 600px;
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 30px 40px;
      }
      h1 {
        margin-bottom: 20px;
        color: #4ca771;
        font-weight: 700;
      }
      .info {
        margin-bottom: 30px;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
      }
      form {
        display: flex;
        flex-direction: column;
      }
      label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #555;
      }
      input[type="text"],
      input[type="email"],
      textarea {
        padding: 12px 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        margin-bottom: 20px;
        resize: vertical;
        font-family: inherit;
      }
      textarea {
        min-height: 100px;
      }
      button {
        background: #4ca771;
        color: white;
        font-weight: 600;
        border: none;
        padding: 15px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s ease;
      }
      button:hover {
        background: #3b865a;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Contact Us</h1>
      <div class="info">
        <p><strong>Phone:</strong> +977 9842664875</p>
        <p><strong>Email:</strong> team@lekhapal@gmail.com</p>
      </div>
      <form id="contactForm" action="#" method="POST">
        <label for="name">Full Name</label>
        <input
          type="text"
          id="name"
          name="name"
          placeholder="Your full name"
          required />

        <label for="email">Email Address</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="you@example.com"
          required />

        <label for="message">Message</label>
        <textarea
          id="message"
          name="message"
          placeholder="Write your message here..."
          required></textarea>

        <button type="submit">Send Message</button>
      </form>
    </div>
  </body>
</html>