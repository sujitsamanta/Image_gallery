@include('header')

@if (session('alert'))
    @if (session('alert') == 'succesful')
        <x-alert alert="succesful" message="Delete Succesful.." />
    @elseif(session('alert') == 'not_succesful')
        <x-alert alert="not_succesful" message="Delete.." />
    @else
    @endif
@endif

<!-- View Section -->

<div id="view-content" class="tab-content ">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">View Images</h2>
            <span class="text-sm text-gray-500">3 images</span>
        </div>

        <!-- Images List -->
        <div class="space-y-4 max-h-96 overflow-y-auto">


            @if ($imgdata)
                @foreach ($imgdata as $data)
                    <!-- Image Row 1 -->

                    <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <!-- <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                                </svg> -->
                                <img src="{{ url('storage/images/' . $data->path) }}" alt="">
                            </div>
                            <div>
                                <h3 class="font-medium">{{ $data->title }}</h3>
                                <p class="text-sm text-gray-500">{{ $data->created_at }}</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <form action="{{ route('edit_page', $data->id) }}" method="get">
                                <button class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 text-sm">
                                    Update
                                </button>
                            </form>
                            <form action="{{ route('delete', $data->id) }}" method="get">

                                <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </div>

                @endforeach
            @else
                <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50">
                    <div class="flex items-center space-x-4 text-center">
                        <h1>Not</h1>
                    </div>

                </div>

            @endif





        </div>
    </div>
</div>
@include('footer')