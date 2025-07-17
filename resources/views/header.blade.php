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

        .succesful {
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
            <div class="flex space-x-4" class="px-4 py-2 rounded-lg cursor-pointer border hover:bg-gray-50 font-medium">
                <a href="/"
                    class="{{ request()->routeIs('home') ? 'bg-blue-600' : '' }} px-4 py-2 rounded-lg cursor-pointer border text-white">

                    Upload Image

                </a>
                <a href="/view"
                    class="{{ request()->routeIs('view') ? 'bg-blue-600' : '' }} px-4 py-2 rounded-lg cursor-pointer border text-white">

                    View Images

                </a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="max-w-4xl mx-auto p-4 container mt-40">