//Sirve para el código de barra
//document.write(`<script src="${base_url}/Assets/js/plugins/JsBarcode.all.min.js"></script>`);
let tableProductos;
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});

//$('#tableProductos').DataTable();


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
    "bDestroy": "true",
    "iDisplayLength": 10,
    "order":[[0,"asc"]]  
});


window.addEventListener('load', function() {

    //if(document.querySelector("#formProductos")){

        var formProductos=document.querySelector("#formProductos");
        formProductos.onsubumit=function(e){
            e.preventDefault();
       
            var strproducto = document.querySelector('#txtproducto').value;
            var intprecio = document.querySelector('#txtPrecio').value;
            var intexistencia = document.querySelector('#txtexistencia').value;
            var strcategoria = document.querySelector('#txtcategoria').value;
            var intestado = document.querySelector('#listStatus').value;
            if (strproducto == '' || intprecio == '' || intexistencia == ''|| strcategoria == ''|| intestado == '' ) {
                swal("Atención", "Todos los campos son obligatorios.", "error");
                return false;
            }
       
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Productos/setProducto'; 
            var formData = new FormData(formProductos);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){

                    console.log(request.responseText);
                    
                }
                
            }
       
        }

    //}


   
    



},false);



 //NUEVO PRODUCTO



    





function openModal()
{
    rowTable = "";
   // document.querySelector('#idProducto').value ="";
    //document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    //document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    //document.querySelector('#btnText').innerHTML ="Guardar";
    //document.querySelector('#titleModal').innerHTML = "Nuevo Producto";
    //document.querySelector("#formProductos").reset();
    $('#modalFormProductos').modal('show');

}