<link rel="stylesheet" href="<?php echo base_url();?>app-assets/Calendario/css/monthly.css">
<style type="text/css">
    #mycalendar {
        width: 80%;
        height: 80%;
        font-family: Calibri;
        background-color: #f0f0f0;
        padding: 0em 1em;
        margin: 2em auto 0 auto;
        max-width: 80em;
        border: 1px solid #666;
    }
</style>

<div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <!--CARD HEADER-->
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Actividades a realizar</h4>
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
                        <ul class="list-inline text-xs-center">
                            <li class="mr-1">
                                <h6><i class="icon-circle" style="color: #99CCCC !important;"></i> <span>Orden creada</span></h6>
                            </li>
                            <li class="mr-1">
                                <h6><i class="icon-circle indigo"></i> <span>Paquete</span></h6>
                            </li>
                            <li class="mr-1">
                                <h6><i class="icon-circle indo"></i> <span>Equipo</span></h6>
                            </li>
                        </ul>

                        <div class="monthly" id="mycalendar"></div>

                            
                                                                                                            
                        </div> 
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>app-assets/Calendario/js/monthly.js"></script>

<script type="text/javascript">

	var Events = {
	"monthly": [
		{
		"id": 1,
		"name": "Evento 1",
		"startdate": "2020-12-15",
		"enddate": "2020-12-15",
		"starttime": "12:00",
		"endtime": "2:00",
		"color": "#99CCCC",	
		"url": ""
		}
	]
	};

	$(window).load( function() {

       /* $.ajax
        ({
            type:'post',
            url:'<?php echo site_url();?>/Calendario_Controller/ConsultarTodosPaquetes',
            success:function(resp)
            {
                


                select IdOrden, Fecha, FechaEnvio,FechaRecibo,Observaciones from orden_servicio where IdOrden = 1;


select * from equipo_orden where IdEquipoOrden = 1; 


select * from paquete_envio where IdPaqueteEnvio = 1;




                console.log(resp);
                alert('Descripción: ' + resp['Descripcion']+ ' - Numero de guia: ' + resp['NumeroGuia'] + ' - Laboratorio ' + resp[0]['Descripcion_lab']);
            }
        });*/


		$('#mycalendar').monthly({
			mode: 'event',
			dataType: 'json',
			events: Events
		});
	});
</script>

