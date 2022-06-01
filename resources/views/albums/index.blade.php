@include('layouts.header')
<p class="h2 d-flex justify-content-center">Albums</p>
    <div class="container mx-auto">
  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <div class='w-full m-2 p-2'>
    <a href="{{route('albums.create')}}" type="button" class="btn btn-success">Create</a>
        </div>
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Title</th>
            <th scope="col" class="relative text-center px-6 py-3">Mange</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($albums as $album)
          <tr>
          <td class="px-6 py-4 whitespace-nowrap">{{$album->id}}</td>
          <td  class="px-6 py-4 whitespace-nowrap">
          <a href="{{route('albums.show', $album->id) }}">
              {{$album->title}}</a>
            <td  class="px-8 py-6 text-right text-sm">
            <div class="flex justify-center">
            <a href="{{route('albums.show', $album->id) }}" type="button" class="btn btn-primary">View</a>
            &nbsp
            <a href="{{route('albums.edit', $album->id) }}" type="button" class="btn btn-success">Edit</a>
            &nbsp
            <form action="{{route('albums.destroy', $album->id) }}" method="POST">
                @csrf
                @method("DELETE")
            <button type="sumbit" action="{{route('albums.destroy', $album->id) }}" class="btn btn-danger">Delete</button>   
              </form>
            </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="m-2 p-2">Pagination</div>
    </div>
  </div>
</div>
    </body>
</html>
