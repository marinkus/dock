@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

                <div class="col-3 form-div mt-2">
                    <h3 class="heading">{{ $ship->title }}</h3>
                    <p class="description">Country of registration{{ $ship->country }}</p>
                    <p>Registered at: {{ $ship->created_at }}</p>
                    <p>Type: {{ $type[$ship->type] }}</p>
                    <ul class="list-group">
                        @forelse($ship->getCargos as $cargo)
                        <li class="list-group-item">
                            <div class="posts-list">
                                <div class="content">
                                   <h4> {{$cargo->title}} </h4>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">No cargos found</li>
                    @endforelse
                    </ul>
                    <div class="buttons mb-2">
                        <a href="{{ route('ship_edit', $ship) }}" type="button" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('ship_delete', $ship) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
