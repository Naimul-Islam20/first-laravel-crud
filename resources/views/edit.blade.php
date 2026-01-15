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

      <h1 class="text-3xl font-bold">Create Post</h1>
      <a href="/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Home</a>
    </div>

    <form action="{{ route('update', $ourPost->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
       
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
       
        <input  type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$ourPost->name}}">
         @error('name')
          <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
       
        <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >{{$ourPost->description}}</textarea>
         @error('description')
          <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
        <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$ourPost->image}}" >
        @error('image')
          <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Post</button>
    </form>
  </div>
</body>
</html>