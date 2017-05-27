$(document).ready(function () {
    $("#crm_marca").change(function () {
        $("#crm_marca option:selected").each(function () {
            el = $(this).val();
            $("#inb_NombreCliente").val($("#inb_NombreCliente").val() + el);
            //http://wiki.kumbiaphp.com/Listas_simples_enlazadas_jquery#Ejemplo
            //https://1024bytes.wordpress.com/2009/12/10/selects-dependientes-2/
            //http://web.tursos.com/como-hacer-un-formulario-de-contacto-ii-validar-con-jquery/
        });
    });
});