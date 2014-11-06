<?php
/**
 * Created by PhpStorm.
 * User: Jasmine
 * Date: 10/19/14
 * Time: 10:27 AM
 */
$name = $_POST['name'];
$handle = fopen("player.txt","a");
flock($handle, LOCK_EX);
fwrite($handle,$name."\n");
flock($handle, LOCK_UN);
fclose($handle);

?>