<div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <!--CARD HEADER-->
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Paquete <?=$paquete[0][0]?></h4>
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
                        <div id="form-body" class="form-body">
                            
                            <div id="PDF" onclick="imprimir()">
                            
                            </div>




                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    datos = {"id":<?=$paquete[0][0]?>};
    $.ajax({
        url:"<?php echo site_url();?>/Servicio_Controller/PDFLaboratoripMODEL",
        data:datos,
        method:"POST",
        success: function(data)
        {
            $('#PDF').html(data);
        }
      });
});

function imprimir(){
    
}
</script>