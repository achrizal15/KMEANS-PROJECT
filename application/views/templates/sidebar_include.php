<div id="sidebar-nav" class="sidebar">
   <nav>
      <ul class="nav" id="sidebar-nav-menu">
         <?php
         $group = [];
         foreach (list_menu() as $key => $value) :  ?>
            <?php if ($value["group"] == null) :  ?>
               <?php if (show_menu($value["nama"])) :  ?>
                  <li>
                     <a href="<?= base_url($value["link"]) ?>" class="<?= active_sidebar($value["link"]) ?>">
                        <i class="<?= $value['icon'] ?>" style="font-size: 18px;"></i>
                        <span class="nama" style="font-weight: bold;">
                           <?= $value["nama"]  ?>
                        </span>
                     </a>
                  </li>
               <?php endif;  ?>
            <?php else :  ?>
               <?php
               if (in_array($value['group'], $group)) {
                  continue;
               }
               if (show_menu($value["nama"])) :  ?>
                  <?php
                  $grouplink = "";
                  foreach (list_menu() as $sub) {
                     if ($sub["group"] == $value["group"]) {
                        $grouplink .= active_sidebar($sub["link"]);
                     }
                  }  ?>
                  <li class="panel">
                     <a href="#<?= $value["nama"] ?>" style="font-weight: bold;" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="<?= $grouplink ?>">
                        <i class="<?= $value['icon'] ?>" style="font-size: 18px;"></i> <span class="title"><?= $value["group"]  ?></span> <i class="icon-submenu ti-angle-left"></i></a>
                     <div id="<?= $value["nama"] ?>" class="<?= $grouplink == "active" ? "" : "collapse" ?>">
                        <ul class="submenu">
                           <?php foreach (list_menu() as $sub) :  ?>
                              <?php
                              if (show_menu($sub["nama"]) != "has") {
                                 continue;
                              }
                              if ($sub["group"] == $value["group"]) :  ?>
                                 <li> <a href="<?= base_url($sub["link"]) ?>" class="<?= active_sidebar($sub["link"]) ?>"><?= $sub["nama"]  ?></a></li>
                              <?php endif ?>
                           <?php endforeach  ?>
                        </ul>
                     </div>
                  </li>
               <?php endif;
               $group[] = $value["group"];
               ?>
            <?php endif  ?>
         <?php endforeach;  ?>
      </ul>
   </nav>
</div>