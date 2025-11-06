<?php
if (isset($_POST['user_name']) && isset($_POST['password'])) {
    function validate_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user_name = validate_input($_POST['user_name']);
    $password = validate_input($_POST['password']);

    if (empty($user_name)) {
        $em = "User name is required!";
        header("Location: ../login.php?error=$em");
        exit();
    } else if (empty($password)) {
        $em = "Password is required!";
        header("Location: ../login.php?error=$em");
        exit();
    } else {
        // Dummy credentials for demonstration
        $valid_user = "admin";
        $valid_pass = "password123";

        if ($user_name === $valid_user && $password === $valid_pass) {
            // Successful login
            header("Location: ../index.php?success=Login successful!");
            exit();
        } else {
            $em = "Invalid user name or password!";
            header("Location: ../login.php?error=$em");
            exit();
        }
    }
} else {
    $em = "Unknown error occurred!";
    header("Location: ../login.php?error=$em");
    exit();
}
