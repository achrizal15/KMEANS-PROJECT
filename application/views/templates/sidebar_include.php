<div id="sidebar-nav" class="sidebar">
   <nav>
      <ul class="nav" id="sidebar-nav-menu">
         <li class="menu-group">Main</li>
         <?php if (show_menu("home")) :  ?>
            <li><a href="<?= base_url() ?>" class="<?= active_sidebar("") ?>"><i class="fa fa-home"></i> <span class="title">Home</span></a></li>
         <?php endif;  ?>
         <?php if (show_menu("user")) :  ?>
            <li class="panel">
               <a href="#user" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="<?= active_sidebar("usercontroller") ?>"><i class="ti-user"></i> <span class="title">User Setting</span> <i class="icon-submenu ti-angle-left"></i></a>
               <div id="user" class="collapse">
                  <ul class="submenu">
                     <li><a href="<?= base_url("rolecontroller") ?>" class="">Manage Role</a></li>
                     <li><a href="<?= base_url("usercontroller") ?>" class="">Manage User</a></li>
                  </ul>
               </div>
            </li>
         <?php endif;  ?>
      </ul>
   </nav>
</div>