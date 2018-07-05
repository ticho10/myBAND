<?php
require ('connectvars.php');
function make_connection(){
    $mysqli = new mysqli(HOST, USER, PASS, DBNAME);
    if ($mysqli->connect_errno){
        die('Connection error: ' . $mysqli->connect_errno . '<br>');
    }
    return $mysqli;

}

function upload_album(){

    $naam_album = $_POST['naamalbum'];
    $nummers = $_POST['albumsongs'];

    $temp_location = $_FILES['albumimage']['tmp_name'];
    $target_location = 'images/' . time() . $_FILES['albumimage']['name'];



    if ($_FILES['albumimage']['size']< 2000000){
        $result = move_uploaded_file($temp_location,$target_location);
    }else{
        echo 'Dit is wel een heel groot bestand';
    }

    if ($result){
        $mysqli = make_connection();

        $query = "INSERT INTO album VALUES (0,?,?,?)";
        $stmt = $mysqli->prepare($query) or die ('error 1');
        $stmt->bind_param('sss', $naam_album, $nummers, $target_location) or die("error bind");
        $stmt->execute() or die ("error execute");

    }
}

function delete_album(){
    $mysqli = make_connection();

    $query = "SELECT *FROM album";

    $stmt= $mysqli->prepare($query);
    $stmt->bind_result($id, $naam, $nummer, $imagelink);
    $stmt->execute();

    while ($stmt->fetch()){
        echo $id . '<br>';
        echo $naam . '<br>';
        echo $nummer . '<br>';
        echo $imagelink . '<br>';
    }
}

function check_login(){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'admin'){
        $_SESSION['loggedin'] = 'loggedin';
    }
}