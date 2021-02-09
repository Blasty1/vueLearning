@extends('layouts.app')

@section('content')
<link href="{{ asset('css/home/chat.css') }}" rel="stylesheet">
<div class="container h-100 d-flex">

<chat user="{{ json_encode(\Auth::user()) }}" csrf="{{ csrf_token()}}" route_logout="{{ route('logout') }}"></chat>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
