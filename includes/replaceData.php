<?php
$jsonString = $_POST['feedback'];
echo $jsonString;
$newJsonString = json_encode($jsonString);
//unlink('feedback.json');
file_put_contents("feedback.json", $newJsonString);
$ok = 'ok';
echo $ok;