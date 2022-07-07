<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>.:: Tienda Online ::.</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Tienda en Línea</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Menú Principal</p>
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Productos</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="products"><i class="bi bi-cart-plus-fill"></i> Nuevo</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categorías</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <a href="categories"><i class="bi bi-cart-plus-fill"></i> Nueva</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Ventas</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                        <li>
                            <a href="sales"><i class="bi bi-cart-plus-fill"></i> Nueva</a>
                        </li>
                        <li>
                            <a href="sales/list"><i class="bi bi-calendar2-range"></i> Listar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info xs">
                        <span>
                            <i class="bi bi-skip-start-btn-fill"></i>
                        </span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                </div>
            </nav>

            <div id="pintar_vistas"></div>
                <?php if($vista=='sales'){ ?>
                    @include('sales.index')
                <?php } ?>
                <?php if($vista=='categories'){ ?>
                    @include('categories.index')
                <?php } ?>
                <?php if($vista=='products'){ ?>
                    @include('products.index')
               |<?php } ?>
            </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript">
        
        var detalles  = [];

        var dialogo = {
            autoOpen: false,
            modal: true,
            width: 300,
            height:300,
            title: 'Mensaje'
        };
        
        $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

            $('#example').DataTable();
            $('#tb_categorias').DataTable();
            $('#tb_productos').DataTable();

            $( "#articulos" ).autocomplete({
                  source: "{{ url('products/autocomplete')}}",
                  minLength: 0,
                  select: function( event, ui ) {

                        console.log(ui.item.precio);

                        const id_articulos     = ui.item.id;
                        const codigo           = ui.item.codigo;
                        const nombre           = ui.item.nombre;
                        const precio           = ui.item.precio;
                        const valor_formateado = ui.item.valor_formateado;
                        const anulado          = ui.item.anulado;

                        $("#id_articulos").val(id_articulos);
                        $("#articulos").val(nombre);
                        $("#descripcion").val(nombre);
                        $("#codigo_articulo").val(codigo);
                        $("#articulos").val(nombre);
                        $("#valor_formateado").val(valor_formateado);
                        $("#subtotal").val(precio);
                            
                  }
            });

            //Agregar una nueva categoría

            $( "#guardar_categoria" ).click(function(){

                $("#guardar_categoria").attr("disabled","disabled");
                $("#cancelar").attr("disabled","disabled");

                if($("#categoria").val()!=''){

                    var datos = $("#form_categorias").serialize();
                    var jqXHR = $.ajax({
                        type: "POST",
                        url: "{{ url('categories/store') }}",
                        data: datos,
                        success: function(data) {
                            $('#mensaje').html(data);
                            $("#guardar_categoria").removeAttr("disabled");
                            $("#cancelar").removeAttr("disabled");
                        },
                        error: function(data) {

                            Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'Hubo un error al guardar la categoría'
                            })
                                        
                            $("#guardar_categoria").removeAttr("disabled");
                            $("#cancelar").removeAttr("disabled");
                        }
                    });

                }else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'El campo categoría es requerido'
                    })
                    $("#guardar_categoria").removeAttr("disabled");
                    $("#cancelar").removeAttr("disabled");
                }
            });

            //Agregar una nuevo producto

            $( "#guardar_productos" ).click(function(){

                $("#guardar_productos").attr("disabled","disabled");
                $("#cancelar").attr("disabled","disabled");

                if($("#nombre").val()!='' && $("#referencia").val()!='' && $("#precio").val()!='' 
                    && $("#peso").val()!='' && $("#stock").val()!='' && $("#categorias").val()!=''){

                    var datos = $("#form_productos").serialize();
                    var jqXHR = $.ajax({
                        type: "POST",
                        url: "{{ url('products/store') }}",
                        data: datos,
                        success: function(data) {
                            $('#mensaje').html(data);
                            $("#guardar_productos").removeAttr("disabled");
                            $("#cancelar").removeAttr("disabled");
                        },
                        error: function(data) {

                            Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'Hubo un error al guardar la categoría'
                            })
                                        
                            $("#guardar_productos").removeAttr("disabled");
                            $("#cancelar").removeAttr("disabled");
                        }
                    });

                }else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'El campo categoría es requerido'
                    })
                    $("#guardar_categoria").removeAttr("disabled");
                    $("#cancelar").removeAttr("disabled");
                }
            });

            //agregar una nueva venta

            $("#guardar").click(function(){
            
                if(confirm("Desea guardar la orden?")){
                
                    $("#agregar_item").attr("disabled","disabled");
                    $("#guardar").attr("disabled","disabled");

                    if($("#detalles").val()!='' && $("#nombres").val()!='' && $("#email").val()!='' && $("#celular").val()!='' && detalles.length>0){

                        var datos = $("#form_order").serialize();
                        
                        var jqXHR = $.ajax({
                            type: "POST",
                            url: "{{ url('orders/store') }}",
                            data: datos,
                            success: function(data) {
                                
                                /*Swal.fire({
                                  icon: 'success',
                                  title: "Orden Guardada Correctamente!",
                                  showConfirmButton: false,
                                  timer: 1500
                                });*/

                                $("#mensaje").html(data);

                                var json=JSON.stringify(data);

                                console.log(json.url);

                                $("#agregar_item").removeAttr("disabled");
                                $("#guardar").removeAttr("disabled");
                            },
                            error: function(data) {
                                $("#agregar_item").removeAttr("disabled");
                                $("#guardar").removeAttr("disabled");
                            }
                        });

                    }else{
                        
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'La orden no tiene artículos, favor verificar'
                        })
                
                        $("#guardar").removeAttr("disabled");
                        $("#guardar2").removeAttr("disabled");
                    }

                }else{
                    $("#guardar").removeAttr("disabled");
                    $("#guardar2").removeAttr("disabled");
                }
            });
        });

        function editar_categoria(id){
            $("#"+id).removeAttr('disabled');
            $("#"+id).focus();
            $("#boton_editar"+id).hide();
            $("#boton_guardar"+id).show();
            $("#boton_cancelar"+id).show();
        }

        function cancelar_categoria(id){
            $("#"+id).attr('disabled','disabled');
            $("#boton_editar"+id).show();
            $("#boton_guardar"+id).hide();
            $("#boton_cancelar"+id).hide();
        }

        function update_categoria(id){

            var jqXHR = $.ajax({
                type: "POST",
                url: "{{ url('categories/update') }}",
                data: {
                    id: id,
                    descripcion: $("#"+id).val(),
                    _token: jQuery("input[name='_token']").val()
                },
                success: function(data) {
                    $('#mensaje').html(data);
                },
                error: function(data) {

                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Hubo un error al eliminar la categoría'
                    })
                
                }
            });
        }

        function eliminar_categoria(id){

            if(confirm("Está a punto de eliminar una categoría, desea continuar?")){
                var jqXHR = $.ajax({
                    type: "POST",
                    url: "{{ url('categories/delete') }}",
                    data: {
                        id: id,
                        _token: jQuery("input[name='_token']").val()
                    },
                    success: function(data) {
                        $('#mensaje').html(data);
                    },
                    error: function(data) {

                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Hubo un error al eliminar la categoría'
                        })
                    
                    }
                });
            }   
        }

        function editar_producto(id){
            $("#nombre_"+id).removeAttr('disabled');
            $("#referencia_"+id).removeAttr('disabled');
            $("#precio_"+id).removeAttr('disabled');
            $("#peso_"+id).removeAttr('disabled');
            $("#categorias_"+id).removeAttr('disabled');
            $("#stock_"+id).removeAttr('disabled');
            $("#fecha_creacion_"+id).removeAttr('disabled');
            $("#nombre_"+id).focus();
            $("#boton_editar"+id).hide();
            $("#boton_guardar"+id).show();
            $("#boton_cancelar"+id).show();
        }

        function cancelar_producto(id){
            $("#nombre_"+id).attr('disabled','disabled');
            $("#referencia_"+id).attr('disabled','disabled');
            $("#precio_"+id).attr('disabled','disabled');
            $("#peso_"+id).attr('disabled','disabled');
            $("#categorias_"+id).attr('disabled','disabled');
            $("#stock_"+id).attr('disabled','disabled');
            $("#fecha_creacion_"+id).attr('disabled','disabled');
            $("#boton_editar"+id).show();
            $("#boton_guardar"+id).hide();
            $("#boton_cancelar"+id).hide();
        }

        function update_producto(id){

            var jqXHR = $.ajax({
                type: "POST",
                url: "{{ url('products/update') }}",
                data: {
                    id:            id,
                    nombre:        $("#nombre_"+id).val(),
                    referencia:    $("#referencia_"+id).val(),
                    precio:        $("#precio_"+id).val(),
                    peso:          $("#peso_"+id).val(),
                    categorias:    $("#categorias_"+id).val(),
                    stock:         $("#stock_"+id).val(),
                    fecha_creacion:$("#fecha_creacion_"+id).val(),
                     _token: jQuery("input[name='_token']").val(),
                },
                success: function(data) {
                    $('#mensaje').html(data);
                },
                error: function(data) {

                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Hubo un error al eliminar el producto'
                    })
                
                }
            });
        }

        function eliminar_producto(id){

            if(confirm("Está a punto de eliminar un producto, desea continuar?")){
                var jqXHR = $.ajax({
                    type: "POST",
                    url: "{{ url('products/delete') }}",
                    data: {
                        id: id,
                        _token: $("input[name='_token']").val()
                    },
                    success: function(data) {
                        $('#mensaje').html(data);
                    },
                    error: function(data) {

                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Hubo un error al eliminar el producto'
                        })
                    
                    }
                });
            }   
        }

        function agregar_item(){

            var id_articulos   =$("#id_articulos").val();
            var codigo_articulo=$("#codigo_articulo").val();
            var subtotal       =$("#subtotal").val();
            var descripcion    =$("#descripcion").val();
            var cantidad       =$("#cantidad").val();

            detalles.push({ 
                "id"               : id_articulos,
                "codigo"           : codigo_articulo,
                "descripcion"      : descripcion,
                "cantidad"         : cantidad,
                "subtotal"         : subtotal,
                "valor"            : subtotal*cantidad,
                "valor_formateado" : valor_formateado,
                "anulado"          : "NO"
            });
            
            console.log(JSON.stringify(detalles));
            $("#detalles").val(JSON.stringify(detalles));

            actualizar_tabla(detalles);

            $("#id_articulos").val("");
            $("#articulos").val("");
            $("#cantidad").val("");

        }

        function actualizar_tabla(miJSON){          

            let valor=0;

            if(miJSON.length==1){
    
                $.each(miJSON, function(i,item){
                    $("#orden_detalles").append('<tr><td>'+item.codigo+'</td><td>'+item.descripcion+'</td><td>'+item.cantidad+'</td><td>'+item.subtotal+'</td><td>'+item.valor+'</td><td align="center"><button type="button" onclick="javascript:quitar('+item.id+');"><i class="bi bi-trash3-fill"></i></button></tr>');
                        valor=parseInt(valor)+parseInt(item.valor);
                });
                
                totalizar();        

            }else{

                $("#orden_detalles > tbody"). empty();
                
                $.each(miJSON, function(i,item){
                    $("#orden_detalles").append('<tr><td>'+item.codigo+'</td><td>'+item.descripcion+'</td><td align="center">'+item.cantidad+'</td><td>'+item.subtotal+'</td><td>'+item.valor+'</td><td align="center"><button type="button" onclick="javascript:quitar('+item.id+');"><i class="bi bi-trash3-fill"></i></button></tr>');
                        valor=parseInt(valor)+parseInt(item.valor);
                });

                totalizar();

            }

        }

        function totalizar(){
            var subtotal = 0;
            console.log("tam: ",detalles.length);
            for(i=0;i<detalles.length;i++) {  
                if(detalles[i].anulado == 'NO'){
                    subtotal    += parseFloat(detalles[i].subtotal)*parseFloat(detalles[i].cantidad);    
                 console.log("valor:"+detalles[i].valor);
                 console.log("cantidad: "+detalles[i].cantidad);
                }
            }
            var currencyString = numeral(subtotal);
            $("#valor_orden").text(currencyString.format('$0,0.00'));
            $("#valor_input_orden").val(subtotal);
        }
    </script>
    </body>
</html>