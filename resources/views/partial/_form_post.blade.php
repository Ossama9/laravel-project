<form action="{{ route('submitPost') }}" method="POST" enctype="multipart/form-data">

    @if(isset($idPost))
        <input type="hidden" name="idPost" value="{{$idPost}}">
    @endif
    <label for="brandSelect">Brand: </label>
    <select name="brand" id="brandSelect">
        <option value=""></option>

    </select>

    <br>
    <br>

    <label for="modelSelect">Model: </label><select name="model" id="modelSelect">
        <option value=""></option>
    </select>
    <br>
    <br>
    <label for="descriptionInput">Description: </label><br>
    <textarea type="text" name="description" id="descriptionInput" cols="30" rows="10"></textarea><br><br>

    <label for="priceInput">Price: </label>
    <input type="number" step="0.01" name="price" id="priceInput"><br><br>
        <label for="imageInput">Photo principal: </label>
    <input type="file" accept="image/*" id="imageInput" name="image1"><br><br>
    <input type="file" accept="image/*" id="" name="image2"><br><br>
    <input type="file" accept="image/*" id="" name="image3"><br><br>
    <input type="file" accept="image/*" id="" name="image4"><br><br>
    <input type="file" accept="image/*" id="" name="image5"><br><br>
    {{--                        <input type="file" accept="image/*" id="imageInput" name="image2"><br><br>--}}


    <input type="submit" name="submit" id="" value="submit">
    @csrf
</form>
<script>
    let listBrands;


    let request = $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '/getBrands'
    }).done(function (response) {
        for (let i = 0; i < response.length; i++) {
            $('#brandSelect').append("<option value=" + response[i]["id"] + ">" + response[i]["brand"] + "</option>")
        }
    })


    $('#brandSelect').change(function () {
        $('#modelSelect').html(' ')
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/getModelByIdBrand/' + this.value,
        }).done(function (response) {
            for (let i = 0; i < response.length; i++) {
                $('#modelSelect').append("<option value=" + response[i]["id"] + ">" + response[i]["model"] + "</option>")
            }
        })
    })


</script>
