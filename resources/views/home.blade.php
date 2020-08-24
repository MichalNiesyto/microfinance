@extends('layouts.app')

@section('content')
<div class="container">
    You doesn't created budget yet.
    Please create your budget or wait for invitation to use one budget with others.
    <form method="post" action="/budget/create">
        @csrf
        <button class="btn-danger" type="submit">Create your budget</button>
    </form>
    <ul>
        Your budget invitations (you can only accept invitation to one budget)
    </ul>
</div>
@endsection
