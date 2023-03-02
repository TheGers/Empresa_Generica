<!-- Modal -->
<div class="modal fade" id="modalFormProductos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


        <form id="formProductos" name="formProductos" class="form-horizontal">
          <input type="hidden" id="idProducto" name="idProducto" value="">
          <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>

          <div class="row">

            <!-- Nombre del producto y la categoría -->
            <div class="col-md-12">
              
              <div class="form-group">
                <label class="control-label">Nombre Producto <span class="required">*</span></label>
                <input class="form-control" id="txtproducto" name="txtproducto" type="text" required="">
              </div>
              <div class="form-group">
                <label class="control-label">Categoría <span class="required">*</span></label>
                <textarea class="form-control" id="txtcategoria" name="txtcategoria" type="text" required=""></textarea>
              </div>


              <!-- Precio y cantidad existente -->
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="control-label">Precio <span class="required">*</span></label>
                  <input class="form-control" id="txtPrecio" name="txtPrecio" type="text" required="">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">existencia <span class="required">*</span></label>
                  <input class="form-control" id="txtexistencia" name="txtexistencia" type="text" required="">
                </div>
              </div>

              <!-- Estado -->
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="listStatus">Estado <span class="required">*</span></label>
                  <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>
              </div>


              <!-- Botones -->
              <div class="row">
                <div class="form-group col-md-6">
                  <button id="btnActionForm" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                </div>
                <div class="form-group col-md-6">
                  <button class="btn btn-danger btn-lg btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                </div>
              </div>

            </div>

            <!-- <div class="col-md-4">
            </div> -->

          </div>
        </form>


      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<!-- 
<div class="modal fade" id="modalViewProducto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Codigo:</td>
              <td id="celCodigo"></td>
            </tr>
            <tr>
              <td>Nombre:</td>
              <td id="celNombre"></td>
            </tr>
            <tr>
              <td>Precio:</td>
              <td id="celPrecio"></td>
            </tr>
            <tr>
              <td>Categoría:</td>
              <td id="celCategoria"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celStatus"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

 -->