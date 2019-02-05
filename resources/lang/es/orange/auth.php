<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

	'fields' =>[
		'email' => 'Correo electrónico',
		'password' => 'Contraseña',
		'passwordConfirm' => 'Confirmar contraseña',
		'remember' => 'Recordarme',
		'enterprise' => 'Empresa',
		'territory' => 'Territorio',
		'name' => 'Nombre',
		'surname1' => 'Primer apellido',
		'surname2' => 'Segundo apellido',
		'department' => 'Departamento',
		'position' => 'Posición',
		'phone' => 'Teléfono',
	],
	'login' =>[
		'button' => 'Acceder',
		'forgotLink' => "¿Recuperar?",
		'registerLink' => '¿Aún no tiene una cuenta?',
		'backLink' => 'Volver al acceso',
	],
	'register' =>[
		'button' => 'Registrar',
		'loginLink' => '¿Ya tiene una cuenta?',
		'verifyTitle' => 'Verifique su correo',
		'verifyHint' => 'Antes de continuar, por favor revise su correo electrónico para obtener un enlace de verificación.',
		'verifyLinkIntro' => 'Si no recibió el correo electrónico',
		'verifyLinkClick' => 'haga clic aquí para solicitar otro',
		'verifyNotification' => 'Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.'
	],
	'forgot' =>[
		'button' => 'Restablecer la contraseña',
		'resetTitle' => 'Restablecer la contraseña'
	],
];