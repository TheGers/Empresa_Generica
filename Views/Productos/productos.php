<?php
headerAdmin($data);
getModal('modalProductos', $data);
?>
    <main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?= $data['page_title'] ?> 
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Nuevo</button> </h1>
        </div>
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
                      <th>ID</th>
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