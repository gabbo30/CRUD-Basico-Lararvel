<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body id="app">
    <script>
        var res=function()
        {
            var not=confirm("¿Deseas eliminar el registro?");
            return not;
        }
    </script>
    <h1 class="text-center p-3">CRUD Laravel </h1>

    <div class="p-5 table-responsive">
        @if (session("Bien"))
            <div class="alert alert-success alert-dismissible fade show">
                {{session("Bien")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session("Mal"))
            <div class="alert alert-danger alert-dismissible fade show">
                {{session("Mal")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <button data-bs-toggle="modal" data-bs-target="#agregar_producto" class="btn btn-primary p-b-3">Agregar Producto</button>
        <table class="table table'striped">
            <thead>
                <tr>
                    <th scope="col">Código (ID)</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->product_name}}</td>
                        <td>${{$item->price}}</td>
                        <td>{{$item->stock}}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editar_producto{{$item->id}}"> Editar </a>
                            <a href='{{route("crud.delete", $item->id)}}' onclick="return res()" class="btn btn-danger btn-sm"> Eliminar</a>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editar_producto{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action='{{route("crud.update")}}' method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <!-- <label for="codigo" class="form-label">Código Producto:</label> -->
                                        <input type="hidden" class="form-control" id="codigo" name="codigo" value="{{$item->id}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre De Producto:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$item->product_name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="precio" class="form-label">Precio:</label>
                                        <input type="text" class="form-control" id="precio" name="precio" value="{{$item->price}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Stock:</label>
                                        <input type="number" class="form-control" id="stock" name="stock" value="{{$item->stock}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Modificar</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <!-- <button type="button" class="btn btn-primary">Modificar</button> -->
                            </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </tbody>
        </table>
        <!-- Modal Add -->
        <div class="modal fade" id="agregar_producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action='{{route("crud.create")}}' method="post">
                        @csrf
                        <!-- <div class="mb-3">
                            <label for="codigo" class="form-label">Código Producto:</label>
                            <input type="text" class="form-control" id="codigo" name="codigo">
                        </div> -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre De Producto:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="text" class="form-control" id="precio" name="precio">
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock:</label>
                            <input type="text" class="form-control" id="stock" name="stock">
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" class="btn btn-primary">Modificar</button> -->
                </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</body>
</html>