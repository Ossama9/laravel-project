<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('postmessage') }}">
                        @csrf
                        <input type="text" name="message">
                        <input type="hidden" value="{{ $id }}" name="post_id">
                        <input type="submit" value="Envoyer un commentaire">
                    </form>
                    <form method="post" action="{{ route('postnote') }}">
                        @csrf
                        <select name="note">
                            <option value="">Note</option>
                            <option value=1>1/5</option>
                            <option value=2>2/5</option>
                            <option value=3>3/5</option>
                            <option value=4>4/5</option>
                            <option value=5>5/5</option>
                        </select>
                        <input type="hidden" value="{{ $id }}"  name="post_id">
                        <input type="submit" value="Envoyer une note">
                    </form>
                    <br><br>
                    {{$resultat}}/5 -- {{$count}} Avis
                    @foreach($messages as $message)
                        <li>
                            {{$message->user->name}} : {{ $message->content }} <span style="font-size: 9px; float: right">{{ $message->created_at }}</span><hr><br>

                            @endforeach
                        </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
