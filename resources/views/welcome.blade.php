<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="container my-10 mx-auto">
    <div class="flex justify-between">

      <h1 class="text-3xl font-bold">Home</h1>
      <a href="/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add to Post</a>
    </div>
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4" role="alert">
      <p class="font-bold">Success!</p>
      <p>{{ session('success') }}</p>
    </div>
    @endif
   <div>
            <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Id</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Description</th>
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Image</th>
                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="odd:bg-white even:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $post->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $post->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $post->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><img src="{{ asset('images/' . $post->image) }}" alt="" class="w-20 h-20"></td>
                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                        
                        <a href="{{ route('edit', $post->id) }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Edit</a>
                        <a href="{{ route('delete', $post->id) }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</a>
                    </td>
                    </tr>
                    @endforeach
                    
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
   </div>

  </div>
</body>
</html>