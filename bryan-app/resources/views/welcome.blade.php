@extends('layouts.app')

@section('content')
    <div class="container-md d-flex flex-column justify-content-center align-items-center title">
        <h1 class="text-center f-1 titleHome">Chat live By Bryan</h1>
      <div id="app">
        <register :min_lenght=9></register>
      </div>
        
        
    </div>
@endsection
