@component('mail::message')
    # Bonjour {{ $post->user->name }}

    <br>Annonce : {{ $post->id }} {{ $post->brand->brand }} {{ $post->modele->model }}
    <br>Date de Creation : {{ $post->created_at }}
    <br>url : {{ $url }}
    @component('mail::button', ['url' => $url])
        Cliquer içi pour voir votre annonce
    @endcomponent
    message : {{ $message }} <br>
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
