@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')
            <div class="card">
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
                        <div class="timestamp">
                            {{ \FormatTime::LongTimeFilter($image->created_at) }}
                        </div>
                        <div class="description">{{ $image->description }}</div>
                        <div class="btns-comments">
                            <div class="likes">
                                <img src="{{ asset('img/heart-black.png') }}" alt="like">
                            </div>
                            <h2 >Comentarios({{ count($image->comments) }})</h2>
                            <br><br>
                        </div>
                        <form method="POST" action="{{ route('comment.save') }}">
                            @csrf

                            <input type="hidden" name="image_id" value="{{ $image->id }}">

                            <div class="form-group">
                                <label for="content" class="col-md-2 col-form-label text-md-left label-comment">{{ __('Comentario') }}</label>

                                <div class="col-md-12 content-comment">
                                    <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autocomplete="content"></textarea>

                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        Comentar
                                    </button>
                                </div>
                            </div>

                        </form>
                        @foreach ($image->comments as $comment)
                            <hr>
                            <div class="comment">
                                <div class="comment-header">
                                    <p>{{ $comment->user->nick }}</p>
                                </div>
                                <div class="comment-content"><p>{{ $comment->content }}</p></div>
                                <div class="comment-footer">
                                    <div class="timestamp">
                                        {{ \FormatTime::LongTimeFilter($comment->created_at) }}
                                    </div>
                                    @if (Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                        <p class="timestamp m-0 ml-2">|</p>
                                        <div class="btn-delete-comment">
                                            <a href="{{ route('comment.delete', ['id' => $comment->id]) }}" class="ml-2">Eliminar</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
