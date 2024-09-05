jQuery(document).ready( function(){

    jQuery('#upload-excel-form').on('submit', function(e) {

        e.preventDefault();

        var file_data = jQuery('#excel-file').prop('files')[0];
        var id_curso  = jQuery('#id_curso').val();
        var asociar   = jQuery('#asociar').prop('checked');
        

        console.log(id_curso);

        var form_data = new FormData();                  
        form_data.append('excel_file', file_data);
        form_data.append('id_curso' , id_curso);
        form_data.append('asociar' , asociar);
        form_data.append('action', 'process_excel_upload'); 


        jQuery.ajax({
            url: wp_ajax_carga_masiva.ajax_url_carga_masiva_usuarios, // Esta variable está definida en WordPress y apunta al archivo admin-ajax.php
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.log(error);
            }
        });

    })

})