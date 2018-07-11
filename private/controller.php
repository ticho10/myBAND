<?php

function homepage_action(){
//    MODEL
    global $smarty, $page;
    display_page($page);
}

function albumspage_action(){
//    MODEL
    global $smarty, $page;
    $smarty->display('header.tpl');
    $smarty->display('menu.tpl');
    $album_info = admin_album();
    $smarty->assign('album_info', $album_info);
    $smarty->display( 'albums.tpl');
    $smarty->display('toAdmin.tpl');
    $smarty->display('footer.tpl');
}

function adminpage_action(){
    global $smarty;
    $smarty->display('header.tpl');
    $smarty->display('menu.tpl');
    $smarty->display('admin.tpl');
    $delete_album = delete_album();
    $smarty->assign('delete_album',$delete_album);
    $album_info = admin_album();
    $smarty->assign('album_info', $album_info);
    $smarty->display('albumtable.tpl');
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

function album_uploud(){
    upload_album();
}

function contact_action(){
    global $smarty;

    $smarty->display('header.tpl');
    $smarty->display('menu.tpl');
    $smarty->display('contact.tpl');
    $smarty->display('toAdmin.tpl');
    $smarty->display('footer.tpl');
}