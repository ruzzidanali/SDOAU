<?php
session_start();
// error_reporting(0);
include('../connect.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 

if (strlen($_SESSION['admin-username']) == "") {
    header("Location: login.php");
} else {

    $username = $_SESSION['admin-username'];
    $current_date = date('Y-m-d H:i:s');

    if (isset($_GET['userID']) && isset($_GET['admitProgram'])) {
        $userID = $_GET['userID'];
        $admitProgram = $_GET['admitProgram'];
        $email = $_GET['email'];

        // Update the status column in tbl_pemohon
        $sql = "UPDATE tbl_pemohon SET status = '$admitProgram' WHERE matricID = '$userID'";

        /////Send Email


        // Create a new PHPMailer instance
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0; // Set the debugging SMTP to false
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server address
        $mail->Port = 587; // Gmail SMTP port
        $mail->Username = 'pppa.staff@gmail.com'; // Your Gmail account username
        $mail->Password = 'pijarxcqrozqfnfw'; // Your Gmail account app password
        $mail->setFrom('ppa.staff@gmail.com', 'UMT ADMISSION'); // Your email address and name
        $mail->addAddress($email, 'Recipient Name'); // Recipient email address and name
        $mail->Subject = 'Permohonan UMT'; // Email subject
        $mail->Body = 'Permohonan anda telah kemaskini. Sila log masuk untuk melihat status permohonan dan surat tawaran. '; // Email body
        // $sql = "UPDATE tbl_parcels SET parcel_notification = '1' WHERE parcelID = '$parcelID'";
        $result = $conn->query($sql);

        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {


            echo "Tawaran telah dihantar!";
        }


        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Tawaran telah dikemaskini."); window.location.href = "user-record.php";</script>';
            exit;
        } else {
            echo "Error updating status: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request.";
    }
}
