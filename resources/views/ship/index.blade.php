@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @forelse($ships as $ship)
                <div class="col-3 form-div mt-2">
                    @if ($ship->getPhotos()->count())
                        <img src="{{ $ship->lastImageUrl() }}" alt="#">
                    @endif
                    <h3 class="heading">{{ $ship->title }}, {{ $ship->price }} Eur</h3>
                    <p class="description">{{ $ship->comment }}</p>
                    <p>{{ $ship->created_at }}</p>
                    <div class="buttons mb-2">
                        <a href="{{ route('ship_edit', $ship) }}" type="button" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('ship_delete', $ship) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" @if (Auth::user()->role < 10) style="opacity: 0.3" disabled @endif>Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="description">Photos will be uploaded soon.</p>
            @endforelse

        </div>
    </div>
@endsection
