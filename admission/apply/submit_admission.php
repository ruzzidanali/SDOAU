<?php
session_start();
error_reporting(1);
include('../connect.php');

$date = date("Y-m-d");

if (isset($_POST['finish'])) {

    // Retrieve form data

    ///Maklumat Pemohon
    echo $txtmatricID = $_POST["txtmatricID"];
    echo $txticno = $_POST["txticno"];
    echo $txtfullname = $_POST["txtfullname"];
    echo $gender = $_POST["gender"];
    echo $txtphone = $_POST["txtphone"];
    echo $txtemail = $_POST["txtemail"];
    echo  $txtaddress = $_POST["txtaddress"];
    echo $txtcity = $_POST["txtcity"];
    echo $state = $_POST["state"];
    echo $txtpostcode = $_POST["txtpostcode"];

    ////Maklumat Ibubapa
    echo  $txticnoibu = $_POST["txticnoibu"];
    echo  $txtnamaibu = $_POST["txtnamaibu"];
    echo $txticnobapa = $_POST["txticnobapa"];
    echo $txtnamabapa = $_POST["txtnamabapa"];
    echo $txtnamawaris = $_POST["txtnamawaris"];
    echo $txtaddress_waris = $_POST["txtaddress_waris"];
    echo $txtcity_waris = $_POST["txtcity_waris"];
    echo $state_waris = $_POST["state_waris"];
    echo $txtpostcode_waris = $_POST["txtpostcode_waris"];
    echo $txtphone_waris = $_POST["txtphone_waris"];

    ////Maklumat Pendidikan
    echo $pendidikan = $_POST["pendidikan"];
    echo $cgpa = $_POST["cgpa"];
    echo $muet = $_POST["muet"];

    ////Pilihan program
    echo $pilihan_1 = $_POST["pilihan_1"];
    echo $pilihan_2 = $_POST["pilihan_2"];
    echo $pilihan_3 = $_POST["pilihan_3"];
    echo $pilihan_4 = $_POST["pilihan_4"];
    echo $pilihan_5 = $_POST["pilihan_5"];

    $currentDate = date("Ymd");
    $applicationID = $txticno . "_" . $currentDate;

    $picture = $_FILES['picture']['name'];

    // Generate the new file name using the matric ID
    $newFileName = $txtmatricID . '.' . pathinfo($picture, PATHINFO_EXTENSION);

    // Move the uploaded file to a desired location
    $targetDir = "../upload/";
    $targetFilePath = $targetDir . basename($newFileName);
    move_uploaded_file($_FILES['picture']['tmp_name'], $targetFilePath);

    // Update the SQL query to include the "picture" column
    $sql_pemohon = "INSERT INTO tbl_pemohon (applicationID, matricID, icno, fullname, gender, phone, email, address, city, state, postcode, application_date, picture)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt_pemohon = $conn->prepare($sql_pemohon);

    // Bind the parameters to the prepared statement
    $stmt_pemohon->bind_param("sssssssssssss", $applicationID, $txtmatricID, $txticno, $txtfullname, $gender, $txtphone, $txtemail, $txtaddress, $txtcity, $state, $txtpostcode, $date, $newFileName);

    // Execute the prepared statement
    $stmt_pemohon->execute();

    // Insert into tbl_ibubapawaris
    $sql_ibubapawaris = "INSERT INTO tbl_ibubapawaris (matricID, icno_ibu, nama_ibu, icno_bapa, nama_bapa, nama_waris, address_waris, city_waris, state_waris, postcode_waris, phone_waris)
VALUES ('$txtmatricID', '$txticnoibu', '$txtnamaibu', '$txticnobapa', '$txtnamabapa', '$txtnamawaris', '$txtaddress_waris', '$txtcity_waris', '$state_waris', '$txtpostcode_waris', '$txtphone_waris')";

    if ($conn->query($sql_ibubapawaris) === TRUE) {
        echo "Data inserted into 'tbl_ibubapawaris' table successfully<br>";
    } else {
        echo "Error inserting data into 'tbl_ibubapawaris' table: " . $conn->error . "<br>";
    }

    // Insert into tbl_pendidikan
    $sql_pendidikan = "INSERT INTO tbl_pendidikan (matricID, pendidikan, cgpa, muet)
VALUES ('$txtmatricID', '$pendidikan', '$cgpa', '$muet')";

    if ($conn->query($sql_pendidikan) === TRUE) {
        echo "Data inserted into 'tbl_pendidikan' table successfully<br>";
    } else {
        echo "Error inserting data into 'tbl_pendidikan' table: " . $conn->error . "<br>";
    }

    // Insert into tbl_pilihan
    $sql_pilihan = "INSERT INTO tbl_pilihan (matricID, pilihan_1, pilihan_2, pilihan_3, pilihan_4, pilihan_5)
VALUES ('$txtmatricID', '$pilihan_1', '$pilihan_2', '$pilihan_3', '$pilihan_4', '$pilihan_5')";

    if ($conn->query($sql_pilihan) === TRUE) {
        echo "Data inserted into 'tbl_pilihan' table successfully<br>";
    } else {
        echo "Error inserting data into 'tbl_pilihan' table: " . $conn->error . "<br>";
    }

    echo "<script>";
    echo "alert('Permohonan telah dihantar. Sila gunakan ID Permohonan untuk Log Masuk: $applicationID');";
    echo "window.location.href = '../index.php';"; // Replace 'index.php' with the desired redirect URL
    echo "</script>";
}
