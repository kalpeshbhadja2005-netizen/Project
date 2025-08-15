



<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('includes/db.php');
include_once('includes/header.php');
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  
        $mail->SMTPAuth   = true;
        $mail->Username   = 'umangvadhiya007@gmail.com'; // <-- apna gmail id yaha
        $mail->Password   = 'Umang@1234';  // <-- Gmail App Password yaha
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('umangvadhiya007@gmail.com'); // <-- jaha message receive karna hai

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Message from LearnPro';
        $mail->Body    = "
            <h3>New Contact Message</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();
        $msg = "<p style='color:green; text-align:center;'>Message sent successfully!</p>";
    } catch (Exception $e) {
        $msg = "<p style='color:red; text-align:center;'>Message could not be sent. Error: {$mail->ErrorInfo}</p>";
    }
}
?>

<style>

    .contact-hero {
    background: linear-gradient(to right, #0066cc, #004080);
    color: white;
    text-align: center;
    padding: 70px 20px;
    border-radius: 0 0 20px 20px;
}

.contact-hero h1 {
    font-size: 38px;
    margin-bottom: 10px;
}

.contact-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 50px 10%;
    background-color: #f7f9fc;
    gap: 40px;
}

.contact-form, .contact-info {
    flex: 1;
    min-width: 280px;
}

.contact-form h2, .contact-info h2 {
    margin-bottom: 20px;
    color: #004080;
}

.contact-form form {
    display: flex;
    flex-direction: column;
}

.contact-form input,
.contact-form textarea {
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
    width: 100%;
}

.contact-form button {
    background-color: #ff6600;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.contact-form button:hover {
    background-color: #e65500;
}

.contact-info p {
    font-size: 16px;
    margin-bottom: 10px;
    color: #333;
}

.contact-info a {
    color: #004080;
    text-decoration: none;
}

</style>


<main class="contact-section">
    <section class="contact-hero">
        <h1>Contact Us</h1>
        <p>Have a question or suggestion? We'd love to hear from you.</p>
    </section>

    <section class="contact-container">
        <div class="contact-form">
            <h2>Send Us a Message</h2>
            <form action="#" method="post">

<form action="contact.php" method="post">


                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>

        <div class="contact-info">
            <h2>Contact Details</h2>
            <p><strong>Phone:</strong> <a href="tel:8200106240">8200106240</a></p>
            <p><strong>Email:</strong> umangvadhiya007@gmail.com</p>
            <p><strong>Location:</strong> Junagadh, Gujarat, India</p>
        </div>
    </section>
</main>

<? include_once('includes/footer.php'); ?>