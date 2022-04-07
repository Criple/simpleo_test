<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Markers
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Lat</th>
                            <th>Lon</th>
                            <th>Tel</th>
                            <th>Description</th>
                            <th>Controls</th>
                        </tr>
                        @foreach ($markers as $marker)
                            <tr>
                                <td>{{ $marker->id }}</td>
                                <td>{{ $marker->lat }}</td>
                                <td>{{ $marker->lon }}</td>
                                <td>{{ $marker->tel }}</td>
                                <td>{{ $marker->description }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('marker.show',$marker->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('marker.edit',$marker->id) }}">Edit</a>
                                    <form action="{{ route('marker.destroy',$marker->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
