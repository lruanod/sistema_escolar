<!doctype html>
<html lang="es">
<head>
    <title>Boleta</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="row">
    <br>

        <section style=" border-width: 4px; border-style: ridge; border-color: #1a1e21; page-break-inside: avoid">
            <div class="table-responsive ">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Codigo
                        </th>
                        <th>
                            Producto
                        </th>
                        <th>
                            Descripción
                        </th>
                        <th>
                            Stock
                        </th>
                        <th>
                            Precio
                        </th>
                        <th>
                            Descuento
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            Categoria
                        </th>
                    </tr>
                    </thead>
                    <tbody class="text-dark">
                    @foreach($productos as $producto)
                        <tr>
                            <td>
                                {{$producto->id}}
                            </td>
                            <td>
                                {{$producto->nombre}}
                            </td>
                            <td>
                                {{$producto->descripcion}}
                            </td>
                            <td>
                                {{$producto->stock}}
                            </td>
                            <td>
                                {{$producto->precio}}
                            </td>
                            <td>
                                {{$producto->descuento}}
                            </td>
                            <td>
                                {{$producto->estado}}
                            </td>
                            <td>
                                {{$producto->categoria->nombrec}}
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


