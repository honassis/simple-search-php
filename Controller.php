<?php
include_once "classes/environment.class.php";

include_once "classes/database.class.php";

include_once "classes/main.class.php";

$r1 = isset($_POST['r1']) ? $_POST['r1'] : "";
if(strlen($r1)<=9){
    $r1 = "NO_SEARCH_NO_SEARCH";
}
$r2 = isset($_POST['r2']) ? $_POST['r2'] : "";
$r2 = intval($r2);
if($r2>200000&&$r2<300000){
    //tranquilo
}else{
$r2="NO_SEARCH_NO_SEARCH";
}
switch ($_POST['action']) {
    case 'search':
        ?>
      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Result</title>
</head>
<body class="body"> 
    <div class="center">
    <span id="txt">
    <?php
    @$msg = Main::init($r1, $r2)[0]['text'];
    if($msg==null){
        echo "<h1>Erro Na Pesquisa</h1> <a href='index.html'>Voltar</a>";
    }else{
        echo $msg;
    }
    
    ?>
    </span>
</div>
</body> 
</html>
        <?php
    break;
    case 'create':
        Main::create($r1);
        header('location:index.html');
    break;
}

?>
