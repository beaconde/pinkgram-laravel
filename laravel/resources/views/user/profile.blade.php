@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="d-flex align-items-center mt-2">
                    <img src="{{asset('/storage/users/'.$user->image)}}" alt="User Image" width='200px' class="rounded-circle">
                    <div class="d-flex flex-column ml-4">
                        <h2 class="p-2">{{'@'.$user->nick}}</h2>
                        <h3 class="p-2">{{$user->name.' '.$user->surname}}</h3>
                        <h5 class="text-muted p-2">{{'Se unió: '.$user->created_at->format('d-m-Y')}}</h5>
                    </div>
                </div>

                @foreach ($images as $image)
                    @if ($user->id == $image->user_id)
                        <div class="card mt-5" style="background-color: #FCE4EC;">
                            <div class="card-body">
                                <div class="d-flex align-items-end">
                                    <img  src="{{asset('/storage/users/'.\App\User::find($image->user_id)->image)}}" alt="User Image" width='50px' class="rounded-circle mr-3">
                                    <h5 class="card-title">{{\App\User::find($image->user_id)->name.' '.\App\User::find($image->user_id)->surname.'  |  @'.\App\User::find($image->user_id)->nick}}</h5>
                                </div>
                            </div>
                            <img class="card-img-bottom" src="{{asset('/storage/images/'.$image->image_path)}}" alt="Card image cap">
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="card-text"><small class="text-muted">{{'@'.\App\User::find($image->user_id)->nick.'  |  '.$image->created_at->format('d-m-Y')}}</small></p>
                                        <p class="card-text mt-2 mb-2">{{$image->description}}</p>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#actualizarModal{{$image->id}}">Actualizar</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#borrarModal{{$image->id}}">
                                            Borrar
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h4>Comentarios ({{DB::table('comments')->where('image_id', $image->id)->count()}})</h4>
                                    <hr>
                                    <form action="{{route('comment.create')}}" method="POST">
                                        @csrf
                                        {{ method_field('PATCH')}}
                                        <div class="form-group row">
                                            <div class="w-100 m-3" >
                                                <textarea id="content" class="form-control" name="content" required></textarea>
                                                <input type="hidden" value="{{Auth::user()->id}}" id="user_id" name="user_id">
                                                <input type="hidden" value="{{$image->id}}" id="image_id" name="image_id">
                                                <button type="submit" class="btn btn-success mt-3 mb-3">Enviar</button>
                                            </div>
                                        </div>
                                    </form>
                                    @foreach ($comments as $comment)
                                        @if ($comment->image_id == $image->id)
                                            <hr>
                                            <p class="text-muted">{{'@'.\App\User::find($comment->user_id)->nick}}</p>
                                            <p>{{$comment->content}}</p>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#borrarModal{{$comment->id}}">
                                                Borrar
                                            </button>
                                            <div class="modal fade" id="borrarModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Borrar comentario</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Estás seguro de que quieres borrar el comentario?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                                            <a href="{{ route('comment.destroy', ['id' => $comment->id])  }}" class="btn btn-danger active" role="button" aria-pressed="true">Borrar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
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
                                        <a href="{{ route('image.destroy', ['id' => $image->id])  }}" class="btn btn-danger active" role="button" aria-pressed="true">Borrar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="actualizarModal{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar imagen</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{ route('image.update', ['id' => $image->id])  }}">
                                        @csrf
                                        {{ method_field('PATCH')}}
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                                <div class="col-md-6">
                                                    <textarea id="description" class="form-control" name="description" autofocus required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{ $images->links() }}

            </div>
        </div>
    </div>
@endsection
