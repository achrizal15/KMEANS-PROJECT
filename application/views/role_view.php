<div class="main">

   <!-- MAIN CONTENT -->
   <div class="main-content">

      <div class="content-heading">
         <div class="heading-left">
            <h1 class="page-title">Selamat datang <?= $this->session->userdata("nama")  ?></h1>
         </div>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
               <li class="breadcrumb-item active"><a href="#">Distributor</a></li>
               <!-- <li class="breadcrumb-item active">Current</li> -->
            </ol>
         </nav>
      </div>

      <div class="container-fluid">
         <!-- TOP METRICS -->
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Daftar Distributor</h3>
                  </div>
                  <div class="card-body">
                     <?php echo $this->session->flashdata("message") ? custom_alert_messages("", $this->session->flashdata("message")) : "" ?>
                     <div style="overflow-x: auto;">
                     <a href="<?=base_url("rolecontroller/action/add")?>" class="btn btn-primary mb-3">TAMBAH</a>
                        <table class="table table-bordered" id="role-table">
                           <thead>
                              <tr>
                                 <th>NAMA</th>
                                 <?php foreach(list_menu()as $menu) : ?>
                                    <th><?= strtoupper($menu["nama"])  ?></th>
                                 <?php endforeach;  ?>
                                 <th>CREATED AT</th>
                                 <th >ACTION</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($role as $v) : ?>
                                 <tr>
                                    <td><?= ucwords($v->nama)  ?></td>
                                    <?php foreach(list_menu()as $menu) : ?>
                                    <td>
                                       <?= $this->ram->get_roles_akses($v->id, $menu["content"]) ? "YES" : "NO" ?></td>
                                    <?php endforeach  ?>
                                    <td class="align-middle"><?= date("d-m-Y", strtotime($v->created_at))  ?></td>
                                    <td class="align-middle" width="130px">
                                      
                                       <a href="<?= base_url("rolecontroller/action/edit/" . $v->id) ?>" class="btn btn-warning text-white" title="Edit"><i class="fas fa-edit"></i><span class="sr-only">EDIT</span></a>                                   
                                       <a id="delete-role" data-id="<?= $v->id ?>" class="btn btn-danger text-white" title="Delete"><i class="fa fa-trash-o"></i> <span class="sr-only">Delete</span></a>    
                                    </td>
                                 </tr>
                              <?php endforeach;  ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- END TOP METRICS -->


         <!-- END PERFORMANCE INDEX -->
      </div>
   </div>
   <!-- END MAIN CONTENT -->

</div>