@extends('layouts.app')

@section('content')
<link href="{{ asset('css/home/chat.css') }}" rel="stylesheet">
<div class="container h-100 d-flex">

                {{-- <form action="{{ route('logout') }}" method="post">
                    @csrf
            <button> LOG OUT</button>
        </form> --}}
        <chat></chat>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
