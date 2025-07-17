<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .succesful{
    background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;

}

        .not_succesful {
            background-color: #fffbeb;
            border: 1px solid #fed7aa;
            color: #92400e;

        }


        .alert {
            border-radius: 0.5rem;
            padding: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .alert-icon {
            height: 1.25rem;
            width: 1.25rem;
            margin-top: 0.125rem;
            flex-shrink: 0;
        }

        .alert-content {
            flex: 1;
        }

        .alert-title {
            font-size: 0.875rem;
            font-weight: 500;
            margin: 0;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen gradient-bg">

    <!-- Navigation -->
    <nav class=" shadow-sm nav ">
        <div class="max-w-4xl mx-auto px-4 py-4">
            <div class="flex space-x-4" class="px-4 py-2 rounded-lg cursor-pointer border hover:bg-gray-50">
                <a href="/"
                    class="{{ request()->routeIs('home') ? 'bg-blue-600' : '' }} px-4 py-2 rounded-lg cursor-pointer border text-white">

                    Upload Image

                </a>
                <a href="/view"
                    class="{{ request()->routeIs('view') ? 'bg-blue-600' : '' }} px-4 py-2 rounded-lg cursor-pointer border text-white">

                    View Images

                </a>
                <a href="/view"
                    class="{{ request()->routeIs('edit_page') ? 'bg-blue-600' : '' }} px-4 py-2 rounded-lg cursor-pointer border text-white">

                    Back to View

                </a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="max-w-4xl mx-auto p-4 container mt-40">


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
                <h2 class="text-2xl font-bold mb-4">Update Image</h2>
                
                <form class="space-y-4" action="{{ route('update',$image->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <!-- File Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Choose Image</label>
                        <input name="file" type="file" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <!-- Title Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image Title</label>
                        <input type="text" name="title" value="{{ $image->title}}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                     <!-- Image Row 1 -->

                     <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <!-- <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg> -->
                                <img src="{{ url('storage/images/' . $image->path) }}" alt="">
                            </div>
                            <div>
                                <h3 class="font-medium">{{ $image->title }}</h3>
                                <p class="text-sm text-gray-500">{{ $image->created_at }}</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                           

                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 font-medium">
                        Edit Image
                    </button>
                </form>
            </div>
        </div>

        </div>
</body>
</html>

