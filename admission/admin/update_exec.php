<?php
session_start();
// error_reporting(0);
include('../connect.php');


if (isset($_POST['update_program'])) {
    // Retrieve the updated program information from the form
    $kod_program = $_POST['kod_program'];
    $nama_program = $_POST['nama_program'];

    // Perform the database update operation
    $sql = "UPDATE tbl_r_program SET nama_program = '$nama_program' WHERE kod_program = '$kod_program'";
    // Assuming $conn is the database connection object
    if ($conn->query($sql) === true) {
        // Update successful
        echo '<script>alert("Maklumat telah dikemaskini."); window.location.href = "senarai_program.php";</script>';
        exit;
    } else {
        // Update failed
        echo "Error updating program information: " . $conn->error;
    }
}

if (isset($_POST['delete_program'])) {
    // Retrieve the program code to be deleted from the form
    $kod_program = $_POST['kod_program'];

    // Perform the database delete operation
    $sql = "DELETE FROM tbl_r_program WHERE kod_program = '$kod_program'";
    // Assuming $conn is the database connection object
    if ($conn->query($sql) === true) {
        // Delete successful
        echo '<script>alert("Program telah dihapuskan dari senarai."); window.location.href = "senarai_program.php";</script>';
        exit;
    } else {
        // Delete failed
        echo "Error deleting program: " . $conn->error;
    }
}

if (isset($_POST['tambah_program'])) {
    // Retrieve the program details from the form
    $kod_program = $_POST['kod_program'];
    $nama_program = $_POST['nama_program'];

    // Perform the necessary validations here

    // Check if the program code or program name already exists in the database
    $check_sql = "SELECT * FROM tbl_r_program WHERE kod_program = '$kod_program' OR nama_program = '$nama_program'";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        // Program with the same program code or program name already exists
        echo '<script>alert("Kod Program atau Nama Program telah wujud."); window.location.href = "senarai_program.php";</script>';
        exit;
    } else {
        // Perform the database insertion operation
        $insert_sql = "INSERT INTO tbl_r_program (kod_program, nama_program) VALUES ('$kod_program', '$nama_program')";
        if ($conn->query($insert_sql) === true) {
            // Insertion successful
            echo '<script>alert("Maklumat Program telah ditambah"); window.location.href = "senarai_program.php";</script>';
            exit;
        } else {
            // Insertion failed
            echo "Error adding program: " . $conn->error;
        }
    }
}
