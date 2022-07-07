<h5>Nuevo Producto</h5>
{{ method_field('POST') }}
{{ csrf_field() }}
<div class="form-row">
    <div class="form-group col-md-4">
      <label>Nombre del Producto</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="form-group col-md-4">
      <label>Referencia</label>
      <input type="text" class="form-control" id="referencia" name="referencia">
    </div>
    <div class="form-group col-md-4">
      <label>Precio</label>
      <input type="numeric" class="form-control" id="precio" name="precio">
    </div>
</div>
<?php 
 use App\Models\Categories;
 $categorias=Categories::get();
?>
<div class="form-row">
    <div class="form-group col-md-4">
      <label>Peso</label>    
      <input type="numeric" class="form-control" id="peso" name="peso">
    </div>
    <div class="form-group col-md-4">
      <label>Stock</label>    
      <input type="numeric" class="form-control" id="stock" name="stock">
    </div>
    <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1">Categorías</label>
      <select class="form-control" id="categorias" name="categorias">
        <option value="">Seleccione...</option>
        @foreach($categorias as $filas)
        <option value="{{$filas->id}}">{{$filas->descripcion}}</option>
        @endforeach
      </select>
    </div>
</div>
<div id="mensaje"></div>
