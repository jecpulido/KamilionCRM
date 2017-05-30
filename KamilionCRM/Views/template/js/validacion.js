$(document).ready(function () {
    document.getElementById('buscarCaso').addEventListener('click',buscarCasoMenu,false);

    function buscarCasoMenu() {
        var caso = $("#casoMenu").val();
        caso = caso.trim();
        if (caso==""){
            alert("Ingrese el id del caso");
        }else{
            window.location=$("#url").text()+"inbound/gestionInbound/"+caso;
        }
    }
});
