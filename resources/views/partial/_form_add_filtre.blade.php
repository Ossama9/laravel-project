<form method="get" action="{{ route('filtre') }}">
    <select name="brand" id="brandSelect">

    </select>
    <input type="text" name="min" placeholder="minimum €">
    <input type="text" name="max" placeholder="maximum €">
    <input type="submit" name="recherche" value="Rechercher">
    @csrf
</form>
