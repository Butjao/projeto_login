<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manutencao</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
    
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="color: white">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active" style="margin-right: 10px">
                <div>
                    {{session()->get('infoUser')}}
                </div>
            </li>
            <li class="nav-item">
                <div>
                    ({{session()->get('permissao') ? 'Usuario' : 'Admin'}})
                </div>
            </li>
          </ul>
        </div>
        <div class="navbar-nav">
            <a href="/">Logout</a>
        </div>
    </nav>
   
   @include('alerts')
   
    @if (session()->get('permissao') == 1)
        <div class="form-row">
            <div class="col-12" style="margin-top: 5%; text-align: center">
                <p style="font-size: 35px">Seja bem vindo novo usuario.</p>
            </div>
        </div>
    @else  
        @if ($acao == 0)
            @include('manutencao.form_add')
        @else    
            @include('manutencao.form_edit')
        @endif
        <br>
        <div class="form-row" style="margin: 5%; margin-top: 0px">
            <div class="col-12">
                <table class="table table-striped table-hover" id="table_content">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($userData as $objUser)
                            @if($objUser->nivel == 0)
                                @php
                                    $idSituacao = 'Admin';
                                @endphp
                            @else
                                @php
                                    $idSituacao = 'User';
                                @endphp
                            @endif
                            <tr>
                                <th scope="row">{{$objUser->cd_usuario}}</th>
                                <td>{{$objUser->nm_usuario}}</td>
                                <td>{{$objUser->email}}</td>
                                <td>{{$idSituacao}}</td>
                                <td>
                                    <a href="/main/editar/{{$objUser->cd_usuario}}" style="cursor:pointer">Editar</a>
                                </td>
                                <td>
                                    <a href="/main/deletar/{{$objUser->cd_usuario}}" style="cursor:pointer">Excluir</a>
                                </td>
                            </tr>
                        @empty 
                            <tr>
                                <th scope="row"></th>
                                <td colspan="5" style="text-align: center">Nenhum dado econtrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
