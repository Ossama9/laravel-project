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
                    Create Post
                    <form action="{{ route('submitPost') }}" method="POST" enctype="multipart/form-data">

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
                        <label for="descriptionInput">Description: </label>
                        <input type="text" name="description" id="descriptionInput"> <br><br>

                        <label for="priceInput">Price: </label>
                        <input type="number" step="0.01" name="price" id="priceInput"><br><br>


                        <input type="file" accept="image/*" id="imageInput" name="image1"><br><br>
{{--                        <input type="file" accept="image/*" id="imageInput" name="image2"><br><br>--}}



                        <input type="submit" name="submit" id="" value="submit">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


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
