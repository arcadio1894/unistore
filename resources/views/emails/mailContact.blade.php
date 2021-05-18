<!DOCTYPE html>
<html>
 <head>
  <title>Message</title>
 </head>
 <body>
    <p><strong> Estos son los datos del usuario que ha realizado la consulta: </strong> </p>
    <li> <strong>Mensaje: </strong>{{ $attribute['message'] }}</li>
        <li><strong>Correo: </strong>{{ $attribute['email'] }}</li>
        <li><strong>Nombre: </strong>{{ $attribute['name'] }}</li>
        <li><strong>Telefono: </strong> {{ $attribute['phone'] }}</li>
 </body>
</html>