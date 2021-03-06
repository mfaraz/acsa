<?php
$codigo= array(
        'name'             => 'codigo',
        'value'             => (isset($codigo_id)) ? $codigo_id : set_value('codigo'),
        'class'             => 'text span5'
);

$depositante = array(
        'name'             => 'cuentaregistro_id',
        'value'             => (isset($cuentaregistro_id)) ? $cuentaregistro_id : set_value('cuentaregistro_id'),
        'class'             => 'textarea-mid span5',
);

$producto = array(
        'name'             => 'producto',
        'value'             => (isset($producto_id)) ? $producto_id : set_value('producto'),
        'class'             => 'text span5'
);
$kilos = array(
        'name'             => 'kilos',
        'value'             => (isset($kilos_id)) ? $kilos_id : set_value('kilos'),
        'class'             => 'text span5'
);
$observaciones = array(
        'name'             => 'observaciones',
        'value'             => (isset($observaciones_id)) ? $observaciones_id : set_value('observaciones'),
        'class'             => 'text span5'
);

?>
<script type="text/javascript">
    $(function() {

    	$('#aseguradora_id').change(function(e) {
    		if( $(this).val() > 0 ) {
    			window.location = window.location + "/" + $(this).val();
    		}
    		else {
    			window.location = <?php echo '"' . site_url() . '"' ?> + "/adm/ewarrants/emitir/" + <?php echo '"' . $this->uri->segment(4) . '"' ?>;
    		}
    	});

    	$('#poliza_id').change(function(e) {
    		if( $(this).val() > 0 ) {
    			$('.detalle_poliza').show();
    			var redi = <?php echo '"' . site_url() . '"' ?> + "/adm/ewarrants/emitir/" + <?php echo '"' . $this->uri->segment(4) . '"' ?> + "/" + <?php echo '"' . $this->uri->segment(5) . '"' ?> + "/?pdetalle=" + $(this).val();
    			window.location = redi;
    		} else {
    			$('.detalle_poliza').hide();
    		}
    	});

        $("#empresas_dd").change(function() {
            var site_root = <?php echo '"' . site_url('adm/ewarrants/get_cuentas_registro') . '"'; ?>;
            var dire = site_root + "/" + $(this).val();
            $.ajax({ 
            cache: false,
            type: "GET",
            url: dire,
            contentType: "application/x-www-form-urlencoded;charset=ISO-8859-1",
            dataType:'html',
            success: function(data){
                  $("#cuentas_registro").html(data);

           }
         });
        });
    });
