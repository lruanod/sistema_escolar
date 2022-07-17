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
            <div class="table-responsive ">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Producto
                        </th>
                        <th>
                            Descripción
                        </th>
                        <th>
                            Precio anterior
                        </th>
                        <th>
                            Precio entrada
                        </th>
                        <th>
                            Catidad anterior
                        </th>
                        <th>
                            Catidad entrada
                        </th>
                        <th>
                            Catidad disponible
                        </th>
                        <th>
                            Descripción de entrada
                        </th>
                    </tr>
                    </thead>
                    <tbody class="text-dark">
                    @foreach($entradas as $entrada)
                        <tr>
                            <td>
                                {{\carbon\carbon::parse($entrada->created_at)->format('d/m/Y')}}
                            </td>
                            <td>
                                {{$entrada->producto->nombre}}
                            </td>
                            <td>
                                {{$entrada->producto->descripcion}}
                            </td>
                            <td>
                                {{$entrada->precioa}}
                            </td>
                            <td>
                                {{$entrada->precioe}}
                            </td>
                            <td>
                                {{$entrada->stocka}}
                            </td>
                            <td>
                                {{$entrada->stocke}}
                            </td>
                            <td>
                                {{$entrada->stockt}}
                            </td>
                            <td>
                                {{$entrada->descripcione}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </section>
</div>
</body>

</html>


