<div class="row match-height">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Catalogo de servicios</h4>
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
           
            <div class="card-body collapse in">
                <div class="card-block">
                    <!--FORM BODY-->
                    <div class="form-body">

                        <table class="table table-responsive table-bordered table-striped" id="tblServicio"  style="width: 100%">
                            <thead>
                                <th>No. Servicio</th>
                                <th>Cliente</th>
                                <th>Contacto</th>
                                <th>Domicilio</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Fecha</th>
                                <th>Razon Social</th>
                                <th>Recoge</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody >

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>


<script>

    var idClientes =0;
    $(document).ready(function()
    {
        CargarServicios();
    });

    function CargarServicios()
    {
        var t = $('#tblServicio').DataTable({

        "ajax":{
            url:"<?php echo site_url();?>/Automatizacio_Controller/ConsultarServicios",
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

        "columnDefs":[
                {
                    "targets":9, "data":"IdServicio", "render": function(data,type,row,meta)
                    {
                        var url = '<?php echo site_url();?>/Automatizacion/VerPDF/'+data;

                        return '<a classs = "btn" href="'+url+'"><i class="icon-eye4" data-toggle="tooltip" data-placement="top" id="Detalle" title="Visualizar servicio"> Detalles</i></a>';
                    }
                }],

        "columns": [
                { "data": "IdServicio" },
                { "data": "NombreCompania" },
                { "data": "NombreContacto" },
                { "data": "Domicilio" },
                { "data": "Correo" },
                { "data": "Telefono" },
                { "data": "Fecha" },
                { "data": "RazonSocial" },
                { "data": "Recoge" }
            ]
        });
    }

</script>