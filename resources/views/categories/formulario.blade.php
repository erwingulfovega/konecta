<h5>Nueva Categoría</h5>
{{ method_field('POST') }}
{{ csrf_field() }}
<div class="form-row">
    <div class="form-group col-md-4">
      <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Ingrese nombre de categoría">
    </div>
</div>
<div id="mensaje"></div>