<?php 
headerAdmin($data);

?>
   <main class="app-content">
      <div class="app-title">
      <div>
          <h1><i class="icon fa fa-area-chart"></i> <?= $data['page_title'] ?> 
      </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/reporteventas"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>

      <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableReporteVentas"> <!-- el id que llevara en la dataTable de la functions_productos.js -->
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>ID Venta</th>
                          <th>ID Producto</th>
                          <th>Subtotal</th>
                          <th>Impuesto</th>
                          <th>Total</th>
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