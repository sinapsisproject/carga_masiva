<?php
/* Smarty version 4.4.1, created on 2024-08-15 03:19:43
  from 'C:\wamp64\www\sinapsis\wp-content\plugins\carga_masiva\admin\partials\carga_masiva.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_66bd73cfb1bf67_12160090',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8638fd7db4aaf14796cbe07b45202cba414738de' => 
    array (
      0 => 'C:\\wamp64\\www\\sinapsis\\wp-content\\plugins\\carga_masiva\\admin\\partials\\carga_masiva.tpl',
      1 => 1723691902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66bd73cfb1bf67_12160090 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3>Carga de usuarios</h3>

<div class="col-12">
    
<form id="upload-excel-form" enctype="multipart/form-data">
    <p>Archivo</p>
    <input type="file" id="excel-file" name="excel_file" accept=".xls,.xlsx,.csv" />
    <p>id curso</p>
    <input id="id_curso" type="text">
    <br><br>
    <button type="submit">Cargar Excel</button>
</form>


<div class="row">
    <div class="col-3">
        <p>Nombre CELDA[A]</p>
    </div>
    <div class="col-3">
        <p>Apellido CELDA[B]</p>
    </div>
    <div class="col-3">
        <p>Correo CELDA[C]</p>
    </div>
    <div class="col-3">
        <p>Clave CELDA[D]</p>
    </div>
</div>


</div><?php }
}
