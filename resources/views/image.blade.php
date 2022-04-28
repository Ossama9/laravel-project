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
                   <form method="POST" id="upload-image" action="{{ url('save') }}" enctype="multipart/form-data" >
                       @csrf
                       <div class="row">
                           <div class="col-md-12">
                               <div class="form-group">
                                   <input type="file" name="image"  placeholder="Choose image" id="image">
                                   @error('image')
                                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                   @enderror
                               </div>
                           </div>
                           <div class="col-md-12">
                               <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                           </div>
                       </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
