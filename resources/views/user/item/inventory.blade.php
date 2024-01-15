@extends('master')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Inventory</h1>
                    <br>
                </div>
                <div class="table-responsive card-body">
                    <table class="table table-bordered"
                           id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Antique Name</th>
                                <th>Creator</th>
                                <th>Year</th>
                                <th>Category</th>
                                <th>Condition</th>
                                <th>Antique's Photo</th>
                                <th>Antique's Certificate</th>
                                <th>Description</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td><a href="{{ route('user.item.show', $item->id )}}">{{ $item->name }}</a></td>
                                    <td>{{ $item->provenance->creator }}</td>
                                    <td>{{ $item->provenance->year }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->condition }}</td>
                                    <td><a href="{{ asset('storage/antique/' . $item->image->file_name) }}"
                                           target="_blank">
                                            Image of item
                                        </a>
                                    </td>
                                    <td><a href="{{ asset('storage/certificate/' . $item->provenance->image->file_name) }}"
                                           target="_blank">
                                            Certificate
                                        </a>
                                    </td>
                                    <td>
                                        {{ $item->description }}
                                    </td>
                                    <td class="d-flex gap-1">
                                        <a class="btn btn-theme"
                                           href="{{ route('user.item.update', ['id' => $item->id]) }}">Update</a>
                                        <form action="{{ route('user.item.destroy', ['id' => $item->id]) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-theme"
                                                    type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
