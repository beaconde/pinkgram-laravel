@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color:#F8BBD0;">Subir nueva imagen</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('image.create', ['nick' => Auth::user()->nick])}}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH')}}

                            {{-- Imagen --}}
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image" required>
                                </div>
                            </div>

                            {{-- Descripción --}}
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control" name="description" autofocus required></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="background-color:#F8BBD0;color:#222222;border:none;">
                                        Subir imagen
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
