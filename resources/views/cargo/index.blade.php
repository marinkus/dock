@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @forelse($cargos as $cargo)
                <div class="col-3 form-div mt-2">
                    <h3 class="heading">{{ $cargo->title }}</h3>
                    <p class="description">Type: {{ $cargo->type }}</p>
                    <p class="description">Client: {{ $cargo->client }}</p>
                    <img src="{{$cargo->image}}" alt="">
                    <div class="buttons mb-2">
                        <a href="{{ route('cargo_edit', $cargo) }}" type="button" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('cargo_delete', $cargo) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="description">There are no cargos.</p>
            @endforelse

        </div>
    </div>
@endsection
