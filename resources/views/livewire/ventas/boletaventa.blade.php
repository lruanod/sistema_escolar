<!doctype html>
<html lang="es">
<head>
    <title>Boleta</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-2">
        <section style=" border-width: 4px; border-style: ridge; border-color: #1a1e21">
            <img id="logo" src="./img/logo.png" width="225" height="125"  alt="logo" style="margin-left: 7px; border: 5px solid #000000">
            <br>
            @foreach($ventas as $venta)
            No.{{$venta->id}}<br>
            Fecha:&nbsp;{{\carbon\carbon::parse($venta->created_at)->format('d/m/Y')}}<br>
            Cliente:&nbsp;{{$venta->cliente}}<br>
            Tipo:&nbsp;{{$venta->tipo}}<br>
            @endforeach
                <table>
                    <tbody>
                    <tr>
                        <td>PRODUCTO&nbsp;</td>
                        <td>CANTIDAD&nbsp;</td>
                        <td>PRECIO&nbsp;</td>
                        <td>DESCUENTO&nbsp;</td>
                        <td>TOTAL&nbsp;</td>
                    </tr>
            @foreach($detalles as $detalle)
                   <tr>
                       <td>{{$detalle->producto->nombre}}</td>
                       <td>{{$detalle->cantidad}}</td>
                       <td>{{$detalle->preciod}}</td>
                       <td>{{$detalle->descuentod}}</td>
                       <td>{{$detalle->subtotal}}</td>
                   </tr>
                @endforeach
            @foreach($ventas as $venta)
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Total descuentos:</td>
                            <td>{{$venta->descuentov}}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Total :</td>
                            <td>{{$venta->total}}</td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
        </section>
</div>
</div>
</body>

</html>


