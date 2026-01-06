<?php 
include('database.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

session_start();
if(!isset($_SESSION['guest_id'])){
	header("location:index.php");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_id = $_POST['booking_id'];
    $reason = $_POST['reason'];
    $sql = "SELECT property_id, name FROM booking WHERE id = $booking_id";
    $booking = $obj->query($sql, 1);

    if ($booking) {
        $property_id = $booking['property_id'];
        $booking_name = $booking['name'];
        $sql = "SELECT owner_id FROM property WHERE id = $property_id";
        $property = $obj->query($sql, 1);

        if ($property) {
            $owner_id = $property['owner_id'];
            $sql = "SELECT email FROM owner WHERE id = $owner_id";
            $owner = $obj->query($sql, 1);

            if ($owner) {
                $owner_email = $owner['email'];

                // Prepare email
                $subject = "Booking Cancellation Notification";
                $message = "<html>
                <head>
                    <title>Booking Cancellation</title>
                </head>
                <body>
                    <p>Dear Owner,</p>
                    <p>The following booking has been canceled:</p>
                    <p><strong>Booking ID:</strong> $booking_id</p>
                    <p><strong>Name:</strong> $booking_name</p>
                    <p><strong>Reason for Cancellation:</strong> $reason</p>
                    <p>Thank you!</p>
                </body>
                </html>";

                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'farmstayhub21@gmail.com';
                    $mail->Password = 'xzbv hufo fimo usnx';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
                    $mail->setFrom('farmstayhub21@gmail.com', 'FarmHouse Booking');
                    $mail->addAddress($owner_email);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body    = $message;

                    $mail->send();
                    echo '<script>alert("A cancellation email has been sent.")</script>';
                } catch (Exception $e) {
                    echo '<script>alert("Error sending cancellation email: {$mail->ErrorInfo}")</script>';
                }
                $sql = "UPDATE booking SET status = 'canceled', cancel_reason = '$reason' WHERE id = $booking_id";
                $affected_rows = $obj->query($sql, 4);

                if ($affected_rows > 0) {
                    echo '<script>alert("Booking canceled successfully.")</script>';
                } else {
                    echo '<script>alert("Error updating booking status.")</script>';
                }
            } else {
                echo '<script>alert("Owner email not found.")</script>';
            }
        } else {
            echo '<script>alert("Property not found.")</script>';
        }
    } else {
        echo '<script>alert("Booking not found.")</script>';
    }
}
?>
