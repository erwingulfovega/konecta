<form method="POST" action="#" class="smart-form" id="form_categorias">

	@include('categories.formulario')

	<footer style="text-align: right;">
		<button type="button" class="btn btn-success" id="guardar_categoria">
			Guardar
		</button>
		<a type="button" class="btn btn-primary" href="{{url('/')}}" id="cancelar" name="cancelar">
			Cancelar
		</a>
	</footer>

	<?php 
		use App\Models\Categories;
		$categorias=Categories::where("estado","Activo")->get();
	?>

	<h4>Listado de Categorías Activas</h4>
	<table id="tb_categorias" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
          <th>Id Categoría</th>
          <th>Descripción</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach($categorias as $filas)
          <td><?php echo $filas->id; ?></td>
          <td>
          	<input class="form-control" id="<?php echo $filas->id; ?>" name="<?php echo $filas->id; ?>" 
          	type="text" value="{{ $filas->descripcion }}" disabled>
    			<div class="btn-group" role="group" aria-label="Basic example">
		          	<div id="boton_guardar<?php echo $filas->id; ?>" style="display: none;">
		                <a href="javascript:update_categoria(<?php echo $filas->id; ?>);" class="btn btn-success btn-xs">
		                <i class="bi bi-check"></i>
		                </a>
		            </div>
		            <div id="boton_cancelar<?php echo $filas->id; ?>" style="display: none;">
		                <a href="javascript:cancelar_categoria(<?php echo $filas->id; ?>);" class="btn btn-primary btn-xs">
		                <i class="bi bi-x"></i>
		                </a>
		            </div>
		        </div>
          </td>
          <td>
            <?php if($filas->estado=='Activo'){ ?>
            <div id="boton_editar<?php echo $filas->id; ?>">
	            <a class="btn btn-primary" href="javascript:editar_categoria({{$filas->id}})" role="button">
	              <i class="bi bi-pencil-square"></i>
	            </a>
	            <a class="btn btn-danger" href="javascript:eliminar_categoria({{$filas->id}})" role="button">
	              <i class="bi bi-trash3"></i>
	            </a>
            </div>
          </td>
        </tr>
        <?php } ?>
        @endforeach
      </tbody>
	</table>
</form>