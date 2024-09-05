
<h3>Carga de usuarios</h3>

<div class="col-12">
    
<form id="upload-excel-form" enctype="multipart/form-data">
    <p>Archivo</p>
    <input type="file" id="excel-file" name="excel_file" accept=".xls,.xlsx,.csv" />
    <p>id curso</p>
    <input id="id_curso" type="text">
    <br><br>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="true" id="asociar">
        <label class="form-check-label" for="flexCheckDefault">
            Solo asociar curso
        </label>
    </div>
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


</div>