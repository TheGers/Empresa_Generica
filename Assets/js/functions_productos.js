//Sirve para el código de barra
document.write(`<script src="${base_url}/Assets/js/plugins/JsBarcode.all.min.js"></script>`);
let tableProductos;

//NO SE TT
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});

//MUESTRA LA TABLA DE DATOS
tableProductos = $('#tableProductos').dataTable( {
    "aProcessing":true,
    "aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "ajax":{
        "url": " "+base_url+"/Productos/getProductos",
        "dataSrc":""
    },
    "columns":[
        {"data":"cod_producto"},
        {"data":"producto"},
        {"data":"precio"},
        {"data":"existencia"},
        {"data":"categoria"},
        {"data":"estado"},
        {"data":"options"}
    ],
    "columnDefs": [
        { 'className': "textright", "targets": [ 2 ] },
        { 'className': "textright", "targets": [ 3 ] },
        { 'className': "textcenter", "targets": [ 5 ] },
        { 'className': "textcenter", "targets": [ 6 ] }
      ], 
    'dom': 'lBfrtip',
    'buttons': [
        {
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr":"Copiar",
            "className": "btn btn-secondary",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }

        },{
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr":"Esportar a Excel",
            "className": "btn btn-success",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr":"Esportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        },{
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr":"Esportar a CSV",
            "className": "btn btn-info",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        }
    ],
    "resonsieve":"true",
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"asc"]]  
});




window.addEventListener('load', function() {

   
    //guardar no funciona :(
    if(document.querySelector("#formProductos")){
        let formProductos=document.querySelector("#formProductos");
        formProductos.onsubumit=function(e){
            e.preventDefault
            let intcod_producto=document.querySelector('#idProducto').value;
            let strproducto = document.querySelector('#txtproducto').value;
            let intprecio = document.querySelector('#txtPrecio').value;
            let intexistencia = document.querySelector('#txtexistencia').value;
            let strcategoria = document.querySelector('#txtcategoria').value;
            let intestado = document.querySelector('#listStatus').value;
            if (strproducto == '' || intprecio == '' || intexistencia == ''||strcategoria == ''||  intestado == '' ) {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }
            divLoading.style.display="flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ? 
                        new XMLHttpRequest() : 
                        new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Productos/setProducto'; 
            let formData = new FormData(formProductos);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange=function(){
                if(request.readyState==4 && request.status==200){
                    let objData = JSON.parse(request.responseText);

                    if(objData.estado){//estado de la base
                        //let objProducto=objData.data;

                        swal("", objData.msg ,"success");
                        tableProductos.api().ajax.reload();
                         document.querySelector("#idProducto").value = objData.cod_producto;
                        

                    }else{
                        swal("Error", objData.msg ,"error")
                    }
                }
                divLoading.style.display="none";
                return false;
            }



        }

    }


   
    



},false);





//VER UN PRODUCTO
function fntViewInfo(cod_producto){

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Productos/getProducto/'+cod_producto;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.estado)//estado de la base
            {
                let objProducto=objData.data;
                let estadoProducto = objProducto.estado == 1 ? 
                '<span class="badge badge-success">Disponible</span>' : 
                '<span class="badge badge-danger">Agotado</span>';
                document.querySelector("#celId").innerHTML = objProducto.cod_producto;
                document.querySelector("#celProducto").innerHTML = objProducto.producto;
                document.querySelector("#celPrecio").innerHTML = objProducto.precio;
                document.querySelector("#celExistncia").innerHTML = objProducto.existencia;
                document.querySelector("#celCategoria").innerHTML = objProducto.categoria;
                document.querySelector("#celStatus").innerHTML = estadoProducto;
                $('#modalViewProducto').modal('show');
            }
            else{
                swal("Error", objData.msg , "error");
            }
        }

    }
    

}

    




//INICIAR EN FORMULARIO DE LOS DATOS
function openModal()
{
    rowTable = "";
    document.querySelector('#idProducto').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Producto";
    document.querySelector("#formProductos").reset();
    $('#modalFormProductos').modal('show');

}