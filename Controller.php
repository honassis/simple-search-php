<?php
include_once "classes/environment.class.php";

include_once "classes/database.class.php";

include_once "classes/main.class.php";

$r1 = isset($_POST['r1']) ? $_POST['r1'] : "";
$r2 = isset($_POST['r2']) ? $_POST['r2'] : "";
switch ($_POST['action']) {
    case 'search':
        print_r(Main::init($r1, $r2));
    break;
    case 'create':
        Main::create($r1);
        header('location:index.php');
    break;
}

?>
