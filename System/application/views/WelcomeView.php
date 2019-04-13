<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome to CodeIgniter</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			.card{
				float: right;
				margin: 2% 2% 2% 2%;
			}

			.checked{
				color:orange;
			}

			.fa-star{
				margin-right: 2%;
			}
		</style>
	</head>
	<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="btn btn-outline-success my-2 my-sm-0" href="<?php echo site_url('Login/cerrarSesion'); ?>">Cerrar sesión <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
		<div class="card" style="width: 30%;">
			<div class="card-body">
				<div class="container" id="contenedor-canciones">										
				</div>
				<div class="d-flex justify-content-end">
					<button id="btn_calificar" class="btn btn-primary">Calificar</button>
				</div>								
  			</div>
		</div>

		<script>
		$(document).ready(function () {			
			if(localStorage.cancionesCalificadas == null){				
				var cancionesCalificadas = ["hola", "adios"];
				localStorage.setItem("cancionesCalificadas", JSON.stringify(cancionesCalificadas));
			}
			obtenerCanciones();
			calificarCancion();
		});

		function calificarCancion(){
			$('#btn_calificar').on('click', function () {
				var canciones = $('#contenedor-canciones .cancion');
				var cancionesConCalificacion = obtenerInformacionCanciones(canciones);
				//var cancionesCalificadas = JSON.parse(localStorage.cancionesCalificadas);				

				$.ajax({
                method: 'POST',		
				data: {'calificaciones':cancionesConCalificacion},		
                url: "<?php echo site_url('Welcome/calificarCanciones'); ?>",                
                }).done(function(response) {
					console.log(response);
            });
			});
		}

		function obtenerInformacionCanciones(canciones){
			var cancionesCalificadas = [];
			$.each(canciones, function(index, cancion){
				var cancionCalificada = { 
					can_id: $(cancion).data('idcancion'),
					calificacion: $(cancion).find('select').val()
				};
				cancionesCalificadas.push(cancionCalificada);
			});
			return cancionesCalificadas;
		}

		function obtenerCanciones()
		{
			$.ajax({
                method: 'GET',
				dataType: 'json',
                url: "<?php echo site_url('Welcome/obtenerCanciones'); ?>",                
                }).done(function(response) {
					$('#contenedor-canciones').empty();					
					$.each(response, function (i, cancion) {
						crearObjetoCancion(cancion);					
					});
            });
		}

		function crearObjetoCancion(cancion){
			var objetoCancion = '<div class="row cancion" data-idcancion='+ cancion.can_id +'>';
				objetoCancion += '<div class="card" style="width: 100%;">';
				objetoCancion += '<div class="card-body">';
				objetoCancion += '<h5 class="card-title">'+ cancion.can_titulo +'</h5>';
				objetoCancion += '<div class="row">';
				objetoCancion += '<div class="col col-md-8">';
				objetoCancion += '<p class="card-text">'+ cancion.art_nombre +'</p>';
				objetoCancion += '</div>';
				objetoCancion += '<div class="col col-md-4">';
				objetoCancion += '<div class="form-group">';
				objetoCancion += '<label for="exampleFormControlSelect1">Calificación</label>';
				objetoCancion += '<select class="form-control" id="exampleFormControlSelect1">';
				objetoCancion += '<option value="1">1</option>';
				objetoCancion += '<option value="2">2</option>';
				objetoCancion += '<option value="3">3</option>';
				objetoCancion += '<option value="4">4</option>';
				objetoCancion += '<option value="5">5</option>';
				objetoCancion += '</select>';
				objetoCancion += '</div>';
				objetoCancion += '</div>';
				objetoCancion += '</div>';
				objetoCancion += '</div>';
				objetoCancion += '</div>';
			objetoCancion += '</div>';
			$('#contenedor-canciones').append(objetoCancion);
		}
		</script>
	</body>
</html>