<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($posts as $post)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <ul>
                            <li>{{ $post->id }}</li>
                            <li>{{ $post->user_id }}</li>
                            <li>{{ $post->brand->brand }}</li>
                            <li>{{ $post->modele->model }}</li>
                            <li>{{ $post->description }}</li>
                            <li>{{ $post->price }}</li>
                            <li><img src="{{asset ( $post->images[0]->path )}}" alt=""></li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    img{
        width: 300px;
        height: 200px;
    }
</style>
