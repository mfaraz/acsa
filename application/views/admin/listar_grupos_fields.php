<?php $this->load->file('includes/datatables_files.php'); ?>
<script>
	$(function() {
		$objInit = $.extend( {}, objInit );

	    $('#tabla').dataTable($objInit);
	});
</script>

<div class="row">
        <div class="span12 margin-bottom-10">
                	<div class="row relativo">
	               			<div class="span12">
		                        	<?php if(isset($data_menu)) { ?>
				                		<?php foreach ($data_menu as $keyp => $row) { ?>
				               				<?php if($row['boton_superior']) { ?>
				                				<?php echo '<a class="'. $row['clase_boton'] . '" href="'. site_url() . "/" . $this->uri->segment(1) . "/" . $this->uri->segment(2) ."/".  $keyp . '"><i class="'. $row['icono'] . '"></i> ' . $row['texto_anchor'] . '</a>';  ?>
				                			<?php } ?>
				                		<?php } ?>
				                	<?php } ?>
                                    <h2>Grupos Fields</h2>
                            </div>
	                		<div class="span12">
	                			<?php $this->load->file('includes/buscador.php');?>
	                		</div>
                	</div>
                	<div class="row">
                		<div class="alert alert-success span12 mensajes margin-top-10" id="resultado-operacion" style="display: none;"><span><i id="icono-mensaje" class=""></i> </span> <span id="texto-mensaje"></span></div>
                	</div>
        </div>

        <div class="span12">
            	<?php
	            	if(isset($errormsg)) {
	            		$data['estado'] = "error";
	            	} else if(isset($message)) {
	            		$data['estado'] = "success";
	            	}
					if(isset($data)) {
						$this->load->view('general/mensaje_operacion', $data); 
					}
	            ?>     
                <table id="tabla" class="table table-striped table-bordered display">

                        <thead>
                                <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                </tr>
                        </thead>

                        <tbody>
                                <?php 
                                	if(!empty($grupos_fields)) {
                                		foreach($grupos_fields as $grupo_field)
                                        {
                                            echo "<tr>";
                                            	echo "<td>";
													echo $grupo_field['grupos_fields_id'];
												echo "</td>";
												
												echo "<td>";
													echo $grupo_field['grupos_fields_nombre'];
												echo "</td>";
												
												echo "<td>";
														
														if(count($data_menu) > 0) {
															$band = 0;
		                                                    foreach ($data_menu as $keyp => $row) {
									               				if(!$row['boton_superior']) {
									               					$band +=1;
									               					if(isset($row['titulo'])) {
									               						$atributos = array('data-original-title' => $row['titulo'], 'class' => $row['clase_boton']);
									               					} else {
									               						$atributos = array('class' => $row['clase_boton']);
									               					}
									               					echo anchor($this->uri->segment(1) ."/". $this->uri->segment(2) ."/". $keyp . '/' . $grupo_field['grupos_fields_id'], '<i class="' . $row['icono'] . '"></i> ' . $row['texto_anchor'], $atributos);
									                				//Fix espacio entre botones
									                				echo ' ';
																}
									                		}
															if($band == 0) {
																echo '<i class="icon-remove"></i> No tienes acciones disponibles';
															}
									                	} else {
									                		echo '<i class="icon-remove"></i> No tienes acciones disponibles';
									                	}
												echo "</td>";
                                            echo "</tr>";
                                        }
                                	}
                                ?>
                        </tbody>
                </table>                                
        </div>						
	</div>		