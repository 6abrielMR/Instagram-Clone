@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card pt-4 pb-4 pl-4 data-user">
                <div class="row">
                    @if ($user->image)
                        <div class="col-md-4 container-avatar">
                            <img src="{{ route('user.avatar', ['filename'=>$user->image]) }}" class="avatar rounded" alt="Foto de perfil">
                        </div>
                    @else
                        <div class="col-md-4 container-avatar">
                            <img src="{{ route('user.avatar', ['filename'=>'default-user-avatar.jpg']) }}" class="avatar rounded" alt="Foto de perfil">
                        </div>
                    @endif
                    <div class="content-info">
                        <h1 class="info-nickname">{{ '@'.$user->nick }}</h1>
                        <h2 class="info-name">{{ $user->name.' '.$user->surname }}</h2>
                        <h5 class="info-createdat">{{ 'Se unió '.\FormatTime::LongTimeFilter($user->created_at) }}</h5>
                    </div>
                </div>
            </div>
            @foreach($user->images as $image)
                @include('includes.image', ['image'=>$image])
            @endforeach
        </div>
    </div>
</div>
@endsection
