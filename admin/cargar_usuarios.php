<?php 

require(dirname(__FILE__) .'/../../../../wp-load.php');


if (isset($_FILES['excel_file']) && !empty($_FILES['excel_file']['tmp_name'])) {
    $file = $_FILES['excel_file']['tmp_name'];

    require 'librerias/vendor/autoload.php';

    $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($file);
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    $usuarios_ingresados = [];
    $usuarios_no_ingresados = [];
    $usuarios_error= [];

    // Procesar los datos del Excel
    foreach ($sheetData as $row) {
        
        $user = get_user_by('email', $row["B"]);

        if($user){

            array_push($usuarios_no_ingresados , $row["B"]);

        }else{

            $nombre = explode(" " , $row["A"]); 

            $user_data = array(
                'user_login'    => $row["B"],
                'user_pass'     => 'endo20248',
                'user_email'    => $row["B"],
                'first_name'    => $nombre[0],
                'last_name'     => $nombre[1],
                'role'          => 'subscriber'
            );

            $user_id = wp_insert_user( $user_data );

            if ( ! is_wp_error( $user_id ) ) {
                update_user_meta( $user_id, 'show_admin_bar_front', 'false' );
                array_push($usuarios_ingresados , $row["B"]);
            } else {
                array_push($usuarios_error , $row["B"]);
            }

        }

    }

    wp_send_json(array(
        'usuarios_ingresados' => $usuarios_ingresados,
        'usuarios_no_ingresados' => $usuarios_no_ingresados,
        'usuarios_error' => $usuarios_error
    ));

} else {
    wp_send_json_error('No se pudo cargar el archivo.');
}



?>