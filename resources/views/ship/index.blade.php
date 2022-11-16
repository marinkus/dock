@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @forelse($ships as $ship)
                <div class="col-3 form-div mt-2">
                    <h3 class="heading">{{ $ship->title }}, {{ $ship->country }}</h3>
                    <p class="description">Country of registration{{ $ship->country }}</p>
                    <p>Registered at: {{ $ship->created_at }}</p>
                    <div class="buttons mb-2">
                        <a href="{{ route('ship_edit', $ship) }}" type="button" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('ship_delete', $ship) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="description">There are no ships in a dock.</p>
            @endforelse

        </div>
    </div>
@endsection
