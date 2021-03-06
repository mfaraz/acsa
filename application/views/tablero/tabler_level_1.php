<?php $this->load->file('includes/datatables_files.php'); ?>
<style>
#tabla_info {
	display: none;
}
</style>
<script>
	$(function() {
		$objInit = $.extend( {}, objInit, { 
			"aoColumnDefs": [ 
								{ "bSortable": false, "aTargets": [ 0 ] } 
							] 
			} );

	    var $tabla = $('#tabla').dataTable($objInit);
	    
	    $('#tabla').on('eliminarFila', function(event, param) {
			if( param.fila ) {
				$tabla.fnDeleteRow( param.fila[0] )
			}
		});

		var qs = $('input#id_search').quicksearch('table tbody tr', {
			'selector': 'td.id'
		});
		var qsa = $('input#anio_search').quicksearch('table tbody tr', {
			'selector': 'td.valor'
		});
		var qsm = $('input#mes_search').quicksearch('table tbody tr', {
			'selector': 'td.campo'
		});
		$('input#id_search').on('actualizarTabla', function(event) {
			qs.cache();
		});
	});
</script>

<div class="row">
        <div class="span12 margin-bottom-10">
                	<div class="row relativo">
	               			<div class="span12">
                            <?php echo form_open($this->uri->uri_string()); ?>
                            	<?php if(isset($data_menu)) { ?>
			                		<?php foreach ($data_menu as $keyp => $row) { ?>
			               				<?php if($row['boton_superior'] && ($keyp == $this->uri->segment(3))) { ?>
			                				<?php echo '<input type="submit" class="'. $row['clase_boton'] . '" value="' . $row['texto_anchor'] . '" />';  ?>
			                			<?php } ?>
			                		<?php } ?>
			                	<?php } ?>
                                    <h2>Detalle de Composición del Indicador</h2>
                                    <!--<input type="submit" class="btn btn-primary btn-large firmar" value="Firmar!" />-->
                            </div>
	                		<div class="span12 filtros" style="display: none;">
	                			<input type="text" name="search" value="" id="id_search" class="input-medium search-query span3 " placeholder="Filtrar por ID" data-index="1"/>

	                			<input type="text" name="search" value="" id="mes_search" class="input-medium search-query span2 " placeholder="Filtrar por Campo" data-index="1"/>

	                			<input type="text" name="search" value="" id="anio_search" class="input-medium search-query span2 " placeholder="Filtrar por Valor" data-index="1"/>
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

                

                                                        <table class="table display table-striped table-bordered" id="tabla">

                                                                <thead>
                                                                        <tr>
                                                                                <?php if(isset($data_menu)) { ?><th width="10"><!--<input type="radio" class="check_all" />--></th> <?php } ?>
                                                                                <th>ID</th>
                                                                                <th>Campo</th>
                                                                                <th>Valor</th>
                                                                        </tr>
                                                                </thead>

                                                                <tbody>
                                                                        <?php 
                                                                                foreach($ewarrants as $ew)
                                                                                {
                                                                                    echo "<tr>";
                                                                                    if(isset($data_menu)) { echo '<td><input type="radio" name="ewid" value= "'.$ew['id'].'" /></td>'; };
                                                                                    //echo '<td class="id">' . $ew['id'] .'</td>';
                                                                                    echo '<td class="id">';
                                                                                    echo  $ew['id'];
                                                                                    echo '</td>';
                                                                                    echo '<td class="campo">' . $ew['campo'] .'</td>';
                                                                                    echo '<td class="valor">' . $ew['valor'] .'</td>';
                                                                                    echo "</tr>";
                                                                                }
                                                                        ?>
                                                                </tbody>

                                                        </table>

                                </form>
                                                                              
                            </div>		
                            <!-- .block_content ends -->
					
	</div>		
<!-- .block ends -->