<?php
session_start();

require ('../../private/smarty/Smarty.class.php');
require ('../../private/model.php');
require ('../../private/controller.php');

$smarty = new Smarty();
$smarty->setCompileDir('../../private/tmp');
$smarty->setTemplateDir('../../private/views');

define('CONTENTS_PER_PAGE',5);

//Ternary operator
$page = isset($_GET['page']) ?  $_GET['page'] : 'home';
$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : '1' ;
$searchterm = isset($_GET['searchterm']) ? '%' . $_GET['searchterm'] . '%' : '%';

if (isset($_POST['submit_login'])){
    login_action();

}

if (isset($_SESSION['loggedin'])){
    cms_action();
    exit();
}

if (isset($_POST['submitAlbum'])){
    upload_album();
}

switch ($page){
    case 'home' : homepage_action();break;
    case 'albums' : albumspage_action();break;
    case 'admin' : adminpage_action();break;
    case 'beheerder' : beheerder_action();break;
    default: page_not_found_action(); break;
}