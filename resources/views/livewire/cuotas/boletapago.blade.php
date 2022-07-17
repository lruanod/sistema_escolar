<!doctype html>
<html lang="es">
<head>
    <title>Boleta</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-3">
        <section style=" border-width: 4px; border-style: ridge; border-color: #1a1e21">
        <img id="logo" src="./img/logo.png" width="225" height="125"  alt="logo" style="margin-left: 7px; border: 5px solid #000000">
        <h3 class="text-center">Boleta de Pago</h3>
        <table class="table table-bordered" >
            @foreach($cuotas as $cuota)
                <tr>
                    <td>
                        No.
                    </td>
                    <td>
                        {{$cuota->id}}
                    </td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td>

                        {{\carbon\carbon::parse($cuota->cfecha)->format('d/m/Y')}}
                    </td>
                </tr>

                <tr>
                    <td>Estudiante:</td>
                    <td>
                        {{$cuota->asignaciongrado->estudiante->enombre}}
                    </td>
                </tr>
                <tr>
                    <td>Correlativo:</td>
                    <td>
                        {{$cuota->asignaciongrado->estudiante->id}}
                    </td>
                </tr>
                <tr>
                    <td>Grado:</td>
                    <td>
                        Grado:&nbsp;{{$cuota->ngrado}}&nbsp;Sección:&nbsp;{{$cuota->asignaciongrado->grado->gseccion}}
                    </td>
                </tr>
                <tr>
                    <td>Nivel:</td>
                    <td>
                        {{$cuota->asignaciongrado->grado->nivel->nnombre}}
                    </td>
                </tr>
                </tbody>
        </table>
        <h3 class="text-center">Detalle</h3>
        <table class="table table-bordered">
            <thead  class="thead-primary">
            <tr>
                <th>
                    Mes
                </th>
                <th>
                    Mensualidad
                </th>
                <th>
                    Total
                </th>
            </tr>
            </thead>
                <tr>
                    <td>
                            @if($cuota->mes == '01')
                                ENERO
                            @endif
                            @if($cuota->mes == '02')
                                FEBRERO
                            @endif
                            @if($cuota->mes == '03')
                                MARZO
                            @endif
                            @if($cuota->mes == '04')
                                ABRIL
                            @endif
                            @if($cuota->mes == '05')
                                MAYO
                            @endif
                            @if($cuota->mes == '06')
                                JUNIO
                            @endif
                            @if($cuota->mes == '07')
                                JULIO
                            @endif
                            @if($cuota->mes == '08')
                                AGOSTO
                            @endif
                            @if($cuota->mes == '09')
                                SEPTIEMBRE
                            @endif
                            @if($cuota->mes == '10')
                                OCTUBRE
                            @endif
                    </td>
                    <td>
                        Q.{{$cuota->abono}}
                    </td>
                    <td>
                        Q.{{$cuota->abono}}
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
        </section>
    </div>



</div>
</body>

</html>


