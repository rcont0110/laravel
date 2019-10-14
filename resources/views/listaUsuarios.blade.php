<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
			<title>READ usuario</title>
			<link rel="stylesheet" href="{{ asset('css/app.css') }}"/>

			<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet"/>

			<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
			
			<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
			
			<script type="text/javascript" src="{{ asset('js/crud.js') }}"></script>


	</head>
	<body>

		<div class="card">
			<div class="card-body">
				<!-- encabezado de la card -->
				<h2 class="card-title">LISTA DE USUARIOS:</h2>
				<p class="card-text">
					<button class="ui-button ui-widget ui-corner-all" id="regusr">
						<span class="ui-icon ui-icon-plus"></span> Nuevo Usuario
					</button>
				</p>
				<p class="card-text">
					<div class="alert alert-danger alert-dismissible fade show" id="mensajeErrorBorrar" style="display: none;">   
						<strong>Eliminación de Usuario</strong> Error eliminando registro de usuario
					</div>
				</p>
				<!-- fin encabezado card -->
				<!-- comienza tabla donde se despliegan los datos de usuario -->
				
				@if (count($usuarios) > 0)
					<table id="grid-basic" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>NOMBRES</th>
								<th>APELLIDOS</th>
								<th>USUARIO</th>
								<th>EMAIL</th>
								<th>ACCIÓN</th>
							</tr>
						</thead>
						<tbody>
							<!-- esta parte es dinamica segun los registros que existan -->
							
								@foreach ($usuarios as $usuario)
									<tr>
										<td>
											<label for="id_usr" id="{{ 'id_usr_'.$usuario->id }}">{{ $usuario->id }}</label>
										</td>
										<td>
											<label for="nom_usr_1" id="{{ 'nom_usr_'.$usuario->id }}">{{ $usuario->nombres }}</label>
										</td>
										<td>
											<label for="ape_usr_1" id="{{ 'ape_usr_'.$usuario->id }}">{{ $usuario->apellidos }}</label>
										</td>
										<td>
											<label for="nom_usr" id="{{ 'usr_usr_'.$usuario->id }}">{{ $usuario->user }}</label>
											<input type="hidden" id="{{ 'pass_usr_'.$usuario->id }}" value="{{ $usuario->pass }}">
										</td>
										<td>
											<label for="email_usr" id="{{ 'correo_usr_'.$usuario->id }}">{{ $usuario->email }}</label>
										</td>
										<td>
											<button class="ui-button ui-widget ui-corner-all ui-button-icon-only editar" title="Editar" id="{{ $usuario->id }}">
												<span class="ui-icon ui-icon-pencil"></span> Editar
											</button>
											<button class="ui-button ui-widget ui-corner-all ui-button-icon-only eliminar" title="Eliminar" id="{{ $usuario->id }}">
												<span class="ui-icon ui-icon-trash"></span> Eliminar
											</button>
										</td>
									</tr>

								@endforeach
							
							<!-- fin desplegar datos dinamico -->
						</tbody>
					</table>
				
				<!-- fin tabla -->
				<!-- si no hay registros de usuarios le desplegamos al usuario el mensaje -->
				@else
					<div class="card-footer text-muted">
							No existen registros de usuarios
					</div>
				@endif
			
			</div><!-- fin card body -->
		</div><!-- fin card -->
	

		<!-- popup de ingreso y edición de usuario -->
		<div id="popup" title="">
			<div id="contendor-form" title="Registro de Usuario">
				<input type="hidden" value="" id="bandera">
				<p>(*) Datos Requeridos.</p>
				<form id="formulario_pop">
					{{ csrf_field() }}
					<fieldset>
						<input type="hidden" name="id_usuario_selec" id="id_usuario_selec" value="">
						<input type="hidden" name="id" id="id" value="">
						
						<label for="name">Nombres (*)</label>
						<input type="text" name="nombres" id="nom" value="" class="text ui-widget-content ui-corner-all" required>
						
						<label for="apellidos">Apellidos (*)</label>
						<input type="text" name="apellidos" id="ape" value="" class="text ui-widget-content ui-corner-all" required>

						<label for="email">Email (*)</label>
						<input type="email" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" required>

						<label for="user">User (*)</label>
						<input type="user" name="user" id="user" value="" class="text ui-widget-content ui-corner-all" required>

						<label for="password">Password (*)</label>
						<input type="password" name="pass" id="password" value="" class="text ui-widget-content ui-corner-all" required>
						
						<br>
						<div class="alert alert-danger" style="display: none;" role="alert" id="mesajeResultado"></div>
						<br>
						
						<input type="submit" value="Guardar">
						
					</fieldset>
				</form>
			</div>
		</div>
		<!-- fin popup -->

		<!-- inicio confirma dialog de eliminacion de registro -->
		<div id="poup_eliminar" title="ELIMINACIÓN DE USUARIO:">
			<p>
				<span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
				<input type="hidden" value="" id="deleteid">
					¿Confirma la eliminación del usuario?
			</p>
		</div>
		<!-- fin delete confirm -->
		

	</body>
</html>