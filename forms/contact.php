<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'contact@example.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

//   $contact->add_message( $_POST['name'], 'From');
//   $contact->add_message( $_POST['email'], 'Email');
//   $contact->add_message( $_POST['message'], 'Message', 10);

//   echo $contact->send();
// ?>
// <?php
// Include PHPMailer Autoload.php file
require 'PHPMailer/PHPMailerAutoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Email details
    $to = "ypfanelo@gamil.com"; // Enter recipient email address here
    $from = "ypfanelo@gamil.com"; // Enter your email address here
    $fromName = "Theo Mulaudzi"; // Enter your name here
    
    // SMTP configuration
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'ssmtp.gmail.com'; // Enter SMTP host here
    $mail->SMTPAuth = true;
    $mail->Username = 'ypfanelo@gmail.com'; // Enter SMTP username here
    $mail->Password = 'zvdneelboapaanty'; // Enter SMTP password here
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25; // TCP port to connect to
    
    // Email content
    $mail->setFrom($from, $fromName);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";
    
    // Send email
    if ($mail->send()) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
} else {
    // Redirect back to the contact form if accessed directly
    header("Location: contact_form.html");
    exit();
}
?>
