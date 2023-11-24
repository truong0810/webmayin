<?php
require_once("../../config/config.php");

// Check if the form is submitted
if (isset($_POST['btn_add'])) {
    // Check if the "user_avatar" key exists in the $_FILES array
    if (isset($_FILES['user_avatar'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone_numb = $_POST['phone_number'];
        $password = $_POST['password'];
        $confirmpass = $_POST['confirm_password'];
        $user_gender = $_POST['user-gender'];

        // Get the temporary file name
        $image_tmp = $_FILES['user_avatar']['tmp_name'];

        // Generate a unique image name
        $image_name = $_FILES['user_avatar']['name'];
        $image_path = time() . '_' . $image_name;

        // Insert the user with the obtained role_id
        $SQL = "INSERT INTO user (fullname, username, email, gender, phone_number, password, avatar) 
                VALUES ( '$fullname', '$username', '$email', '$user_gender', '$phone_numb', '$password', '$image_path')";

        mysqli_query($mysqli, $SQL);

        // Move the uploaded file to the 'uploads' folder
        move_uploaded_file($image_tmp, 'uploads/' . $image_path);

        header("Location:../../index.php?action=quanlykhachhang");
        mysqli_close($mysqli);
    } else {
        echo "No file uploaded.";
    }
}
