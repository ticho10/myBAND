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

    $naam_album = trim($_POST['naamalbum']);
    $nummers = trim($_POST['albumsongs']);

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

function admin_album(){
    $mysqli = make_connection();

    $query = "SELECT *FROM album";

    $stmt= $mysqli->prepare($query);
    $stmt->bind_result($id, $naam, $nummer, $imagelink);
    $stmt->execute();
    echo '<table>';
    echo '<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Songs</th>
            <th>Image Link</th>
        </tr>';
    while ($stmt->fetch()){
        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $naam . '</td>';
        echo  '<td>' . nl2br($nummer) . '</td>';
        echo '<td>' . $imagelink . '</td>';
        echo '<th><a href="index.php?page=admin&id='. $id . '">Delete</a></th>';
        echo '</tr>';
    }
    echo '</table>';
}

function check_login(){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'admin'){
        $_SESSION['loggedin'] = 'loggedin';
    }
}