</script>
<div class="row">

                            <div class="span12 margin-bottom-10">
				                	<div class="row">
					               		<div class="span12">
					                		<h2>Emisión de eWarrant</h2>
					                	</div>
				                	</div>
					        </div>		
					        <!-- .block_head ends -->

                            <div class="span12">
                            	
                            	<div class="row margin-bottom-10">
                                  <div class="alert span5 alert-error margin-top-10" id="resultado-operacion" style="display: none;"></div>
                                </div>
                                
                                <?php echo form_open($this->uri->uri_string()); ?>

                                	<?php if( $this->uri->segment(4) == FALSE ) {  ?>
                                	
									<div class="row">
                                		<div class="span6 control-group <?php if(form_error($codigo['name']) != "") echo "error"; ?>">
		                                    <?php echo form_label('Codigo', $codigo['name']); ?>
		                                    <?php echo form_input($codigo); ?>
		                                    
											<?php if(form_error($codigo['name']) != "" || isset($errors[$codigo['name']])) {?>
										
										<div class="row">
		                                    <div class="alert span4 alert-error">
										        <?php echo form_error($codigo['name']); ?><?php echo isset($errors[$codigo['name']])?$errors[$codigo['name']]:''; ?>
										    </div>
										</div>
								    <?php } ?>
								    	</div>
									</div>
									
                                    <?php if(isset($empresas)) { ?>
                                    <div class="row">
                                		<div class="span6 control-group">
		                                    <?php echo form_label('Empresa', 'empresa_id'); ?></td>
		                                            <?php
		                                                echo '<select name="empresa_id" class="listas-padding span5" id="empresas_dd">';
		                                                foreach($empresas as $empresa)
		                                                {
		                                                   //echo '<option value="' . $empresa['empresa_id'] . '">' . $empresa['nombre'] . "</option>";
		                                                   $opt = '<option value="' . $empresa['empresa_id'] . '"';
		                                                   if( isset($empresa_id) && $empresa_id == $empresa['empresa_id'] )
		                                                   	$opt .= ' selected="selected" ';
		                                                   $opt .= '>' .  $empresa['nombre'] . "</option>";
		                                                   echo $opt;
		                                                }
		                                                echo '</select>';
		                                            ?>
		                                   
		                            	</div>
									</div>
									 <?php } ?>
                                    <div class="row">
                                		<div class="span6 control-group">
                                                <?php echo form_label('Cuenta Registro Depositante', 'cuentaregistro_id'); ?></td>
                                                <?php
                                                	if(count($cuentasregistro) > 0) {
                                                		echo '<select name="cuentaregistro_id" class="listas-padding span5" id="cuentas_registro">';
	                                                    foreach($cuentasregistro as $crd)
	                                                    {
	                                                       $opt = '<option value="' . $crd['cuentaregistro_id'] . '"';
	                                                       if( isset($cuentaregistro_id) && $cuentaregistro_id == $crd['cuentaregistro_id'] )
	                                                       	$opt .= ' selected="selected" ';
	                                                       $opt .= '>' .  $crd['nombre'] . "</option>";
	                                                       echo $opt;
	                                                    }
	                                                    echo '</select>';
                                                	} else {
                                                		echo '<select name="cuentaregistro_id" class="listas-padding span5" id="cuentas_registro">';
															echo '<option value="">La empresa no tiene Cuentas Registro Depositante cargadas</option>'; 
														echo '</select>';
                                                	}
                                                ?>
                             
                                        </div>
                                    </div>
                                    <div class="row">
                                		<div class="span6 control-group">
                                            	<?php echo form_label('Producto', 'producto'); ?></td>
                                                <?php
                                                    echo '<select name="producto" class="listas-padding span5" id="productos">';
                                                    foreach($productos as $prd)
                                                    {
                                                       //echo '<option value="' . $prd['producto_id'] . '">' . $prd['nombre'] . "</option>";
                                                       $opt = '<option value="' . $prd['producto_id'] . '"';
                                                       if( isset($producto_id) && $producto_id == $prd['nombre'] )
                                                       	$opt .= ' selected="selected" ';
                                                       $opt .= '>' .  $prd['nombre'] . "</option>";
                                                       echo $opt;
                                                    }
                                                    echo '</select>';
                                                ?>
                                          </div>
                                    </div>
                                    <div class="row">
                                		<div class="span6 control-group <?php if(form_error($kilos['name']) != "") echo "error"; ?>">            
                                                    <?php echo form_label('Cantidad', $kilos['name']); ?>
                                                    <?php echo form_input($kilos); ?>
                                                    <?php if(form_error($kilos['name']) != "" || isset($errors[$kilos['name']]) ) {?>
                                                    <div class="row">
					                                    <div class="alert span4 alert-error">
													        <?php echo form_error($kilos['name']); ?><?php echo isset($errors[$kilos['name']])?$errors[$kilos['name']]:''; ?>
													    </div>
													</div>
												    <?php } ?>
										</div>
                                    </div>			 
									<div class="row">
                                		<div class="span6 control-group <?php if(form_error($observaciones['name']) != "") echo "error"; ?>">   
                                                    <?php echo form_label('Observaciones', $observaciones['name']); ?>
                                                    <?php echo form_textarea($observaciones); ?>
                                                    <?php if(form_error($observaciones['name']) != "" || isset($errors[$observaciones['name']]) ) {?>
                                                   	<div class="row">
					                                    <div class="alert span4 alert-error">
													        <?php echo form_error($observaciones['name']); ?><?php echo isset($errors[$observaciones['name']])?$errors[$observaciones['name']]:''; ?>
													    </div>
													</div>
												    <?php } ?>
								    	</div>
                                    </div>
                                    
                                    <?php } else { //FIN IF NOT SEGMENT(4) ?>
                                    
                                    <?php if( isset($mostrar_pantalla) && $mostrar_pantalla == TRUE ) { ?>
                                    
	                                    <?php if( isset($show_estado_aseguradora) || isset($show_estado_warrantera) ) { ?>
	                                	<div class="row">
	                                		<div class="span6 control-group">
	                                			<?php if( isset($show_estado_aseguradora) && $show_estado_aseguradora == true ) { ?>
	                                                <?php echo form_label('Estado de poliza'); ?>
	                                                <label class="radio">
													  <input type="radio" name="estado" id="estado1" value="5">
													  Aceptar Poliza
													</label>
													<label class="radio">
													  <input type="radio" name="estado" id="estad2" value="6">
													 Rechazar Poliza
													</label>
	                             				<?php } elseif( isset($show_estado_warrantera) && $show_estado_warrantera == true ) { ?>
	                             					<?php echo form_label('Estado'); ?>
	                                                <label class="radio">
													  <input type="radio" name="estado" id="estado1" value="2">
													  Aceptado
													</label>
													<label class="radio">
													  <input type="radio" name="estado" id="estad2" value="4">
													 Rechazado
													</label>
	                             				<?php } ?>
	                                        </div>
	                                    </div>
	                                	<?php } ?>
	                                	
	                                	<?php if( isset($tipo_empresa_id) && ( $tipo_empresa_id == 2 || $tipo_empresa_id == 4 ) ) { //Chequeamos que sea una warrantera o aseguradora ?>
	                                	
	                                	<div class="well">
	                                	<h2>Poliza</h2>
	                                	<?php if( isset($show_estado_warrantera) && $show_estado_warrantera == true ) { ?>
			                                	<?php if( isset($aseguradoras) ) { ?>
			                                	<div class="row">
			                                		<div class="span6 control-group">
			                                                <?php echo form_label('Aseguradora', 'aseguradora_id'); ?></td>
			                                                <?php
			                                                	if(count($aseguradoras) > 0) {
			                                                		echo '<select name="aseguradora_id" class="listas-padding span5" id="aseguradora_id">';
				                                                    echo '<option value="">-- Elegir Aseguradora</option>';
				                                                    foreach($aseguradoras as $crd)
				                                                    {
				                                                       $opt = '<option value="' . $crd['empresa_id'] . '"';
				                                                       if( $this->uri->segment(5) == $crd['empresa_id'] )
				                                                       	$opt .= ' selected="selected" ';
				                                                       $opt .= '>' .  $crd['nombre'] . "</option>";
				                                                       echo $opt;
				                                                    }
				                                                    echo '</select>';
			                                                	} else {
			                                                		echo '<select name="aseguradora_id" class="listas-padding span5" id="aseguradora_id">';
																		echo '<option value="0">No hay Aseguradoras cargadas</option>'; 
																	echo '</select>';
			                                                	}
			                                                ?>
			                             
			                                        </div>
			                                    </div>
			                                	<?php } ?>

			                                	<?php if( isset($aseguradoras_polizas) ) { ?>
			                                	<div class="row">
			                                		<div class="span6 control-group">
			                                                <?php echo form_label('Polizas', 'poliza_id'); ?></td>
			                                                <?php
			                                                	if(count($aseguradoras_polizas) > 0) {
			                                                		echo '<select name="poliza_id" class="listas-padding span5" id="poliza_id">';
				                                                    echo '<option value="">-- Elegir Poliza</option>';
				                                                    foreach($aseguradoras_polizas as $crd)
				                                                    {
				                                                       $opt = '<option value="' . $crd['poliza_id'] . '"';
				                                                       if( $this->input->get("pdetalle") == $crd['poliza_id'] )
				                                                       	$opt .= ' selected="selected" ';
				                                                       $opt .= '>' .  $crd['nombre'] . "</option>";
				                                                       echo $opt;
				                                                    }
				                                                    echo '</select>';
			                                                	} else {
			                                                		echo '<select name="poliza_id" class="listas-padding span5" id="poliza_id">';
																		echo '<option value="0">No hay polizas cargadas</option>'; 
																	echo '</select>';
			                                                	}
			                                                ?>
			                             
			                                        </div>
			                                        
			                                    </div>
			                                    
			                                    	<?php if(isset($aseguradoras_poliza_detalle)) { ?>
			                                    	<div class="row detalle_poliza">
			                                    		<div class="span6 control-group">
					                                        <div class="controls controls-row">
					                                        	<label>Comision</label>
						                                    	<span class="input-xlarge uneditable-input"><?php echo $aseguradoras_poliza_detalle[0]['poliza_comision']; ?></span>
						                                    </div>
						                                    <div class="controls controls-row">
						                                    	<label>Descripcion</label>
						                                    	<span class="input-xlarge uneditable-input"><?php echo $aseguradoras_poliza_detalle[0]['poliza_descripcion'] ?></span>
						                                    </div>
						                                </div>
				                                    </div>
			                                        <?php } ?>

			                                	<?php } ?>
			                                  
			                                  <?php } elseif( isset($show_estado_aseguradora) && $show_estado_aseguradora == true ) { ?>
				                                    <div class="controls controls-row">
				                                    	<span class="input-xlarge uneditable-input"><?php echo $poliza_nombre; ?></span>
				                                    </div>
				                                    <div class="controls controls-row">
				                                    	<span class="input-xlarge uneditable-input"><?php echo $poliza_descripcion; ?></span>
				                                    </div>
				                                    <div class="controls controls-row">
				                                    	<span class="input-xlarge uneditable-input"><?php echo $poliza_comision; ?></span>
				                                    </div>
			                                  <?php } ?>
	                                    </div><!-- hero -->
	                                	<?php } ?>
	                                    
	                                    
	                                    <div class="controls controls-row">
	                                    	<label>Codigo</label>
	                                    	<span class="input-xlarge uneditable-input"><?php echo $codigo_id; ?></span>
	                                    </div>
	                                    <div class="controls controls-row">
	                                   		 <label>Empresa</label>
	                                    	<span class="input-xlarge uneditable-input"><?php echo $empresa_id; ?></span>
	                                    </div>
	                                    <div class="controls controls-row">
	                                    	<label>Cuenta Registro</label>
	                                    	<span class="input-xlarge uneditable-input"><?php echo $cuentaregistro_id; ?></span>
	                                    </div>
	                                    <div class="controls controls-row">
	                                    	<label>Producto</label>
	                                    	<span class="input-xlarge uneditable-input"><?php echo $producto_id; ?></span>
	                                    </div>
	                                    <div class="controls controls-row">
	                                    	<label>Kilos</label>
	                                    	<span class="input-xlarge uneditable-input"><?php echo $kilos_id; ?></span>
	                                    </div>
	                                    
	                                    <?php } ?>
                                    
                                    <?php } //mostrar pantalla ?>
                                    
                                    <?php //echo form_submit('register', 'Crear Cuenta'); ?>
                                    <p><input type="submit" class="btn btn-primary btn-large" value="Enviar" name="register" /></p>
                                    <?php echo form_close(); ?>
                                                                              
                            </div>		
                            <!-- .block_content ends -->
					
	</div>		
<!-- .block ends -->