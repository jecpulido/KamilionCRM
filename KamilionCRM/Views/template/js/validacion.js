$(document).ready(function () {
    document.getElementById('buscarCaso').addEventListener('click',buscarCasoMenu,false);
    document.getElementById('inb_Caso').addEventListener('keyup',validarCaso,false);
    document.getElementById('inb_Caso').addEventListener('blur',validarCaso,false);
    document.getElementById('inb_IdLlamada').addEventListener('keyup',validarIdLlamada,false);
    document.getElementById('inb_IdLlamada').addEventListener('blur',validarIdLlamada,false);
    //$("#inb_Caso").focus(validarCaso());

    function buscarCasoMenu() {
        var caso = $("#casoMenu").val();
        caso = caso.trim();
        if (caso==""){
            alert("Ingrese el id del caso");
        }else{
            var parametros = {"inb_Caso": caso};
            peticionMenu(parametros,caso);
        }
    }
    function validarCaso() {
        var inb_Caso = $("#inb_Caso").val();
        inb_Caso = inb_Caso.trim();
        var parametros = {"inb_Caso": inb_Caso};
        peticion(parametros,"#inb_Caso","#lbl_inb_Caso","#div_inb_Caso","CASO");
    }

    function validarIdLlamada() {
        var inb_IdLlamada = $("#inb_IdLlamada").val();
        inb_IdLlamada = inb_IdLlamada.trim();
        var parametros = {"inb_IdLlamada": inb_IdLlamada};
        peticion(parametros,"#inb_IdLlamada","#lbl_inb_IdLlamada","#div_inb_IdLlamada","ID AVAYA");
    }

    function peticion(parametros,herramienta,label,div,nombre) {
        $.post("http://localhost:8082/KamilionCRM/trunk/KamilionCRM/Models/validaciones.php",parametros).done(function (respuesta) {
            if (respuesta != ""){
                $(label).text(nombre +" (ESTE ID YA FUE REGISTRADO)");
                $(div).addClass("has-error");
                $(herramienta).focus();
            }else {
                $(label).text(nombre);
                $(div).removeClass("has-error");
            }

        });
    }
    function peticionMenu(parametros,caso) {
        $.post("http://localhost:8082/KamilionCRM/trunk/KamilionCRM/Models/validaciones.php",parametros).done(function (respuesta) {
            if (respuesta != ""){
                window.location=$("#url").text()+"inbound/gestionInbound/"+caso;
            }else {
                alert("Caso no existe");
            }

        });
    }

});
