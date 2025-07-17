@include('header')

@if (session('alert'))
    @if (session('alert') == 'succesful')
        <x-alert alert="succesful" message="Image Uplode Succesful.." />
    @elseif(session('alert') == 'not_succesful')
        <x-alert alert="not_succesful" message="Delete.." />
    @else
    @endif
@endif



<!-- Upload Section -->
<div id="upload-content" class="tab-content ">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4">Upload Image</h2>

        <form class="space-y-4" action="/" method="post" enctype="multipart/form-data">
            @csrf
            <!-- File Input -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Choose Image</label>
                <input name="file" type="file"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Title Input -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Image Title</label>
                <input type="text" name="title" placeholder="Image Title"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 font-medium">
                Upload Image
            </button>

        </form>
    </div>
</div>


@include('footer')