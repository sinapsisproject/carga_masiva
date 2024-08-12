<?php
/* Smarty version 4.4.1, created on 2024-08-12 04:45:16
  from 'C:\wamp64\www\sinapsis\wp-content\plugins\carga_masiva\admin\partials\carga_masiva.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_66b9935c4f3214_84958753',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8638fd7db4aaf14796cbe07b45202cba414738de' => 
    array (
      0 => 'C:\\wamp64\\www\\sinapsis\\wp-content\\plugins\\carga_masiva\\admin\\partials\\carga_masiva.tpl',
      1 => 1723437847,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66b9935c4f3214_84958753 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3>Carga de usuarios</h3>

<div class="col-12">
    
<form id="upload-excel-form" enctype="multipart/form-data">
    <input type="file" id="excel-file" name="excel_file" accept=".xls,.xlsx,.csv" />
    <button type="submit">Cargar Excel</button>
</form>

</div><?php }
}
