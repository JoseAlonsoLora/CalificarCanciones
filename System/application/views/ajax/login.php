
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body class="text-center">
        <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
            <form class="form-signin" id="formLogin">            
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <button id="btnEnviar" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>            
        </form>
            </div>
            <div class="col"></div>
        </div>
        </div>
        
    </body>

    <script>
    $(document).ready(function (){
        $('#formLogin').on('submit', function (e) {
            var username = $('#inputUsername').val();
            var password = $('#inputPassword').val();            
            e.preventDefault();            
            $.ajax({
                method: 'POST',
                url: "<?php echo site_url('Pacienteajax/validarlogin'); ?>",
                data: {'username': username, 'paassword': password }
                }).done(function() {
                $( this ).addClass( "done" );
            });
        });
    });
    </script>
</html>