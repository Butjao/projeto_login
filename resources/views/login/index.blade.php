<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bower_components/sweetalert2/dist/sweetalert2.min.css">

</head>
<body>
    @include('alerts')

    <div class="form-row" style="width: 100%; display: flex; justify-content: center; margin-top: 5%">
        <form action="{{route('login.teste-usuario')}}" method="POST" style="width: 30%">
            @csrf
            <div class="col-12" style="text-align: center">
                <h1>Seja Bem Vindo!</h1>
            </div>
            <br>
            <br>
            <div class="col-12">
                <label for="email">Email</label>
                <input type="email" name="email" id="email_usuario" class="form-control" placeholder="Digite seu email" required>
            </div>
            <div class="col-12">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha_usuario" class="form-control" aria-describedby="emailHelp" required>
            </div>
            <br>
            <div class="col-12" >
                <button type="submit" class="btn btn-primary" style="width: 100%" >Login</button>
            </div>
        </form>
    </div>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
