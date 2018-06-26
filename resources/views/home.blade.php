<!DOCTYPE html>
<html class="h-100" lang="br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    
</head>
<body>
    <div class="container-fluid">
        <div class="container mt-5" style="background-color: rgba(0,0,0,0.1);">
            <h3>Lista de Tarefas</h3>
            <div>
                <form action="{{ url('pesquisar') }}" method="post">
                    {{ csrf_field() }}
                    <div class="ml-1 mb-3 row">
                        <input type="text" class="form-control col-6" name="findItem">
                        <input type="submit" class="btn" value="Pesquisar">
                    </div>
                </form>
                <table class="table table-dark mb-3">
                    <thead>
                        <tr>
                            <th scope="col">Id:</th>
                            <th scope="col" class="col-6">Itens:</th>
                            <th scope="col" class="col-6">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($lista) > 0)
                            @foreach($lista as $item)
                                <tr>
                                    <th scope="row">{{ $item->ID }}</th>
                                    <td>{{ $item->Itens }}</td>
                                    <td><a href="delete/{{ $item->ID }}">⊠</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th scope="row">-</th>
                                <td>Nenhum item foi encontrado!</td>
                            </tr>
                        @endif
                        <form method="POST">
                            {{csrf_field()}}    <!--add campo hidden para protejer o formulario de hackers-->
                            <th scope="row"></th>
                            <td class="row">
                                <input type="text" class="form-control col-6" name="item" placeholder="Digite um item na lista" required>
                                <input type="submit" class="btn" value="+">
                            </td>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>