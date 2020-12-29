@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            @foreach($images as $image)
                <div class="card mb-3">
                    <div class="card-header header-images">
                        @if ($image->user->image)
                            <div class="container-pub-avatar mr-3">
                                <img src="{{ route('user.avatar', ['filename'=>$image->user->image]) }}" class="avatar rounded" alt="Foto de perfil">
                            </div>
                        @else
                            <div class="container-pub-avatar mr-3">
                                <img src="{{ route('user.avatar', ['filename'=>'default-user-avatar.jpg']) }}" class="avatar rounded" alt="Foto de perfil">
                            </div>
                        @endif
                        <p>{{ $image->user->nick }}</p>
                    </div>
                    @if ($image->image_path)
                        <div class="card-body">
                            <div class="image-container">
                                <img src="{{ route('image.file', ['filename'=>$image->image_path]) }}" alt="Imagen publicada">
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('image.detail', ['id' => $image->id]) }}">
                                <div class="timestamp">
                                    {{ \FormatTime::LongTimeFilter($image->created_at) }}
                                </div>
                                <div class="description">{{ $image->description }}</div>
                            </a>
                            <div class="btns-comments">
                                <div class="likes">
                                    <img src="{{ asset('img/heart-black.png') }}" alt="like">
                                </div>
                                <a href="" class="btn btn-warning">Comentarios({{ count($image->comments) }})</a>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach

            <!-- Paginacion -->
            {{ $images->links() }}
        </div>
    </div>
</div>
@endsection
