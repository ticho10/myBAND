<?php

function homepage_action(){
//    MODEL
    global $smarty, $page;
    display_page($page);
}

function albumspage_action(){
//    MODEL
    global $smarty, $page;
    display_page($page);
}

function adminpage_action(){
    global $smarty;



    $smarty->display('header.tpl');
    $smarty->display('admin.tpl');
    delete_album();
    $smarty->display('footer.tpl');
}

function page_not_found_action(){
    global $page;
    display_page($page);
}

function display_page($page){
    global $smarty;
    $smarty->assign('title',strtoupper($page));
    $smarty->display('header.tpl');
    $smarty->display('menu.tpl');
    $smarty->display( $page . '.tpl');
    $smarty->display('toAdmin.tpl');
    $smarty->display('footer.tpl');

}

function beheerder_action(){
    global $smarty;
    $smarty->display('inlogformulier.tpl');
}

function login_action(){
    global $smarty;
    check_login();
}