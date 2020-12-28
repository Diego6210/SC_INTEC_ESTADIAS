<div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <!--CARD HEADER-->
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Consultar Facturas</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                            </ul>
                    </div>


                </div>
                <!--CARD BODY-->
                <div class="card-body collapse in">
                    <div class="card-block">
                        <!--FORM BODY-->
                        <div class="form-body">
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="Clientes">Cliente</label>
                                      <select name="cliente" id="cliente" class="form-control" onchange="CargarFacturasCliente()" >
                                          <option value="">Clientes...</option>

                                      </select>
                                  </div>
                              </div>
                            </div>

                            <table class="table table-responsive table-bordered table-striped" id="tblOrdenAbierta" style="width:100%">
                                    <thead>
                                        <th>No. Factura</th>
                                        <th>Fecha Factura</th>
                                        <th>Total Equipos</th>
                                        <th>Detalle</th>
                                    </thead>
                                    <tbody id="tablaOrdenes">

                                    </tbody>
                                </table>



                        </div>





                    </div>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript">

$(document).ready(function() {
  CargarClientes();



});

function CargarClientes()
{
    $.ajax
    ({
        type:'post',
        url:'<?php echo site_url();?>/Servicio_Controller/ConsultarClientes_ajax',
        success:function(resp)
        {
            $("#cliente").html(resp)
        }
    });
}
function CargarFacturasCliente() {

  var IdCliente = $("#cliente").val();

  var t = $('#tblOrdenAbierta').DataTable({
           "drawCallback": function( settings ) {
                   $('[data-toggle="tooltip"]').tooltip();
                 },
             "ajax":{
               url:"<?php echo site_url();?>/Factura_Controller/ConsultarFacturasCliente_ajax",
               data:{"IdCliente":IdCliente},
               method:"POST",
               dataSrc: ""
             },

              "destroy":true,
              "language": {
                   "lengthMenu": "Mostrando _MENU_ registros por pag.",
                   "zeroRecords": "Sin Datos - disculpa",
                   "info": "Motrando pag. _PAGE_ de _PAGES_",
                   "infoEmpty": "Sin registros disponibles",
                   "infoFiltered": "(filtrado de _MAX_ total)"
               },
               "autoWidth":true,
               "columnDefs":[
                 {
                   "targets":3, "data":"IdFactura", "render":function(data,type,row,meta)
                   {
                      return '<a href="<?php echo site_url('Factura/ConsultarEquiposFactura/'); ?>'+data+'"><i class="icon-eye4"></i>Detalle</a>';
                   }
                 }


               ],
               "columns": [

                     { "data": "NumFactura"},
                     { "data": "FechaFactura" },
                     { "data": "TotalEquipos" }

                     ]

             });


}

</script>
