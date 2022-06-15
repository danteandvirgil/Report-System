<?php
// DB credentials.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'issues');
// Establish database connection.

ini_set('display_errors', 1);

session_start();

// mysqli getConnection method
function getMySQLiConnection() {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    
    return $mysqli;
}

// pdo getConnection method
function getPDOConnection() {
    try {
        $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
    
    return $dbh;
}

function ensureLoggedIn() {
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }
}

// get current user issues join users table on user_id
function getCurrentAllIssues() {
    $sql = "SELECT *, issues.id AS issue_id FROM issues JOIN users ON issues.user_id = users.id ORDER BY issues.report_date DESC";
    $pdo = getPDOConnection();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}

// function to echo disabled is not admin
function echoDisabledIfNotAdmin() {
    if (!$_SESSION['is_admin']) {
        echo 'disabled';
    }
}

// function to echo logged in user name
function echoLoggedInUserName() {
    echo $_SESSION['user']['name'];
}

function isAdmin() {
    return $_SESSION['is_admin'];
}

function reportedBtnHTML() {
    return '<button class="button reported-btn"><i class="fa-solid fa-check"></i> &nbsp; Reported</button>';
}

function echoActiveIfPage($page) {
    $phpself = $_SERVER['PHP_SELF'];

    // split at / and take last element
    $phpself_split = explode('/', $phpself);
    $phpself_split = end($phpself_split);

    if ($phpself_split == $page) {
        echo 'active';
    }
}