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
                        <p class="card-text mt-3">{{$image->description}}</p>
                    </div>
                    <img class="card-img-bottom" src="{{asset('/storage/images/'.$image->image_path)}}" alt="Card image cap">
                </div>
            @endforeach
            {{ $images->links() }}
        </div>
    </div>
</div>
@endsection
