<?php
include("../../config/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $userId = $_POST['user_id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $gender = $_POST['gender'];

    // Check if the user selected a new avatar
    if ($_FILES['user_avatar']['size'] > 0) {
        // Get the temporary file name
        $image_tmp = $_FILES['user_avatar']['tmp_name'];

        // Generate a unique image name
        $image_name = $_FILES['user_avatar']['name'];
        $image_path = time() . '_' . $image_name;

        // Move the uploaded file to the uploads folder
        move_uploaded_file($image_tmp, 'uploads/' . $image_path);

        // Update user information with the new avatar path
        $updateSQL = "UPDATE user SET
                        fullname = '$fullname',
                        username = '$username',
                        email = '$email',
                        phone_number = '$phone_number',
                        password = '$password',
                        gender = '$gender',
                        avatar = '$image_path'
                      WHERE id = $userId";
    } else {
        // Update user information without changing the avatar
        $updateSQL = "UPDATE user SET
                        fullname = '$fullname',
                        username = '$username',
                        email = '$email',
                        phone_number = '$phone_number',
                        password = '$password',
                        gender = '$gender'
                      WHERE id = $userId";
    }

    // Execute the update query
    $updateResult = mysqli_query($mysqli, $updateSQL);

    if ($updateResult) {
        header("Location:../../index.php?action=quanlykhachhang");
    } else {
        echo "Error updating user information: " . mysqli_error($mysqli);
    }
} else {
    echo "Invalid request method.";
}
?>
