<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button style="margin: 10px; padding: 5px; background-color: green; color:white"><a
                    href="{{ route('filtre_cr') }}">filtrer par prix croissant</a></button>
            <button style="margin: 10px;padding: 5px; background-color: red; color:white"><a
                    href="{{ route('filtre_dcr') }}">filtrer par prix decroissant</a></button>
            @if(isset($posts->links))
                {{ $posts->links() }}
            @endif


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($posts as $post)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div style="display: flex; justify-content: space-around;">
                            <div>
                                <ul>
                                    <li>{{ $post->id }} - {{ $post->user->name }} - {{ $post->created_at }}</li>
                                    <li>Model : {{ $post->brand->brand }} <br>Marque: {{ $post->modele->model }}</li>
                                    <li>Description : {{ $post->description }}</li>
                                    <li>Prix : {{ $post->price }} €</li>

                                    <br>
                                    <li><a href="{{ route('post',$post->id) }}" style="color: #2563eb;">Voir en
                                            detail</a></li>
                                </ul>
                            </div>
                            <div>
                                @foreach($post->images as $image)
                                    <li><img src="{{asset($image->path )}}" alt=""></li>
                                    @break
                                @endforeach</div>
                        </div>
                    </div>
                    <hr style="border-top-width: 10px;">
                @endforeach
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
