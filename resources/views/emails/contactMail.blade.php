<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
<img width="200px" height="150px" src="{{ $message->embed(public_path('images/product/mensaje.jpg')) }}">
<br>
<h2>Datos del cliente</h2>
<br><strong> Cliente: </strong> {{$data['name']}}
<br><strong> Email del cliente: </strong> {{$data['email']}}
<h2>Datos del pedido</h2>
<strong> Asunto: </strong> {{$data['affair']}}
<br><strong> Mensaje: </strong> {{$data['message']}}


</body>
</html>
