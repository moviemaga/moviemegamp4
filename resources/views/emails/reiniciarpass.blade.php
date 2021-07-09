<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Hola {{ $email}}, gracias por registrarte en <strong>www.movie-mega-mp4.com</strong> !</h2>
<p>Por favor para reiniciar tu contraseña.</p>
<p>debes hacer click en el siguiente enlace:</p>


<a href="{{ url('/actualizarpassform/'.$remember_token.'/'.$email)}}">
    Clic para confirmar tu email
</a>
</body>
</html>
