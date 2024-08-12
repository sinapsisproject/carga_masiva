<?php

/*
    Plugin Name: [Sinapsis] Carga Masiva de usuarios
    Plugin URI: https://sinapsis.com
    Description: Plugin para gestion de carga masiva de usuarios a través de archivos 
    Version: 1.0
    Author: Diego Baeza
    Author URI: https://sisnapsis.com
    License: GPL2
*/


add_action('admin_menu', 'mi_menu_personalizado');

function mi_menu_personalizado() {
    add_menu_page(
        'carga-masiva',          // Título de la página
        'Carga masiva usuarios',                  // Texto del menú
        'manage_options',            // Capacidad requerida para ver el menú
        'carga-masiva-slug',              // Slug del menú
        'carga_masiva_funtion',           // Función que muestra el contenido de la página
        'dashicons-admin-generic',   // Icono del menú (puedes usar dashicons o la URL de una imagen)
        40                      // Posición en el menú (opcional)
    );
}


function carga_masiva_funtion(){

    wp_enqueue_script(
        'carga-masiva-js',
        plugins_url( '/admin/js/carga_masiva.js', __FILE__ ), 
        array('jquery'),
        rand(0, 99),
        true
    );
    wp_enqueue_style(
        'carga-masiva-css',
        plugins_url( '/admin/css/carga_masiva.css', __FILE__ ),
        array(),
        rand(0, 99)
    );

    wp_localize_script(
        'carga-masiva-js',
        'wp_ajax_carga_masiva',
        array(
            'ajax_url_carga_masiva_usuarios' => plugins_url( '/admin/cargar_usuarios.php' , __FILE__ )
        )
    );

    echo carga_masiva_template();
}


function carga_masiva_template() {
   
    $smarty = new Smarty;
    $smarty->setTemplateDir(dirname(__FILE__) . '/admin/partials/');
    $smarty->setCompileDir(dirname(__FILE__) .'/admin/compile/');

    return $smarty->fetch('carga_masiva.tpl');

}

?>