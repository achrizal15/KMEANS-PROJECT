<div id="sidebar-nav" class="sidebar">
   <nav>
      <ul class="nav" id="sidebar-nav-menu">
         <?php foreach (list_menu() as $key => $value) :  ?>
            <?php if ($value["submenu"] == false) :  ?>
               <?php if (show_menu($value["title"])) :  ?>
                  <li>
                     <a href="<?= base_url() ?>" class="<?= active_sidebar("") ?>">
                        <i class="fa fa-home" style="font-size: 25px;"></i>
                        <span class="title" style="font-weight: bold;">
                           <?= $value["title"]  ?>
                        </span>
                     </a>
                  </li>
               <?php endif;  ?>
            <?php else :  ?>
               <?php if (show_menu($value["title"])) :  ?>
                  <li class="panel">
                     <a href="#user" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="<?php foreach ($value["listsubmenu"] as $sub) {
                        echo active_sidebar($sub["link"]);
                     } ?>"><i class="fa-solid fa-user-headset"></i> <span class="title">User Setting</span> <i class="icon-submenu ti-angle-left"></i></a>
                     <div id="user" class="collapse">
                        <ul class="submenu">
                           <li><a href="<?= base_url("rolecontroller") ?>" class="">Manage Role</a></li>
                           <li><a href="<?= base_url("usercontroller") ?>" class="">Manage User</a></li>
                        </ul>
                     </div>
                  </li>
               <?php endif;  ?>
            <?php endif  ?>
         <?php endforeach;  ?>
      </ul>
   </nav>
</div>