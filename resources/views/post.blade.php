<?php
use \Illuminate\Support\Facades\Auth as Auth;
?>
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
                    <ul>
                        <li>{{ $post->id }} - {{ $post->user->name }} - {{ $post->created_at }}</li>
                        <li>Model : {{ $post->brand->brand }} - Marque: {{ $post->modele->model }}</li>
                        <li>Description : {{ $post->description }}</li>
                        <li>Prix : {{ $post->price }} €</li>
                        @foreach($post->images as $image)
                            <li><img src="{{asset($image->path )}}" alt=""></li>
                        @endforeach

                    @if($post->user_id === Auth::id())
                            <li><a href="{{ route('updatePost',$post->id) }}" style="color: #2563eb;">Modifier l'annonce</a></li>

                            <li><a href="{{ route('deletePost',$post->id) }}" style="color: red;">Supprimer l'annonce</a></li>
                        @endif
                    </ul>
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
