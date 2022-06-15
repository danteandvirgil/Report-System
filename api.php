<?php

include_once __DIR__ . "/includes/config.php";


// users table structure
// CREATE TABLE `users` (
//     `id` int NOT NULL,
//     `name` varchar(255) NOT NULL,
//     `username` varchar(255) NOT NULL,
//     `password` varchar(255) NOT NULL,
//     `reg_date` int NOT NULL,
//     `is_admin` int NOT NULL DEFAULT '0'
//   );

// issues table structure
// CREATE TABLE `issues` (
//     `id` int NOT NULL,
//     `issue_msg` varchar(255) NOT NULL,
//     `location` int NOT NULL,
//     `user_id` int NOT NULL,
//     `report_date` int NOT NULL,
//     `status` int NOT NULL
// );

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
        $reg_date = time();
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (`name`, `username`, `password`, `reg_date`) VALUES ('$name', '$username', '$password', $reg_date)";
        $pdo = getPDOConnection();
        $pdo->exec($sql);
        header("Location: login.php");
        exit();
    } else {
        header("Location: signup.php?error=password_mismatch");
        exit();
    }
}

// login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = ?";
    $pdo = getPDOConnection();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            $_SESSION['is_admin'] = (bool) $user['is_admin'];
            header("Location: index.php");
            exit;
        }
    }

    $_SESSION['error'] = 'wrong_credentials';

    header("Location: login.php");
    exit;
}


// logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

// report issue
if (isset($_POST['report_issue'])) {
    $issue_msg = $_POST['issue_msg'];
    $location = $_POST['location'];
    $user_id = $_SESSION['user']['id'];
    $report_date = time();
    $status = 0;
    $sql = "INSERT INTO issues (`issue_msg`, `location`, `user_id`, `report_date`, `status`) VALUES (?, ?, ?, ?, ?)";
    $pdo = getPDOConnection();
    $pdo->prepare($sql)->execute([$issue_msg, $location, $user_id, $report_date, $status]);
    header("Location: issues.php");
    exit;
}

// confirmissue
if (isset($_POST['confirm_issue'])) {
    $issue_id = $_POST['issue_id'];
    $status = 1;
    $sql = "UPDATE issues SET status = ? WHERE id = ?";
    $pdo = getPDOConnection();
    $pdo->prepare($sql)->execute([$status, $issue_id]);
    echo reportedBtnHTML();
    exit;
}
