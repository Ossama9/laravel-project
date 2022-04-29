<form method="post" action="{{ route('postMessage') }}">
    <input type="text" name="message">
    <input type="hidden" value="{{ $post->id }}" name="post_id">
    <input type="submit" value="Envoyer un commentaire">
    @csrf
</form>
