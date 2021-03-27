@extends('layouts.app')

@section('content')

<div class="container">
    @if(session()->get('message'))
    <div class="alert alert-warning  alert-dismissible fade show" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>

@endsection
