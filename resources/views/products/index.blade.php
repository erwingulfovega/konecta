<form method="POST" action="#" class="smart-form" id="form_productos">

	@include('products.formulario')

	<footer style="text-align: right;">
		<button type="button" class="btn btn-success" id="guardar_productos">
			Guardar
		</button>
		<a type="button" class="btn btn-primary" href="{{url('/')}}">
			Cancelar
		</a>
	</footer>
	
	<?php 
		use App\Models\Products;
		use App\Models\Categories;
		$productos=Products::where("estado","Activo")->get();
		$categorias=Categories::where("estado","Activo")->get();
	?>

	<h4>Listado de Productos Activos</h4>
	<table id="tb_categorias" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Referencia</th>
          <th>Precio</th>
          <th>Peso</th>
          <th>Categoría</th>
          <th>Stock</th>
          <th>Fecha</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach($productos as $filas)
          <td><?php echo $filas->id; ?></td>
          <td>
          	<input class="form-control" id="nombre_<?php echo $filas->id; ?>" name="nombre_<?php echo $filas->id; ?>" 
          	type="text" value="{{ $filas->nombre }}" disabled>
          </td>
          <td>
          	<input class="form-control" id="referencia_<?php echo $filas->id; ?>" name="referencia_<?php echo $filas->id; ?>"
          	type="text" value="{{ $filas->referencia }}" disabled>
          </td>
          <td>
          	<input class="form-control" id="precio_<?php echo $filas->id; ?>" name="precio_<?php echo $filas->id; ?>"
          	type="text" value="{{ $filas->precio }}" disabled>
          </td>
          <td>
          	<input class="form-control" id="peso_<?php echo $filas->id; ?>" name="peso_<?php echo $filas->id; ?>"
          	type="text" value="{{ $filas->peso }}" disabled>
          </td>
          <td>
          	<select class="form-control" id="categorias_<?php echo $filas->id; ?>" name="categorias<?php echo $filas->id; ?>" disabled>
        			<option value="">Seleccione...</option>
        			@foreach($categorias as $filas2)
        				@if($filas->categoria==$filas2->id)
        				<option value="{{$filas->categoria}}" selected>{{$filas2->descripcion}}</option>
        				@else
        				<option value="{{$filas2->id}}">{{$filas2->descripcion}}</option>
        				@endif
        			@endforeach
      		</select>
          </td>
          <td>
          	<input class="form-control" id="stock_<?php echo $filas->id; ?>" name="stock_<?php echo $filas->id; ?>"
          	type="text" value="{{ $filas->stock }}" disabled>
          </td>
           <td>
          	<input class="form-control" id="fecha_creacion_<?php echo $filas->id; ?>" name="fecha_creacion_<?php echo $filas->id; ?>"
          	type="date" value="{{ $filas->fecha_creacion }}" disabled>
          </td>
          <td>
            <?php if($filas->estado=='Activo'){ ?>
            <div class="btn-group" role="group" aria-label="Basic example">
	            <div id="boton_editar<?php echo $filas->id; ?>">
		            <a class="btn btn-primary btn-xs" href="javascript:editar_producto({{$filas->id}})">
		              <i class="bi bi-pencil-square"></i>
		            </a>
		            <a class="btn btn-danger btn-xs" href="javascript:eliminar_producto({{$filas->id}})">
		              <i class="bi bi-trash3"></i>
		            </a>
	            </div>
	        </div>
            <div class="btn-group" role="group" aria-label="Basic example">
	          	<div id="boton_guardar<?php echo $filas->id; ?>" style="display: none;">
	                <a href="javascript:update_producto(<?php echo $filas->id; ?>);" class="btn btn-success btn-xs">
	                <i class="bi bi-check"></i>
	                </a>
	            </div>
	            <div id="boton_cancelar<?php echo $filas->id; ?>" style="display: none;">
	                <a href="javascript:cancelar_producto(<?php echo $filas->id; ?>);" class="btn btn-primary btn-xs">
	                <i class="bi bi-x"></i>
	                </a>
	            </div>
		    </div>
          </td>
        </tr>
        <?php } ?>
        @endforeach
      </tbody>
	</table>		
</form>