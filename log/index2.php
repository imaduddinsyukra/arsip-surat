<?php
include "../assets/conn/cek.php";
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="author"/>
<meta content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons" name="description"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="website"/>
<meta property="og:title"
      content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons"/>
<meta property="og:description"
      content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons"/>
<meta property="og:image"
      content="../../cdn.dribbble.com/users/180706/screenshots/5424805/the_sceens_-_mobile_perspective_mockup_3_-_by_tranmautritam.jpg"/>
<meta property="og:site_name" content="atlas "/>
<title>Admin Panel Maritim Dua Satu</title>
<link rel="icon" type="image/x-icon" href="assets/img/logo-maritim.png"/>
<link rel="icon" href="assets/img/logo-maritim.png" type="image/png" sizes="16x16">
<link rel='stylesheet' href='d33wubrfki0l68.cloudfront.net/css/478ccdc1892151837f9e7163badb055b8a1833a5/crisp/assets/vendor/pace/pace.css'/>
<script src='d33wubrfki0l68.cloudfront.net/js/3d1965f9e8e63c62b671967aafcad6603deec90c/js/pace.min.js'></script>
<!--vendors-->
<link rel='stylesheet' type='text/css' href='d33wubrfki0l68.cloudfront.net/bundles/291bbeead57f19651f311362abe809b67adc3fb5.css'/>

<link rel='stylesheet' href='d33wubrfki0l68.cloudfront.net/bundles/30bc673ce76f73ecf02568498f6b139269f6e4c7.css'/>
<link rel='stylesheet' href='d33wubrfki0l68.cloudfront.net/css/3ead3fd4a12b733f0424e7d671d674f086acfede/crisp/assets/vendor/trumbowyg/ui/trumbowyg.min.css'/>

<!-- <link rel='stylesheet' href="assets/radio/components.css"/>
<link rel='stylesheet' href="assets/radio/bootstrap.min.css"/> -->



<link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
<link rel='stylesheet' href='d33wubrfki0l68.cloudfront.net/css/801e074642722fcf371162db725cd8e7a3b61625/crisp/assets/fonts/jost/jost.css'/>
<!--Material Icons-->
<link rel='stylesheet' type='text/css' href='d33wubrfki0l68.cloudfront.net/css/25c25777222bf3d9fd0a0753e479d37892512062/crisp/assets/fonts/materialdesignicons/materialdesignicons.min.css'/>
<!--Bootstrap + atmos Admin CSS-->
<link rel='stylesheet' type='text/css' href='d33wubrfki0l68.cloudfront.net/css/79941e6facc95eb2453b88a21a943c4c552c1a70/neo/assets/css/atmos.min.css'/>
<!-- Additional library for page -->
    <link rel='stylesheet' href='d33wubrfki0l68.cloudfront.net/bundles/13fc3abb600e389b43865b1fa1697fc8f5ebf063.css'/>

    <!-- Additional library for page -->
    <link rel='stylesheet' href='d33wubrfki0l68.cloudfront.net/bundles/9a536f79ee6d7f5a50f3d5a7e5b11f4d7880c38f.css'/>
    
    <link rel="icon" type="image/x-icon" href="assets/img/logo-maritim.png"/>
<link rel="icon" href="assets/img/logo-maritim.png" type="image/png" sizes="16x16">
<link rel='stylesheet' href='../../d33wubrfki0l68.cloudfront.net/css/478ccdc1892151837f9e7163badb055b8a1833a5/crisp/assets/vendor/pace/pace.css'/>
<script src='d33wubrfki0l68.cloudfront.net/js/3d1965f9e8e63c62b671967aafcad6603deec90c/js/pace.min.js'></script>
<!--vendors-->
<link rel='stylesheet' type='text/css' href='d33wubrfki0l68.cloudfront.net/bundles/291bbeead57f19651f311362abe809b67adc3fb5.css'/>

<link rel='stylesheet' href='d33wubrfki0l68.cloudfront.net/bundles/30bc673ce76f73ecf02568498f6b139269f6e4c7.css'/><!-- Additional library for page -->
    <link rel='stylesheet' href='d33wubrfki0l68.cloudfront.net/bundles/9a536f79ee6d7f5a50f3d5a7e5b11f4d7880c38f.css'/>
    
