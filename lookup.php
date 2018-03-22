<?php

$sid = $_POST['sid'];

require_once 'config.php';
$cnxn = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
$select = "SELECT * FROM student2 WHERE sid=:sid";
$statement = $cnxn->prepare($select);
$statement->bindValue(':sid', $sid);
$statement->execute();

$row = $statement->fetch(PDO::FETCH_ASSOC);

if(empty($row)) {
    echo "Student not found";
}else{
    //print_r($row);
    $out = "SID: ". $sid."<br>";
    $out .= "Name: ". $row['first']." ". $row['last']."<br>";
    $out .= "Birthdate: ". $row['birthdate']."<br>";
    $out .= "GPA: ". $row['gpa'];
    echo $out;

}