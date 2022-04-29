<form method="post" action="{{ route('postNote') }}">
    @csrf
    <select name="note">
        <option value="">Note</option>
        <option value=1>1/5</option>
        <option value=2>2/5</option>
        <option value=3>3/5</option>
        <option value=4>4/5</option>
        <option value=5>5/5</option>
    </select>
    <input type="hidden" value="{{ $post->id }}" name="post_id">
    <input type="submit" value="Envoyer une note">
</form>
