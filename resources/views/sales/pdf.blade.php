<div style="border: 1px solid black; border-radius: 10px; width: 100%;  padding: 5px; text-align: left; font-size: 12px;">
    <h2>Información de la Factura</h2>
    <h3>Nro Factura: <?php echo $factura->id; ?></h3>
    <h3>Nombre del cliente.: <br/> 
        <?php echo $factura->cliente_nombre; ?><br>
        Cel.:<?php echo $factura->cliente_mobile; ?>
    </h3>
    <h3>Fecha.: <?php echo $factura->fecha; ?></h3>
</div>
<h2>Detalles de la Factura</h2>
<table style="border-collapse: collapse;border: 1px solid;width: 100%;">
    <thead>
        <tr>
          <th style="text-align:center;">Cód Producto</th>
          <th style="text-align:center;">Producto</th>
          <th style="text-align:center;">Cantidad</th>
          <th style="text-align:center;">Subtotal</th>
          <th style="text-align:center;">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php $suma=0; ?>
          @foreach($factura_detalle as $filas)
          <?php $suma=$suma+$filas->valor; ?>
          <td style="text-align:center;">
            <?php echo $filas->producto_id; ?>
          </td>
          <td style="text-align:center;">
            <?php echo $filas->nombre; ?>
          </td>
          <td style="text-align:center;">
            <?php echo $filas->cantidad; ?>
          </td>
          <td style="text-align:center;">
            <?php echo '$'.number_format($filas->subtotal,0, ',', '.'); ?>
          </td>
          <td style="text-align:center;">
            <?php echo '$'.number_format($filas->valor,0, ',', '.'); ?>
          </td>
        </tr>
        @endforeach
      </tbody>
</table>
<br>
<div style="border: 1px solid black; border-radius: 10px; width: 98%;  padding: 5px; text-align: right; font-size: 15px;">
Total Factura: <?php echo '$'.number_format($suma,0,',','.'); ?>
</div>
      