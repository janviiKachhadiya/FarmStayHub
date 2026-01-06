<?php
require_once('../vendor/autoload.php');
include('database.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $property_id = $_GET['property_id'];
    $guest_id = $_GET['guest_id'];
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $person = $_GET['person'];
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    $start_time = $_GET['start_time'];
    $end_time = $_GET['end_time'];
    $amount = $_GET['amount'];
    $email = $_GET['email'];

    $intent = ([
        'amount' => $amount * 100,
        'currency' => 'usd',
    ]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property_id = $_POST['property_id'];
    $guest_id = $_POST['guest_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $person = $_POST['person'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $amount = $_POST['amount'];
    $created = date('Y-m-d');
    $email = $_POST['email'];
    $payment_status = $_POST['payment_status'];

    if ($payment_status === 'succeeded') {
        $sql = "INSERT INTO booking (property_id, guest_id, name, phone, person, start_date, end_date, start_time, end_time,amount,created)
                VALUES ('$property_id', '$guest_id', '$name', '$phone', '$person', '$start_date', '$end_date', '$start_time', '$end_time', '$amount','$created')";
        $result = $obj->query($sql, 3);

        if ($result) {
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
                $mail->addAddress($email, $name);

                $mail->isHTML(true);
                $mail->Subject = 'Booking Confirmation';
                $mail->Body = "Hello $name,<br>Your booking is confirmed! Enjoy your stay!<br><br>Regards,<br>Farmstay Hub Team";

                $mail->send();
                echo json_encode(['success' => true, 'message' => 'Booking confirmed and email sent!']);
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'message' => 'Error sending email: ' . $mail->ErrorInfo]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to insert booking.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Payment failed.']);
    }
    exit;
}
?>


<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>
    <link rel="stylesheet" href="assets/css/stripe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            color: #515151;
            font-family: 'Open Sans', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f7f7f7;
        }

        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .left-section, .right-section {
            width: 48%;
        }

        #overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 999;
            top: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        #container {
            position: relative;
            background: #fff;
            padding: 20px 17px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: none;
        }

        h1 {
            margin: 30px 0 20px 0;
            font-weight: normal;
        }

        p {
            font-size: 0.9em;
            margin-bottom: 25px;
        }

        button {
            width: 100%;
            background: #73c242;
            border: transparent;
            border-radius: 3%;
            padding: 10px;
            text-transform: uppercase;
            color: white;
            letter-spacing: 1px;
            cursor: pointer;
        }

        #circle {
            position: absolute;
            width: 80px;
            height: 80px;
            background: #73c242;
            border-radius: 50%;
            text-align: center;
            top: -40px;
            left: calc(50% - 40px); /* Center the circle */
        }

        i {
            color: white;
            margin: 25px;
            font-size: 30px;
        }

        /* Error message styling */
        #payment-message.error {
            color: red;
        }

        /* Success message styling */
        #payment-message.success {
            color: green;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="left-section"> 
            <h3>Farm Payment</h3>
            <p class="price"><?php echo $amount; ?></p>
        </div>
        <div class="right-section">
            <h3>Pay with Card</h3>
            <form id="payment-form">
                <input type="email" id="email" class="StripeElement" placeholder="Email" required />
                <div id="card-element" class="StripeElement">
                    <!-- Stripe Element will be inserted here -->
                </div>
                <input type="text" id="name-on-card" class="StripeElement" placeholder="Name on card" required />
                <input type="text" id="country" class="StripeElement" placeholder="Country or region" required />
                <button id="submit">Pay Now</button>
            </form>
        </div>
    </div>

    <!-- Overlay and success container -->
    <div id="overlay">
        <div id="container">
            <div id="circle">
                <i class="fa fa-check success-icon"></i>
            </div> 
            <p id="payment-message" name="payment_status"></p>
            <button id="ok-button">Ok</button>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
    var stripe = Stripe('');
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');

    var form = document.getElementById('payment-form');
    var success_icon = document.getElementsByClassName('success-icon')[0];
    var error_icon = document.getElementsByClassName('error-icon')[0];
    var submitButton = document.getElementById('submit');
    var paymentMessage = document.getElementById('payment-message');
    var okButton = document.getElementById('ok-button');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        submitButton.disabled = true;

        stripe.confirmCardPayment('<?= $intent->client_secret; ?>', {
            payment_method: {
                card: card
            }
        }).then(function(result) {
            if (result.error) {
                paymentMessage.textContent = result.error.message;
                paymentMessage.classList.add('error');
                paymentMessage.classList.remove('success');
                paymentMessage.style.display = 'block';
                submitButton.disabled = false;
            } else if (result.paymentIntent.status === 'succeeded') {
                paymentMessage.textContent = "Payment successful!";
                paymentMessage.classList.add('success');
                paymentMessage.classList.remove('error');
                paymentMessage.style.display = 'block';
                document.getElementById('overlay').style.display = 'flex';
                document.getElementById('container').style.display = 'block';
                document.getElementById('container').style.width = '263px';

                okButton.addEventListener('click', function() {
                    document.getElementById('overlay').style.display = 'none';
                    document.getElementById('container').style.display = 'none';
                    sendBookingData(result.paymentIntent.status);
                }, { once: true });
            }
        });
    });

    function sendBookingData(paymentStatus) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'payment.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                console.log('Status:', xhr.status);
                console.log('Response:', xhr.responseText);
                try {
                    var response = JSON.parse(xhr.responseText);
                    alert(response.message);
                    window.location.href = "booking_detail.php";
                } catch (e) {
                    console.error('Failed to parse JSON response:', e);
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        };

        var data = {
            payment_status: paymentStatus,
            property_id: '<?php echo $property_id; ?>',
            guest_id: '<?php echo $guest_id; ?>',
            name: '<?php echo $name; ?>',
            phone: '<?php echo $phone; ?>',
            person: '<?php echo $person; ?>',
            start_date: '<?php echo $start_date; ?>',
            end_date: '<?php echo $end_date; ?>',
            start_time: '<?php echo $start_time; ?>',
            end_time: '<?php echo $end_time; ?>',
            amount: '<?php echo $amount; ?>',
            email: '<?php echo $email; ?>'
        };

        var params = Object.keys(data).map(key => key + '=' + encodeURIComponent(data[key])).join('&');
        xhr.send(params);
    }
});

        </script>
</body>
</html>
