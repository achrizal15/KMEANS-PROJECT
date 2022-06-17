<div id="sidebar-nav" class="sidebar">
   <nav>
      <ul class="nav" id="sidebar-nav-menu">
         <?php
         $group = [];
         foreach (list_menu() as $key => $value) :  ?>
            <?php if ($value["group"] == null) :  ?>
               <?php if (show_menu($value["content"])) :  ?>
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
               if (show_menu($value["content"])) :  ?>
                  <?php
                  $grouplink = "";
                  foreach (list_menu() as $sub) {
                     if ($sub["group"] == $value["group"]) {
                        $grouplink .= active_sidebar($sub["link"]);
                     }
                  }  ?>
                  <li class="panel">
                     <a href="#<?= $value["content"] ?>" style="font-weight: bold;" data-toggle="collapse" data-parent="#sidebar-nav-menu" class="<?= $grouplink ?>">
                        <i class="<?= $value['icon'] ?>" style="font-size: 18px;"></i> <span class="title"><?= $value["group"]  ?></span> <i class="icon-submenu ti-angle-left"></i></a>
                     <div id="<?= $value["content"] ?>" class="<?= $grouplink == "active" ? "" : "collapse" ?>">
                        <ul class="submenu">
                           <?php foreach (list_menu() as $sub) :  ?>
                              <?php
                              if (show_menu($sub["content"]) != "has") {
                                 continue;
                              }
                              if ($sub["group"] == $value["group"]) :  ?>
                                 <li> <a href="<?= base_url($sub["link"]) ?>" class="<?= active_sidebar($sub["link"]) ?>"><?= $sub["nama"]  ?></a></li>
                              <?php endif ?>
                           <?php endforeach  ?>
                        </ul>
                     </div>
                  </li>
               <?php $group[] = $value["group"];
               endif;
               ?>
            <?php endif  ?>
         <?php endforeach;  ?>
         <!-- siswa -->
         <?php if ($this->session->userdata("role") == 'siswa') :  ?>
            <li>
               <a href="<?= base_url('/') ?>" class="<?= active_sidebar('/') ?>">
                  <i class="fa-solid fa-gauge" style="font-size: 18px;"></i>
                  <span class="nama" style="font-weight: bold;">
                     Dashboard
                  </span>
               </a>
            </li>
            <!-- <li>
               <a href="<?= base_url('/') ?>" class="<?= active_sidebar('/') ?>">
                  <i class="fa-solid fa-list-check" style="font-size: 18px;"></i>
                  <span class="nama" style="font-weight: bold;">
                     Tugas
                  </span>
               </a>
            </li> -->
            <li>
               <a href="<?= base_url('siswacontroller/action/edit') ?>" class="<?= active_sidebar('/') ?>">
                  <i class="fa-solid fa-id-badge" style="font-size: 18px;"></i>
                  <span class="nama" style="font-weight: bold;">
                     Profil
                  </span>
               </a>
            </li>
            <li>
               <a href="<?= base_url('/authcontroller/logout') ?>" class="<?= active_sidebar('/') ?>">
                  <i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 18px;"></i>
                  <span class="nama" style="font-weight: bold;">
                     Logout
                  </span>
               </a>
            </li>
         <?php endif  ?>
      </ul>
   </nav>
</div>