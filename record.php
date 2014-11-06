<?php session_start();
    $_SESSION["playerA"]= $_POST["playerA"];
    $_SESSION["playerB"]= $_POST["playerB"];
?>
<html>
<head>
    <title>record result</title>
    <script src="resource/jquery-1.11.1.min.js"></script>
    <script src="resource/record.js"></script>
    <link rel="stylesheet" href="resource/record.css">
</head>
<body>
<div>
    Record Successfully! Going back in <span id="show">2</span> seconds!
</div>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Jasmine
 * Date: 10/17/14
 * Time: 10:28 AM
 */
$playerA = $_POST["playerA"];
$playerB = $_POST["playerB"];
$scoreA = (int)$_POST["scoreA"];
$scoreB = (int)$_POST["scoreB"];
$date = $_POST["dtimepicker1"];
$today = date("Y-m-d");

if($date==$today){
    //if default, get current time
   $time =  strftime("%Y-%m-%d %H:%M",time());
}else{
    //if not today, get input time
   $time= $date;
}

if($playerA=='Please choose Player A'){

}else if($playerB=='Please choose Player B'){

}else if($playerA==$playerB){

}else{
    $fp = fopen('log/result.log','a');
    flock($fp, LOCK_EX);
    while($scoreA>0){
        fwrite($fp,"time=".$time.", winner=\"".$playerA."\", loser=\"".$playerB."\"\n");
        $scoreA--;
    }
    while($scoreB>0){
        fwrite($fp,"time=".$time.", winner=\"".$playerB."\", loser=\"".$playerA."\"\n");
        $scoreB--;
    }
    flock($fp, LOCK_UN);
    fclose($fp);
}
?>