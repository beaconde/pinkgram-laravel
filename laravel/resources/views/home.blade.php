@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#F8BBD0;">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

            @foreach ($images as $image)
                <div class="card mt-5" style="background-color: #FCE4EC;">
                    <div class="card-body">
                        <div class="d-flex align-items-end">
                            <img  src="{{asset('/storage/users/'.\App\User::find($image->user_id)->image)}}" alt="User Image" width='50px' class="rounded-circle mr-3">
                            <h5 class="card-title">{{\App\User::find($image->user_id)->name.' '.\App\User::find($image->user_id)->surname.'  |  @'.\App\User::find($image->user_id)->nick}}</h5>
                        </div>
                    </div>
                    <img class="card-img-bottom" src="{{asset('/storage/images/'.$image->image_path)}}" alt="Card image cap">
                    <div class="card-footer d-flex justify-content-between">
                        <div>
                            <p class="card-text"><small class="text-muted">{{'@'.\App\User::find($image->user_id)->nick.'  |  '.$image->created_at->format('d-m-Y')}}</small></p>
                            <p class="card-text mt-2 mb-2">{{$image->description}}</p>
                        </div>
                        @if ($image->user_id == Auth::user()->id)
                            <button type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#borrarModal{{$image->id}}">
                                Borrar
                            </button>
                        @endif
                    </div>
                </div>
                <div class="modal fade" id="borrarModal{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Borrar imagen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>¿Estás seguro de que quieres borrar la imagen?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                <a href="{{ route('image.destroy', ['id' => $image->id])  }}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Borrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $images->links() }}
        </div>
    </div>
</div>
@endsection
