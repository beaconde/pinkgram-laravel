@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach ($users as $user)
                    <hr class="mt-3">
                    <div class="d-flex align-items-start mt-1">
                        <img src="{{asset('/storage/users/'.$user->image)}}" alt="User Image" width='150px' class="rounded-circle">
                        <div class="d-flex flex-column ml-4">
                            <h3 class="p-1">{{'@'.$user->nick}}</h3>
                            <h4 class="p-1">{{$user->name.' '.$user->surname}}</h4>
                            <p class="text-muted p-1">{{'Se unió: '.$user->created_at->format('d-m-Y')}}</p>
                            <a href="{{ route('user.profile', ['id' => $user->id])  }}" class="btn btn-success" role="button" aria-pressed="true">Ver perfil</a>
                        </div>
                    </div>
                @endforeach
                {{ $users->links() }}

            </div>
        </div>
    </div>
@endsection
