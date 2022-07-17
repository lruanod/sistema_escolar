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

        <section style=" border-width: 4px; border-style: ridge; border-color: #1a1e21; page-break-inside: avoid">
            <img id="logo" src="./img/logo.png" width="225" height="125"  alt="logo" style="margin-left: 7px; border: 5px solid #000000">
            <div class="table-responsive ">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Estudiante
                        </th>
                        <th>
                            Grado
                        </th>
                        <th>
                            Sección
                        </th>
                        <th>
                            Nivel
                        </th>
                        <th>
                            Abono
                        </th>
                        <th>
                            Mes pagado
                        </th>
                        <th>
                            Ciclo
                        </th>
                    </tr>
                    </thead>
                    <tbody class="text-dark">
                    @foreach($cuotas as $cuota)
                        <tr>
                            <td>
                                {{\carbon\carbon::parse($cuota->cfecha)->format('d/m/Y')}}
                            </td>
                            <td>
                                {{$cuota->asignaciongrado->estudiante->enombre}}
                            </td>
                            <td>
                                Grado:&nbsp;{{$cuota->asignaciongrado->grado->gnombre}}
                            </td>
                            <td>
                                Sección:&nbsp;{{$cuota->asignaciongrado->grado->gseccion}}
                            </td>
                            <td>
                                {{$cuota->asignaciongrado->grado->nivel->nnombre}}
                            </td>
                            <td>
                                Q.{{$cuota->abono}}
                            </td>
                            <td>
                                {{$cuota->mes}}
                            </td>
                            <td>
                                {{$cuota->asignaciongrado->ciclo->ano}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    <span>Total de mensualidades pagadas-->&nbsp;Q.{{$total}}</span>
</div>
</body>

</html>


