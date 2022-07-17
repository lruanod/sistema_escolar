<!doctype html>
<html lang="es">
<head>
    <title>Boleta</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="row">
    <h5>De {{\carbon\carbon::parse($inicio)->format('d/m/Y')}} a {{\carbon\carbon::parse($final)->format('d/m/Y')}}</h5>
    <br>
    <div class="col-2">
        @foreach($ventas as $venta)
        <section style=" border-width: 4px; border-style: ridge; border-color: #1a1e21; page-break-inside: avoid">
            <section>
            <br>
            No.{{$venta->id}}<br>
            Fecha:&nbsp;{{\carbon\carbon::parse($venta->created_at)->format('d/m/Y')}}<br>
            Cliente:&nbsp;{{$venta->cliente}}<br>
            Tipo:&nbsp;{{$venta->tipo}}<br>
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
                @if($detalle->venta_id == $venta->id)
                   <tr>
                       <td>{{$detalle->producto->nombre}}</td>
                       <td>{{$detalle->cantidad}}</td>
                       <td>{{$detalle->preciod}}</td>
                       <td>{{$detalle->descuentod}}</td>
                       <td>{{$detalle->subtotal}}</td>
                   </tr>
                @endif
            @endforeach
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
                    </tbody>
                </table>
            </section>
        </section>
            <br>

        @endforeach

            <span>Total:&nbsp;{{$total}}</span>
            <br>
            <span>Descuento:&nbsp;{{$descuento}}</span>
            <br>
            <span>Liquido:&nbsp;{{$liquido}}</span>
</div>
    </div>
</body>

</html>


