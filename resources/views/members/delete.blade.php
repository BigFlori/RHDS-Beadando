@extends('layouts.app')

@section('title')
Tagok
@endsection

{{-- id --}}
@section('content')
    <div class="container-lg mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Tag törlése</h1>
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id">ID</label>
                        <select class="form-control" id="id" name="id" required>
                            <option value="">Select ID</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>

                        <button type="submit" class="btn btn-primary mt-3">Törlés</button>

                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection