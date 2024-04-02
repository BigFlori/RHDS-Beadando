@extends('layouts.app')

@section('title')
Kezdőoldal
@endsection

@section('content')
    @if(!Auth::check())
    <div>
        <h1 class="text-center">Könyvtár kölcsönző rendszer</h1>
        <p class="text-center">Üdvözöljük a könyvtár kölcsönző rendszerben!</p>
    </div>
    @else
    <div>
        <h1 class="text-center">Könyvtár kölcsönző rendszer</h1>
        <p class="text-center">Jelentkezz be a rendszer használatához!</p>
    </div>
    @endif
@endsection