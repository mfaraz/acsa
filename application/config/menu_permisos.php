<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Definicion para el contenido de menues basados en permisos
 * Notas:
 * texto_anchor: Es el texto a mostrar en pantalla para el boton
 * icono: Es la imagen que va a la izquierda del texto_anchor
|--------------------------------------------------------------------------
*/
# Mensajes generales
####################################################################################
$config['error_sin_permiso'] = array('texto' => 'No tienes permisos suficientes para realizar ninguna accion aqui', 'icono' => 'icon-minus-sign');
$config['ewarrant_confirmacion_firma'] = array('texto' => 'El eWarrant se ha firmado correctamente!', 'icono' => 'icon-ok');
$config['ewarrant_confirmacion_anulacion'] = array('texto' => 'El eWarrant se ha anulado correctamente!', 'icono' => 'icon-ok');
$config['ewarrant_error_firmado'] = array('texto' => 'El eWarrant ya esta firmado!', 'icono' => 'icon-remove');
$config['ewarrant_error_not_owner'] = array('texto' => 'No puedes firmar el eWarrant porque fuiste tu quien lo dio de alta!', 'icono' => 'icon-remove');
$config['ewarrant_error_no_puede_firmar'] = array('texto' => 'No puedes anular el eWarrant porque no fuiste tu quien lo dio de alta!', 'icono' => 'icon-remove');
$config['ewarrant_error_ya_anulado'] = array('texto' => 'El eWarrant ya esta anulado!', 'icono' => 'icon-remove');


# Menu gestion eWarrants
####################################################################################
$config['emitir'] = array('texto_anchor' => 'Emitir', 'icono' => 'icon-plus-sign', 'boton_superior' => false);
$config['listar'] = array('texto_anchor' => 'Listar', 'icono' => 'icon-info-sign', 'boton_superior' => false);
$config['firma']  = array('texto_anchor' => 'Firmar', 'icono' => 'icon-ok-sign', 'boton_superior' => true, 'clase_boton' => 'btn btn-large btn-success enviar absoluto-r0-b0 margin-bot-none pull-right');
$config['anular'] = array('texto_anchor' => 'Anular', 'icono' => 'icon-remove-sign', 'boton_superior' => true, 'clase_boton' => 'btn btn-large btn-danger enviar absoluto-r0-b0 margin-bot-none pull-right');

# Menu gestion Seguridad
# Notas:
# texto_anchor: Es el texto a mostrar en pantalla para el boton
# icono: Es la imagen que va a la izquierda del texto_anchor
# titulo_gestion: El titulo que va arriba del box que especifica la gestion
####################################################################################
$config['gestionar_roles'] = array('texto_anchor' => 'Gestionar Roles', 'icono' => 'icon-tag', 'titulo_gestion' => 'Roles');
$config['gestionar_usuarios'] = array('texto_anchor' => 'Gestionar Usuarios', 'icono' => 'icon-user', 'titulo_gestion' => 'Usuarios');

# Menu gestion Seguridad => Gestionar Roles
# Notas:
# texto_anchor: Es el texto a mostrar en pantalla para el boton
# icono: Es la imagen que va a la izquierda del texto_anchor
# clase_boton: Especifica la clase a implementar por el boton
# boton_superior: Especifica si el boton va en la parte superior de la pantalla
####################################################################################
$config['nuevo_role'] = array('texto_anchor' => 'Nuevo Role', 'icono' => 'icon-plus icon-white', 'clase_boton' => 'btn btn-large btn-success pull-right', 'boton_superior' => true, 'titulo' => false);
$config['modificar_role'] = array('texto_anchor' => 'Modificar', 'icono' => 'icon-pencil icon-white', 'clase_boton' => 'btn btn-info editar-role margin-bottom-5', 'boton_superior' => false, 'titulo' => false);
$config['eliminar_role'] = array('texto_anchor' => 'Eliminar', 'icono' => 'icon-trash', 'clase_boton' => 'btn btn-danger eliminar-role margin-bottom-5', 'boton_superior' => false, 'titulo' => "Confirma que desea eliminar el role?");

# Menu gestion Seguridad => Gestionar Roles
# Notas:
# texto_anchor: Es el texto a mostrar en pantalla para el boton
# icono: Es la imagen que va a la izquierda del texto_anchor
# clase_boton: Especifica la clase a implementar por el boton
# boton_superior: Especifica si el boton va en la parte superior de la pantalla
####################################################################################
$config['registro'] = array('texto_anchor' => 'Agregar Usuario', 'icono' => 'icon-user icon-white', 'clase_boton' => 'btn btn-large btn-success pull-right', 'boton_superior' => true, 'titulo' => false);
$config['editar_usuario'] = array('texto_anchor' => 'Editar', 'icono' => 'icon-pencil icon-white', 'clase_boton' => 'btn btn-info editar-usuario margin-bottom-5', 'boton_superior' => false, 'titulo' => false);
$config['cambiar_email'] = array('texto_anchor' => 'Cambiar email', 'icono' => 'icon-pencil icon-white', 'clase_boton' => 'btn cambiar-email-usuario btn-primary margin-bottom-5', 'boton_superior' => false);
$config['cambiar_password'] = array('texto_anchor' => 'Cambiar Password', 'icono' => 'icon-pencil icon-white', 'clase_boton' => 'btn cambiar-email-usuario btn-primary margin-bottom-5', 'boton_superior' => false);
$config['eliminar_user'] = array('texto_anchor' => 'Eliminar', 'icono' => 'icon-trash', 'clase_boton' => 'btn btn-danger eliminar-usuario margin-bottom-5', 'boton_superior' => false, 'titulo' => "Confirma que desea eliminar el usuario?");