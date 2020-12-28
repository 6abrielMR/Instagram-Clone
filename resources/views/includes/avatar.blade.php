@if(Auth::user()->image)
    <div class="container-avatar mx-auto d-block">
        <img src="{{ route('user.avatar', ['filename'=>Auth::user()->image]) }}" class="avatar rounded" alt="Foto de perfil">
    </div>
@endif