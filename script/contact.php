<?php

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
 

    function sanitize_my_email($email) {
        $field = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    $to_email = 'w0777761@myscc.ca';
    $body = "";

    $body .= 'From: ' . $name. "\r\n";
    $body .= 'Email: ' . $email. "\r\n";
    $body .= 'Subject: ' . $subject. "\r\n";
    $body .= 'Message: ' . $message."\r\n";

    //check if the email address is invalid $secure_check
    $secure_check = sanitize_my_email($email);
     if ($secure_check == false) {
        echo "Invalid input";
    } else { //send email 
        mail($to_email, $email, $body);
        echo "Email Sent";
         header('location: ../contact.html');

        
    } 

   

}