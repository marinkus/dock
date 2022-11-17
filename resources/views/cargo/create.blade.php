@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 form-div mar-0">
                <form action="{{ route('cargo_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3 class="heading">CREATE</h3>
                    <div class="mb-3">
                        <span class="input-group-text">Title</span>
                        <input value="{{ old('title') }}" type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <span class="input-group-text">Client</span>
                        <input value="{{ old('client') }}" type="text" class="form-control" name="client">
                    </div>
                    <div class="mb-3">
                        <span class="input-group-text">Type</span>
                        <select value="{{ old('type') }}" name="type" class="form-select">
                            <option selected value="0">Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <span class="input-group-text">Ship</span>
                        <select value="{{ old('ship_id') }}" name="ship_id" class="form-select">
                            <option value="0" selected>Open this select menu</option>
                            @foreach ($ships as $ship)
                                <option value="{{ $ship->id }}" @if ($ship->id == old('ship_id')) selected @endif>
                                    {{ $ship->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <span class="input-group-text">Add image</span>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
