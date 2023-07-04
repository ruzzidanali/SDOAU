<?php
session_start();
error_reporting(1);
include('../connect.php');

$date = date("Y-m-d");

if (isset($_POST['peribadi'])) {
    // Retrieve form data
    $matricID = $_POST['txtmatricID'];
    $icno = $_POST['txticno'];
    $fullname = $_POST['txtfullname'];
    $gender = $_POST['gender'];
    $phone = $_POST['txtphone'];
    $email = $_POST['txtemail'];
    $address = $_POST['txtaddress'];
    $city = $_POST['txtcity'];
    $state = $_POST['state'];
    $postcode = $_POST['txtpostcode'];

    // Assuming you have established a database connection

    // Step 2: Check if a file was uploaded
    if (!empty($_FILES['picture']['name'])) {
        // Retrieve the uploaded file details
        $fileName = $_FILES['picture']['name'];
        $fileTmp = $_FILES['picture']['tmp_name'];

        // Step 4: Query the database to select the associated name
        $sql = "SELECT picture from tbl_pemohon where matricID ='$matricID' ";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);

        // Step 7: Delete the old picture
        $oldFileName = $row['picture'];
        $oldFilePath = '../upload/' . $oldFileName;
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }

        // Step 5: Generate a new file name
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid().'.'.$extension;

        // Step 6: Upload the new picture and rename it
        $destination = '../upload/' . $newFileName;
        move_uploaded_file($fileTmp, $destination);

        // Step 8: Update the database with the new file name
        $sql = "UPDATE tbl_pemohon SET picture = '$newFileName' WHERE matricID = '$matricID'";
        $conn->query($sql);

        // Step 9: Provide feedback to the user
        echo "Picture uploaded and renamed successfully.";
    } else {
        echo "No file was uploaded.";
    }

    // Prepare and execute the SQL statement
    $sql = "UPDATE tbl_pemohon SET
                fullname = '$fullname',
                gender = '$gender',
                phone = '$phone',
                email = '$email',
                address = '$address',
                city = '$city',
                state = '$state',
                postcode = '$postcode'
            WHERE matricID = '$matricID' AND icno = '$icno'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo "alert('Maklumat Peribadi telah dikemaskini');";
        echo "window.location.href = 'edit-profile.php';"; // Replace 'index.php' with the desired redirect URL
        echo "</script>";
    } else {
        echo "Error updating data: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}


// Check if the form is submitted
if (isset($_POST['parents'])) {
    // Retrieve form data
    $matricID = $_POST['txtmatricID'];
    $icno_ibu = $_POST['txticnoibu'];
    $nama_ibu = $_POST['txtnamaibu'];
    $icno_bapa = $_POST['txticnobapa'];
    $nama_bapa = $_POST['txtnamabapa'];
    $nama_waris = $_POST['txtnamawaris'];
    $address_waris = $_POST['txtaddress_waris'];
    $city_waris = $_POST['txtcity_waris'];
    $state_waris = $_POST['state_waris'];
    $postcode_waris = $_POST['txtpostcode_waris'];
    $phone_waris = $_POST['txtphone_waris'];

    // Prepare and execute the SQL statement
    $sql = "UPDATE tbl_ibubapawaris SET
                icno_ibu = '$icno_ibu',
                nama_ibu = '$nama_ibu',
                icno_bapa = '$icno_bapa',
                nama_bapa = '$nama_bapa',
                nama_waris = '$nama_waris',
                address_waris = '$address_waris',
                city_waris = '$city_waris',
                state_waris = '$state_waris',
                postcode_waris = '$postcode_waris',
                phone_waris = '$phone_waris'
            WHERE matricID = '$matricID' ";

    if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo "alert('Maklumat Ibubapa/Waris telah dikemaskini');";
        echo "window.location.href = 'edit-profile.php';"; // Replace 'edit-profile.php' with the desired redirect URL
        echo "</script>";
    } else {
        echo "Error updating data: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}

// Check if the form is submitted
if (isset($_POST['pendidikan'])) {
    // Retrieve form data
    $matricID = $_POST['txtmatricID'];
    $pendidikan = $_POST['pendidikan'];
    $cgpa = $_POST['cgpa'];
    $muet = $_POST['muet'];



    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $sql = "UPDATE tbl_pendidikan SET
                pendidikan = '$pendidikan',
                cgpa = '$cgpa',
                muet = '$muet'
            WHERE matricID = '$matricID'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo "alert('Maklumat Pendidikan telah dikemaskini');";
        echo "window.location.href = 'edit-profile.php';"; // Replace 'edit-profile.php' with the desired redirect URL
        echo "</script>";
    } else {
        echo "Error updating data: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
