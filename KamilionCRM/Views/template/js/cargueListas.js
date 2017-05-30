$(document).ready(function () {

    window.addEventListener('load',function () {
        if ($("#crm_Equipo").val() == null) {
            llenar("#crm_Equipo");
        }
        if ($("#inb_Ciudad").val() == null) {
            llenar("#inb_Ciudad");
        }
        if ($("#crm_Servicio").val() == null) {
            llenar("#crm_Servicio");
        }
        if ($("#crm_Solicitud").val() == null) {
            llenar("#crm_Solicitud");
        }
        if ($("#crm_Segmento").val() == null) {
            llenar("#crm_Segmento");
        }
        if ($("#crm_CausaRaiz").val() == null) {
            llenar("#crm_CausaRaiz");
        }
        if ($("#crm_Tipificacion").val() == null) {
            llenar("#crm_Tipificacion");
        }
        if ($("#crm_CategoriaCierre").val() == null) {
            llenar("#crm_CategoriaCierre");
        }
    });

    $("#crm_marca").change(function () {
        $("#crm_marca option:selected").each(function () {
            var parametros = {"eq_marca": $(this).val()};
             peticion(parametros,"#crm_Equipo");
        });
    });
    $("#inb_dpto").change(function () {
        $("#inb_dpto option:selected").each(function () {
            var parametros = {"divp_IdDepartamento": $(this).val()};
            peticion(parametros,"#inb_Ciudad");
        });
    });
    $("#crm_LServicio").change(function () {
        $("#crm_LServicio option:selected").each(function () {
            var parametros = {"diag_Tipificacion1": $(this).val()};
            peticion(parametros,"#crm_Servicio");
        });
    });
    $("#crm_Servicio").change(function () {
        $("#crm_Servicio option:selected").each(function () {
            var parametros = {"diag_Cod_diagnostico": $(this).val(),"diag_Tipificacion2":$(this).text()};
            peticion(parametros,"#crm_Solicitud");
        });
    });
    $("#crm_Solicitud").change(function () {
        $("#crm_Solicitud option:selected").each(function () {
            var parametros = {"diag_Cod_diagnostico": $(this).val(),"diag_Tipificacion1":$(this).text(),"Segmento":"Segmento"};
            peticion(parametros,"#crm_Segmento");
        });
    });
    $("#crm_Segmento").change(function () {
        $("#crm_Segmento option:selected").each(function () {
            var parametros = {"diag_Tipificacion1": $(this).val(),"diag_Cod_diagnostico":$("#crm_Solicitud option:selected").val(),"Causa_Raiz":"Causa_Raiz"};
            peticion(parametros,"#crm_CausaRaiz");
        });
    });
    $("#crm_CausaRaiz").change(function () {
        $("#crm_CausaRaiz option:selected").each(function () {
            var parametros = {"diag_Cod_diagnostico": $(this).val(),"crm_Tipificacion":"crm_Tipificacion"};
            peticion(parametros,"#crm_Tipificacion");
        });
    });
    $("#crm_Tipificacion").change(function () {
        $("#crm_Tipificacion option:selected").each(function () {
            var cam = $(this).val().split("/");
            var parametros = {"diag_Cod_diagnostico": cam[0],"crm_CategoriaCierre":"crm_CategoriaCierre"};
            peticion(parametros,"#crm_CategoriaCierre");
        });
    });


    function peticion(parametros,herramienta) {
        $.post("http://localhost:8082/KamilionCRM/trunk/KamilionCRM/Models/listas.php",parametros).done(function (respuesta) {
            $(herramienta).html(respuesta);
            if ($(herramienta).val() == null) {
                llenar(herramienta);
            }
        });
    }
    function peticion(parametros,herramienta) {
        $.post("http://localhost:8082/KamilionCRM/trunk/KamilionCRM/Models/listas.php",parametros).done(function (respuesta) {
            $(herramienta).html(respuesta);
            if ($(herramienta).val() == null) {
                llenar(herramienta);
            }
        });
    }

    function llenar(herramienta) {
        var option=document.createElement("option");
        option.value="- Seleccione -"
        option.text="- Seleccione -";
        $(herramienta).append(option);
        option = null;
    }

    function seleecionar(herramienta){
        if ($(herramienta).size() == 2){
            $(herramienta).selectedIndex = 2;
        }

    }
});
