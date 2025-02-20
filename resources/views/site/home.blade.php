@extends('site.layout')
@section('title', 'Essa é a página HOME')
@section('conteudo')
    
{{-- Isso é um comentário --}}

{{-- isset($nome) ? 'existe' : 'não existe' --}}

{{ $teste ?? 'padrão' }}

@endsection