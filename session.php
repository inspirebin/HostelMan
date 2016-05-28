<?php
function checkSession(){
    session_start();
    ini_set('display_errors', 1);
    if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])) {
        header('Location:student_login.html');
    }else{
        return 1;
    }
}


function checkFacultySession(){
    session_start();
    ini_set('display_errors', 1);
    if(!isset($_SESSION['faculty_id']) && empty($_SESSION['faculty_id'])) {
        header('Location:faculty_login.html');
    }else{
        return 1;
    }
}


function checkWardenSession(){
    session_start();
    ini_set('display_errors', 1);
    if(!isset($_SESSION['warden_id']) && empty($_SESSION['warden_id'])) {
        header('Location:warden_login.html');
    }else{
        return 1;
    }
}
?>