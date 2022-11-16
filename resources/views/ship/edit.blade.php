@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 form-div mar-0">
                <form action="{{ route('ship_edit', $ship) }}" method="post">
                    @csrf
                    @method('put');
                    <h3 class="heading">Edit ship</h3>
                    <div class="mb-3">
                        <span class="input-group-text">Name of ship</span>
                        <input value="{{ old('title', $ship->title) }}" type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <span class="input-group-text">Country of registration</span>
                        <input value="{{ old('country', $ship->country) }}" type="text" class="form-control" name="country">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
