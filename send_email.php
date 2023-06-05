<?php


  if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $replyto = $_POST['replyTo'];
    $message = $_POST['message'];
    $to = 'root@localhost';
    $subject = 'My Subject';
    

    // Input validation using a whitelist of allowed characters
    if (preg_match('/^[a-zA-Z0-9 .-_]+$/i', $name) && filter_var($replyto, FILTER_VALIDATE_EMAIL)) {
      // Set SMTP headers
      $headers = "From: $name \n" .
      "Reply-To: $replyto";

      mail($to, $subject, $message, $headers);
    } else {
      echo "Invalid input detected. Please ensure your input only contains allowed characters.";
    }
  }


?>