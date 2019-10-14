

$( function() {

			
				// ventana de ingreso y edición de usuario
				$( "#popup" ).dialog({
				  autoOpen: false,
				  modal: true,
				  width: 500,
				  close: limpiarPopup,
				  show: {
					effect: "blind",
					duration: 1000
				  },
				  hide: {
					effect: "explode",
					duration: 1000
				  },
				  open: function () {
						$(this).parent().promise().done(function () {
							var id_usr=$("#id_usuario_selec").val();
							var marca=$("#bandera").val();

							if(marca=='1'){//es edicion de datos, completamos el formulario despues de haber cargado el modal por completo
							
							
								   var nom_usr = $("#nom_usr_"+id_usr).text();
								   var ape_usr = $("#ape_usr_"+id_usr).text();
								   var email_usr = $("#correo_usr_"+id_usr).text();
								   var pass_usr = $("#pass_usr_"+id_usr).val();
								   var usr_usr = $("#usr_usr_"+id_usr).text();
								   
								   $("#formulario_pop").find("#id").val(id_usr);
								   $("#formulario_pop").find("#nom").val(nom_usr);
								   $("#formulario_pop").find("#ape").val(ape_usr);
								   $("#formulario_pop").find("#email").val(email_usr);
								   $("#formulario_pop").find("#user").val(usr_usr);
								   $("#formulario_pop").find("#password").val(pass_usr);
							
							}
						});
					}
				  
				});
			 
				//se abre popup de registro de usuario
				$( "#regusr" ).on( "click", function() {
				
					limpiarPopup();
					$("#bandera").val('0');
				
					
					$( "#popup" ).dialog( "open" );
				});
				
				//se abre popup de editar registro de usuario
				$('.editar').click(function(){
				   var id_usr = this.id;
				    $("#id_usuario_selec").val(id_usr);
				   $("#bandera").val('1');
				   
				   $( "#popup" ).dialog( "open" ); 

	
				});
				
				// abre alerta de confirmación de eliminación de usuario
				$('.eliminar').click(function(){
					$("#deleteid").val(this.id);
					$( "#poup_eliminar" ).dialog( "open" );
				   
				});
			
			
				//popup que pregunta si desea realmente eliminar registro de usuario
				$( "#poup_eliminar" ).dialog({
				  resizable: false,
				  autoOpen: false,
				  height: "auto",
				  width: 400,
				  modal: true,
				  buttons: {
					"Aceptar": function() {
					
						/* funcionalidad para eliminar registro */
						
						var idv = $("#deleteid").val();
						var deletePostUri = "borra/"+idv;
						
						$.ajax({
						   type: "GET",
						  url:deletePostUri,
						   success: function(data)
						   {
								if(data=='0'){
									location.reload();
								}else{
								
									$("#mensajeErrorBorrar").show();
									
								}
							   
							   
						   },
						   error: function (data) {
					
								$("#mensajeErrorBorrar").show();
							},
						 });
						
						
						/****************************************/
						
					  $( this ).dialog( "close" );
					},
					Cancelar: function() {
					
						$("#deleteid").val("");
					
					  $( this ).dialog( "close" );
					}
				  }
				});
				
				
				//si presiona el boton guardar de formulario de editar o guardar usuario
				$("#formulario_pop").submit(function(e) {
				
					var action='';
					if($("#bandera").val()=='0'){//registro de usuario
						action='add';
						
					}else{// editar usuario
						action='edit';
					}
					
					$("#mesajeResultado").text("");
					e.preventDefault();

					var form = $(this);

					$.ajax({
						   type: "POST",
						   url: action,
						   data: form.serialize(),
						   success: function(data)
						   {
								if(data=='0'){
									location.reload();
								}else{
								
									$("#mesajeResultado").text("Ha ocurrido un error mientras se registraba el usuario: "+data);
									$("#mesajeResultado").show();
								}
							   
						   },
						   error: function (data) {
					
								$("#mesajeResultado").text("Ha ocurrido un error mientras se registraba el usuario.");
								$("#mesajeResultado").show();
							},
						 });


				});
				
				
				
} );//fin carga de pagina
			  
			  
// funcion que se ejecuta cuando se cierra el popup
function limpiarPopup(){
	$("#mesajeResultado").hide();
	$("#mesajeResultado").text("");
	$("#formulario_pop").get(0).reset();

}