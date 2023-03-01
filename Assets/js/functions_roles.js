var tableRoles;

document.addEventListener('DOMContentLoaded', function(){

	tableRoles = $('#tableRoles').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/roles/getRoles",
            "dataSrc":""
        },
        "columns":[
            {"data":"COD_ROLES"},
            {"data":"ROL"},
            {"data":"DESCRIPCION"},
            {"data":"STATUS"},
            {"data":"ACCIONES"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

     //NUEVO ROL
     var formRol = document.querySelector("#formRol");
     formRol.onsubmit = function(e) {
         e.preventDefault();

        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intStatus = document.querySelector('#listStatus').value;        
        if(strNombre == '' || strDescripcion == '' || intStatus == '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/roles/setRol'; 
        var formData = new FormData(formRol);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){

        if (request.readyState == 9 && request.status == 200){
                 var objData = JSON.parse(request.responseText);
                 if(objData.status)
                 {
                     $('#modalFormRol').modal("hide");
                     formRol.reset();
                     swal("Roles de usuario", objData.msg ,"success");
                     tableRoles.api().ajax.reload(function(){
                    
                    });
                 }else{
                     swal("Error", objData.msg , "error");
                 }              
             } 
             /*divLoading.style.display = "none";
             return false;*/
         }
 
        }
});

$('#tableRoles').DataTable();

function openModal(){
    $('#modalFormRol').modal('show');
}