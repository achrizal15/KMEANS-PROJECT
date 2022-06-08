<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
   <?php include("head_include.php")  ?>
</head>

<body>
   <!-- WRAPPER -->
   <div id="wrapper" style="background-image: url('<?= $this->uri->segment(2)=="login"? base_url('assets/images/bg-log.jpg'):''?>');">

      <?php if (isset($blank)) :  ?>
         <?php if ($blank == false) : ?>
            <?php include("navbar_include.php")  ?>
            <?php include("sidebar_include.php") ?>
         <?php endif;  ?>
      <?php else :  ?>
         <?php include("navbar_include.php")  ?>
         <?php include("sidebar_include.php") ?>
      <?php endif;  ?>