@if ($mensagem = Session::get('erro'))
    {{ $mensagem }}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif

<form action="{{ route('login/auth') }}" method="POST">
    @csrf

    Email: <br> <input name="email">
    Senha: <br> <input type="password" name="password">
    <input type="checkbox" name="remember"> Lembrar-me

    <button type="submit">Entrar</button>
</form>