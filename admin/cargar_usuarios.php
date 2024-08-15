<?php 

require(dirname(__FILE__) .'/../../../../wp-load.php');


if (isset($_FILES['excel_file']) && !empty($_FILES['excel_file']['tmp_name'])) {
    $file = $_FILES['excel_file']['tmp_name'];

    require 'librerias/vendor/autoload.php';

    $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($file);
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    $usuarios_ingresados = [];
    $data = [];

    // Procesar los datos del Excel
    foreach ($sheetData as $row) {
        
        if (array_filter($row) === []) {
            break; // Salir del bucle si toda la fila es null
        }

        $usuarios_ingresados["user"] = $row["C"];

        $user = get_user_by('email', $row["C"]);

        if($user){
            $usuarios_ingresados["wp"] = "Existe";
            $usuarios_ingresados["bd"] = "No sabemos";

        }else{

            $user_data = array(
                'user_login'    => $row["C"], //email
                'user_pass'     => $row["D"], // password
                'user_email'    => $row["C"], //email
                'first_name'    => $row["A"], //nombre
                'last_name'     => $row["B"], //apellido
                'role'          => 'subscriber'
            );

            $user_id = wp_insert_user( $user_data );

            if ( ! is_wp_error( $user_id ) ) {
                update_user_meta( $user_id, 'show_admin_bar_front', 'false' );

                $usuarios_ingresados["wp"] = "Ingresado";
            

                $body = [
                    "primer_nombre" => $row["A"],
                    "apellido"      => $row["B"],
                    "username"      => $row["C"],
                    "email"         => $row["C"],
                    "password"      => $row["D"],
                ];

                $response = RfCoreCurl::curl('/api/users/register_user_masive' , 'POST' , NULL , $body);

                if($response->status == "true"){
                    $usuarios_ingresados["bd"] = "Ingresado";
                }else if($response->status == "false"){
                    $usuarios_ingresados["bd"] = "Existe";
                }

                
            } else {
                $usuarios_ingresados["wp"] = "Error al ingresar";
                $usuarios_ingresados["bd"] = "No sabemos";
            }

        }

        array_push($data , $usuarios_ingresados);


    }

    wp_send_json(array(
        "response" => $data
    ));

} else {
    wp_send_json_error('No se pudo cargar el archivo.');
}



?>