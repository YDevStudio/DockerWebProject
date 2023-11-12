<?php
session_start();
ob_start();
require_once("../classes/assistClass/assist.class.php");
require_once("../classes/connectionClass/userRun.php");

if (isset($_POST['btnS']) && $_POST['password'] == $_POST['psc']) {
    $data = [$_POST['ln'], $_POST['fn'], $_POST['bd'], $_POST['gender'], $_POST['tel'], $_POST['email'], $_POST['password'], $_POST['address'], $_POST['city']];
    $u = new User($data);
    $ur = new UserRun();

    if ($ur->addUser($u)) {
        $id == $ur->conectUser($email, $password)[0];
        $c = assist::coder($email, $id);
        $co = "steC";
        setcookie($co, $c, time() + (86400 * 60), '/');
        $_COOKIE['steC'] = $c;
        $_SESSION['steS'] = $c;
        header("location:../../");
        header("location:logout.php");
    } else {
        echo 'error';
    }
}
ob_end_flush();
?>