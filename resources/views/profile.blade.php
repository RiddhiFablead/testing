@extends('app')

@section('content')
<div class="container w-75 justify-content-center align-items-center my-5">
    <div class="card w-75 p-4">
        <h4 class="text-center">Profile Form</h4>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input  type="text"   id="name" name="name" class="form-control"  value="{{ session('user') }}">
            </div>

            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input   type="email" id="email"  name="email"  class="form-control"  value="{{ session('email') }}">
            </div>

            <button type="submit" class="btn btn-info mt-4">Update</button>
        </form>
    </div>
</div>
@endsection
