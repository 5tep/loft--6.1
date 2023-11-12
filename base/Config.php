<?php
    ini_set('display_errors', 1);
    ini_set('error_reporting', E_ALL);    
    session_start();
    
    define('VIEW_DIR', 'src/views');
          
    $host = '127.0.0.1';
    $db  = 'loftschool';
    $user = 'mysqladmin';
    $pass = 'cheeg9aiH7fu';
    $charset = 'utf8';

    const ADMINS = ['1'];
?>