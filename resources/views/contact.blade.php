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
                    <h3>Contact {{ $post->user->name }}</h3>

                    <br>
                    <form action="{{ route('sendEmail') }}" method="post">
                        <br>
                        <input type="hidden" name="id_post" value="{{$post->id}}">
                        <label for="subjectInput">Objectif: </label>
                        <input type="text" name="subject" id="subjectInput"><br><br>
                        <label for="messageInput">Message: </label><br>
                        <textarea name="message" id="messageInput" cols="30" rows="10"></textarea><br>
                        <input type="submit" name="submit" id="" value="Envoyer le mail">
                        @csrf
                    </form>
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
