@extends('app')

@section('content')
<div class="container w-75 justify-content-center align-items-center my-5">
    <div class="card w-75 p-4">
        <h4 class="text-center">Registration Form</h4>

      
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" >
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-info mt-4">Submit</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>

</script>
@endpush