<!-- CKEDITOR -->
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/ckeditor/style.css">
    <!-- END CKEDITOR -->

<!-- DROPIFY -->
  <link rel="stylesheet" href="assets/dropify/dist/css/demo.css">
  <link rel="stylesheet" href="assets/dropify/dist/css/dropify.min.css">
 
<!-- END DROPIFY -->

<!--MAX FILE SIZE STYLE-->
<style>
.strokeme
{
    color: white;
    text-shadow:
    -1px -1px 0 #FF0000,
    1px -1px 0 #FF0000,
    -1px 1px 0 #FF0000,
    1px 1px 0 #FF0000;
    
}
</style>
<!-- END MAX FILE SIZE STYLE-->


</head>
<body class="sidebar-pinned">
<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        <img class="admin-brand-logo" src="assets/img/logo-maritim.png" width="40" alt="atmos Logo">
        <span class="admin-brand-content font-secondary"><a href='index2.php' style="color: #3ecf8e;">  Maritim </a>21</span>
        <!-- end sidebar branding-->
        <div class="ml-auto">
            <!-- sidebar pin-->
            <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
            <!-- sidebar close for mobile device-->
            <a href="#" class="admin-close-sidebar"></a>
        </div>
    </div>
    <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">
            <li class="menu-item">
                <a href='index2.php' class=' menu-link'>
                        <span class="menu-label">
                                                <span class="menu-name">Home
                                                </span>

                                            </span>
                    <span class="menu-icon">
                                               
                                                 <i class="icon-placeholder mdi mdi-home-outline"></i>
                                            </span>
                </a>

            </li>
            
            <li class="menu-item">
                <a href='index2.php?part=kelola-registrasi' class=' menu-link'>
                        <span class="menu-label">
                                                <span class="menu-name">Kelola Registrasi
                                                </span>

                                            </span>
                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-format-list-bulleted "></i>
                                            </span>
                </a>

            </li>
            
            <li class="menu-item ">
                <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                                                 <span class="menu-name">Kelola Website
                                                    <span class="menu-arrow"></span>
                                                </span>
                                            </span>
                    <span class="menu-icon">
                                                <i class="icon-placeholder mdi mdi-web"></i>
                                            </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu">
                    <li class="menu-item">
                        <a href="index2.php?part=page-home" class=" menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">Home Page</span>
                                            </span>
                            <span class="menu-icon">
                                                <i class="icon-placeholder mdi mdi-link-variant ">
                                                </i>
                                            </span>
                        </a>

                    </li>

                    <li class="menu-item">
                        <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                                                 <span class="menu-name">About
                                                    <span class="menu-arrow"></span>
                                                </span>
                                            </span>
                            <span class="menu-icon">
                                                <i class="icon-placeholder mdi mdi-link-variant "></i>
                                            </span>
                        </a>
                        <!--submenu-->
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="index2.php?part=page-about-history" class=" menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">History </span>
                                            </span>
                                    <span class="menu-icon">
                                                <i class="icon-placeholder mdi mdi-brightness-1 ">
                                                </i>
                                            </span>
                                </a>
                            </li>
                            
                            <li class="menu-item">
                                <a href="index2.php?part=page-about-gallery" class=" menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">Gallery </span>
                                            </span>
                                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-brightness-1 ">
                                                </i>
                                            </span>
                                </a>
                            </li>
                            
                            <li class="menu-item">
                                <a href="index2.php?part=page-about-vision" class=" menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">Vision </span>
                                            </span>
                                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-brightness-1 ">
                                                </i>
                                            </span>
                                </a>
                            </li>
                            
                            <li class="menu-item">
                                <a href="index2.php?part=page-about-mission" class=" menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">Mission </span>
                                            </span>
                                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-brightness-1 ">
                                                </i>
                                            </span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    
                     <li class="menu-item">
                        <a href="#" class="open-dropdown menu-link">
                        <span class="menu-label">
                                                 <span class="menu-name">Services
                                                    <span class="menu-arrow"></span>
                                                </span>
                                            </span>
                            <span class="menu-icon">
                                                <i class="icon-placeholder mdi mdi-link-variant "></i>
                                            </span>
                        </a>
                        <!--submenu-->
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="index2.php?part=page-services" class=" menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">Our Services </span>
                                            </span>
                                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-brightness-1 ">
                                                </i>
                                            </span>
                                </a>
                            </li>
                            
                            <li class="menu-item">
                                <a href="index2.php?part=page-services-why" class=" menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">Why Choose Us </span>
                                            </span>
                                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-brightness-1 ">
                                                </i>
                                            </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="menu-item">
                        <a href="index2.php?part=page-terms" class=" menu-link">
                                            <span class="menu-label">
                                                <span class="menu-name">Terms and Condition</span>
                                            </span>
                            <span class="menu-icon">
                                                <i class="icon-placeholder mdi mdi-link-variant ">
                                                </i>
                                            </span>
                        </a>

                    </li>
                    
                   
                </ul>
            </li>
            

            <li class="menu-item">
                <a href='index2.php?part=kelola-berita' class=' menu-link'>
                        <span class="menu-label">
                                                <span class="menu-name">Kelola Berita
                                                </span>

                                            </span>
                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-newspaper "></i>
                                            </span>
                </a>

            </li>
            
            <li class="menu-item">
                <a href='http://maritimduasatu.com/webmail' class=' menu-link' target="blank">
                        <span class="menu-label">
                                                <span class="menu-name"> Email
                                                </span>

                                            </span>
                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-email "></i>
                                            </span>
                </a>

            </li>
            
            <li class="menu-item">
                <a href='index2.php?part=kelola-saran' class=' menu-link'>
                        <span class="menu-label">
                                                <span class="menu-name">Kritik Saran
                                                </span>

                                            </span>
                    <span class="menu-icon">
                                                 <i class="icon-placeholder mdi mdi-wechat "></i>
                                            </span>
                </a>

            </li>
             
                

                </ul>
            </li>
        </ul>

    </div>

