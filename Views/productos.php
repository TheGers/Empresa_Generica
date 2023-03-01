<?php 
    headerAdmin($data); 
    getModal('modalProductos',$data);
?>
    <main class="app-content">
      <div class="app-title">

         <!-- Validacion de acceso -->
       <div>
             <h1><i class="fa fa-folder-open-o"></i> <?= $data['page_title'] ?>
              
                <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fa fa-plus"></i> Nuevo</button>
              
            </h1>
        </div> 

       
        
        <!-- Views/Template/Modals/{$nameModal}.php" -->


        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/productos"><?= $data['page_title'] ?></a></li>
        </ul> 

        
      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableProductos">
                      <thead>
                        <tr>
                          <th>cod_producto</th>
                          <th>producto</th>
                          <th>precio</th>
                          <th>existencia</th>
                          <th>categoria</th>
                          <th>estado</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main>
<?php footerAdmin($data); ?>
    