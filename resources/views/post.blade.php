<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--            {{ __('Dashboard') }}--}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Information</h3>
                    @if(isset($moy))
                        <h3>Note/5 : {{ $moy }}</h3>

                    @endif
                    <ul>
                        <li>{{ $post->id }} - {{ $post->user->name }} - {{ $post->created_at }}</li>
                        <li>Model : {{ $post->brand->brand }} - Marque: {{ $post->modele->model }}</li>
                        <li>Description : {{ $post->description }}</li>
                        <li>Prix : {{ $post->price }} €</li>
                        @foreach($post->images as $image)
                            <li><img src="{{asset($image->path )}}" alt=""></li>
                        @endforeach

                        @if($post->user_id === Auth::id())
                            <li><a href="{{ route('updatePost',$post->id) }}" style="color: red;">Modifier l'article</a>
                            </li>
                        @endif
                    </ul>
                </div>


                <hr style="border-top-width: 10px;">

                @if($post->messages->count())
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h3>Commentaires: </h3><br>

                        @foreach($post->messages as $message)
                            <br>
                            <ul>
                                <li>Utilisateur : {{ $message->user->name }}</li>
                                <br>
                                <li>Message : {{ $message->content }}</li>
                                @if($post->user_id === Auth::id())
                                    <li><a href="{{ route('deleteComment',$message->id) }}" style="color: red;">Supprimer commentaire</a>
                                        </li>
                                @endif
                            </ul>
                            <br>
                            <hr>

                        @endforeach
                    </div>
                    <hr style="border-top-width: 10px;">

                @endif


                <div class="p-6 bg-white border-b border-gray-200">
                    @include('partial._form_add_message')
                </div>
                <hr style="border-top-width: 10px;">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('partial._form_add_note')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    img {
        width: 300px;
        height: 200px;
    }
</style>
