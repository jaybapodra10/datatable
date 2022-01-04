<?php
if(isset($_POST['type'])){
    include "conn.php";
    if($_POST['type']=="delete"){
        extract($_POST);
        $studentQuery = $con->query("DELETE FROM student where id=$id");
        if($studentQuery) echo $studentQuery;
        else echo 0;
        die;
    }
    if($_POST['type']=="add"){
        extract($_POST);
        $studentQuery = $con->query("INSERT INTO student (`name`,`mobile`,`email`,`enroll`,`address`) VALUES ('$name','$mobile','$email','$enroll','$address')");
        echo $studentQuery;
        die;
    }
    if($_POST['type']=="edit"){
        extract($_POST);
        $studentQuery = $con->query("UPDATE student SET `name`='$name',`mobile`='$mobile',`email`='$email',`enroll`='$enroll',`address`='$address' where id=$id");
        echo $studentQuery;
        die;
    }
}
?>