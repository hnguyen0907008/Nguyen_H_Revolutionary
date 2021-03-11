<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require_once './load.php';

    if (isset($_POST['submit'])){
        $mail = new PHPMailer();

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        //Set the encryption mechanism to use - STARTTLS or SMTPS
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;

        //add recipient
        $mail->addAddress('xuanhien1110@gmail.com', 'Hien Xuan');

        //password of sender
        $mail->Password = 'hien4444';

        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $mail->Username = $email;
        $mail->setFrom($email, $name); 
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = '<p>Name:' .$name. '<br>Phone:' .$phone. '<br>Message:' .$message.'</p>';

        //send email
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            redirect_to('./confirm_mail.html');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Revolutionary - Contact</title>
</head>
<body>
    <main>
        <h1 class="hidden">Revolutionary Contact Page</h1>
        <header>
            <div id="logo">
                <a href="index.html"><img src="public/images/main-logo.svg" alt="Logo"></a>
            </div>
            
            <div id="menu">
                <img src="public/images/menu.png" alt="Menu">
                <div id="dropdown">
                    <!--appear in phone size-->
                    <ul>
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="events.html">EVENTS</a></li>
                        <li><a href="platform.html">PLATFORM</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul>
                </div>
            </div>

            <nav id="header-nav">
                <!--desktop menu-->
                <ul>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="events.html">EVENTS</a></li>
                    <li><a href="platform.html">PLATFORM</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </div>
        </header>

        <section class="contact">
            <h1 class="hidden">Contact Content</h2>
            <section class="hero-contact">
                <h2>CONTACT US</h2>
                <p>SEND US YOUR INQUIRY</p>
                <div id="line"></div>
                <p>FOLLOW US ON</p>
                <div id="socialMedia">
                    <ul>
                        <li><a href="#"><img src="public/images/fb-icon.png" alt="FB"></a></li>
                        <li><a href="#"><img src="public/images/ins-icon.png" alt="INS"></a></li>
                        <li><a href="#"><img src="public/images/yt-icon.png" alt="YT"></a></li>
                    </ul>
                </div>
            </section><!--end hero-->

            <section class="contact-form">
                <h2 class="hidden">Contact Form</h2>
                <form action="" method="post">
                    <label for="name">NAME</label><br>
                    <input type="text" name="name" id="name" value=""><br>
                    <label for="email">EMAIL</label><br>
                    <input type="email" name="email" id="email" value=""><br>
                    <label for="subject">SUBJECT</label><br>
                    <input type="text" name="subject" id="subject" value=""><br>
                    <label for="phone">PHONE</label><br>
                    <input type="number" name="phone" id="phone" value=""><br>
                    <label for="message">MESSAGE</label><br>
                    <textarea name="message" id="message"></textarea><br>

                    <button name="submit">SUBMIT</button>
                </form>
            </section>
    </main>
    <footer>
        <div class="wrapper">
            <div id="logo">
                <a href="index.html"><img src="public/images/white-logo.svg" alt="Logo"></a>
            </div>
            <nav id="footerNav">
                <ul>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="events.html">EVENTS</a></li>
                    <li><a href="platform.html">PLATFORM</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </nav>
        </div>

        <div id="socialMedia">
            <ul>
                <li><a href="#"><img src="public/images/facebook.svg" alt="FB"></a></li>
                <li><a href="#"><img src="public/images/instagram.svg" alt="INS"></a></li>
                <li><a href="#"><img src="public/images/youtube.svg" alt="YT"></a></li>
            </ul>
        </div>
    </footer>
</body>
</html>