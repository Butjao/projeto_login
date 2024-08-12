<form action="{{route('main-page.atualizar', ['usuario' => $usuario->cd_usuario])}}" method="POST">
    <div class="form-row" style="justify-content: center; margin: 5%; margin-bottom: 20px">
        @csrf
        @method('PATCH')

        <div class="col-12">
            <p style="font-weight: bold; font-size: 20px">Editar Usuario</p>
        </div>
        <div class="col-3">
            <label for="nome">Nome</label>
            <input type="nome" value="{{$usuario->nm_usuario}}" name="nome" id="nome_usuario" class="form-control" placeholder="Digite seu nome" required>
        </div>
        <div class="col-3">
            <label for="email">Email</label>
            <input type="email" value="{{$usuario->email}}" name="email" id="email_usuario" class="form-control" placeholder="Digite seu email" required>
        </div>
        <div class="col-3">
            <label for="senha">Senha</label>
            <input type="senha"  value="{{$usuario->senha}}" name="senha" id="senha_usuario" class="form-control" aria-describedby="emailHelp" required>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label for="nivel">Acesso</label>
                <select class="form-control" name="nivel" id="nivel">
                <option value="0">Admin</option>
                <option value="1">User</option>
                </select>
            </div>
        </div>

        <div class="col-12" style="margin-top: 20px">
            <button type="submit" class="btn btn-primary" style="width: 25%" >Atualizar</button>
        </div>
    </div>
</form>