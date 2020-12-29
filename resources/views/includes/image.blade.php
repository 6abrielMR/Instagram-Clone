<div class="card mb-3">
    <div class="card-header">
        <a href="{{ route('profile', ['id' => $image->user->id]) }}" class="header-images">
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
        </a>
    </div>
    @if ($image->image_path)
        <div class="card-body content-body">
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
                    <?php $user_like = false; ?>
                    @foreach ($image->likes as $like)
                        @if ($like->user_id == Auth::user()->id)
                            <?php $user_like = true; ?>
                            @break
                        @endif
                    @endforeach
                    @if ($user_like)
                        <img src="{{ asset('img/heart-red.png') }}" data-id="{{ $image->id }}" class="btn-dislike" alt="like">
                    @else
                        <img src="{{ asset('img/heart-black.png') }}" data-id="{{ $image->id }}" class="btn-like" alt="like">
                    @endif
                    <span id="coutn-likes-{{ $image->id }}" class="number-likes">{{ count($image->likes) }}</span>
                </div>
                <a href="" class="btn btn-warning">Comentarios({{ count($image->comments) }})</a>
            </div>
        </div>
    @endif
    </div>