</aside>
<main class="admin-main">
    <!--site header begins-->
<header class="admin-header">

    <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>

    <nav class=" mr-auto my-auto">
        <ul class="nav align-items-center">

           
        </ul>
    </nav>
    <nav class=" ml-auto">
        <ul class="nav align-items-center">
           <!--  <li class="nav-item">
                <a href="#" class="btn btn-dark" data-toggle="modal"
                   data-target="#demoModal">Switch Demo</a>
            </li> -->
           
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#"   role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                 
                        <img src="assets/img/user-icon.png" class="rounded-circle"/>

                    </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right"   >
                    <a class="dropdown-item" href="index2.php?part=profil">  Profil
                    </a>
                    <a class="dropdown-item" href="../assets/conn/logout.php"> Logout</a>
                </div>
            </li>

        </ul>

    </nav>
</header>


 <?php 
 include "content.php";
 ?>

</main>



<script src='d33wubrfki0l68.cloudfront.net/bundles/9556cd6744b0b19628598270bd385082cda6a269.js'></script>
<!--page specific scripts for demo-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-66116118-3"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-66116118-3'); </script>
<script src='d33wubrfki0l68.cloudfront.net/bundles/ba78fede76f682cd388ed2abbfd1e1568e76f8a4.js'></script>
<script src='d33wubrfki0l68.cloudfront.net/js/d2615b2cee9677b0a037aa64fdcf79f8a72312ac/crisp/assets/js/modal-data.js'></script>
<script src='d33wubrfki0l68.cloudfront.net/bundles/a5c528ebd70097577937a146c587ed9dda0f7f70.js'></script>
<script src='d33wubrfki0l68.cloudfront.net/js/c36248babf70a3c7ad1dcd98d4250fa60842eea9/crisp/assets/vendor/apexchart/apexcharts.min.js'></script>

<script type='text/javascript' src='d33wubrfki0l68.cloudfront.net/js/1c49d879bf7bcb5124e82961b59ee46a55bd435e/neo/assets/js/dashboard-01.js'></script>

<!--for note widget-->
<script src="assets/vendor/trumbowyg/trumbowyg.min.js"></script>
<script    src="assets/js/widget-data.js"></script>
 
 <!-- DROPIFY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="assets/dropify/dist/js/dropify.min.js"></script>
        <script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>

</body>


</html>