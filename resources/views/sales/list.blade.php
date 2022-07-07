    <?php 
    use App\Models\Sales;
    $facturas=Sales::where("estado","Activo")->get();

    //dd($facturas);
    ?>
    <h4>Listado de Facturas Activas</h4>
    <table id="tb_categorias" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
          <th>Nro Factura</th>
          <th>Cliente</th>
          <th>Valor</th>
          <th>Fecha</th>
          <th>Ver PDF</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach($facturas as $filas)
          <td>
            <?php echo $filas->id; ?>
          </td>
          <td>
            <?php echo $filas->cliente_nombre; ?>
          </td>
          <td>
            <?php echo number_format($filas->valor,0, ',', '.'); ?>
          </td>
          <td>
            <?php echo $filas->fecha; ?>
          </td>
          <td>
            <?php if($filas->estado=='Activo'){ ?>
              <a href="{{ url('sales/pdf').'/'.$filas->id }}" target="_blank" class="btn btn-danger btn-xs">
                <i class="bi bi-file-earmark-pdf"></i>
              </a>
            </div>
          </td>
        </tr>
        <?php } ?>
        @endforeach
      </tbody>
    </table>