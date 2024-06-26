<?php
session_start();
// print_r($_SERVER);

$CompanyName = "Architecture";
$user_full_name = "Sandip Kundu";
$URL = "/SupportPanel/";

echo '<input type="hidden" id="pathurl" name="pathurl" value="'. $URL .'" >';


$path = '/SupportPanel';
$main_path = explode('?', isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '')[0];
// print_r($main_path
$fol_name = '/';
if(explode('/',$main_path)[2] != 'dashboard') $fol_name = '/clients/';
$file_name = explode($path, $main_path)[1];
include_once './universal/_functions.php';
$title = explode('/',$file_name)[1] == ''?'Home':explode('/',$file_name)[1];

// print_r($file_name);
if($file_name == '/' || $file_name == '/home'){
    include_once './universal/clients/header.php';
    include_once './app_pages/index.php';
    include_once './universal/clients/footer.php';
}
else if($file_name == '/dashboard' || $file_name == '/dashboard/')
  if(!isset($_SESSION['is_authentic']) || $_SESSION['is_authentic'] == 0)
    include_once './app_pages/signin.php';
  else {
    include_once './universal/header.php';
    include_once './app_pages/dashboard/dashboard.php';
    include_once './universal/footer.php';
  }
else if(file_exists('./app_pages/'.$file_name.'.php'))
  if(!isset($_SESSION['is_authentic']) || $_SESSION['is_authentic'] == 0)
    include_once './app_pages/signin.php';
  else {
    include_once "./universal".$fol_name."header.php";
    include_once './app_pages/'.$file_name.'.php';
    include_once "./universal".$fol_name."footer.php";
  }
else
  include_once './app_pages/page404.php';


?>