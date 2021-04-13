<?php
    //input user dimasukkan ke dalam variabel
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //menghubungkan ke gmail saya
    $email_from = $email;
    $email_subject = "Pesan baru dari visitor duniaheadset.com";
    $email_body = "Nama visitor: $name.\n".
                  "Email visitor: $email.\n".
                  "Pesan visitor: $message.\n";    
    $email_to = "andhika19002@mail.unpad.ac.id";
    $headsers = "From: $email_from \r\n";
    $headers .= "Reply-to: $email \r\n";
    
    mail($email_to, $email_subject, $email_body, $headers);
    header("Location: contact.html");
?>