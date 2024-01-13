@extends('admin.master')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <a class="admin-back-icon"
               href="{{ route('admin.index') }}">
                <i class="bi bi-box-arrow-left"></i>
            </a>
            <div class="container-fluid px-4">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Antiques List</h1>
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
                                    <th>Verification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <td> {{ $item->name }}</td>
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
                                            <form action="{{ route('admin.item.update.status', ['id'=> $item->id]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                @if ((int)$item->status === 1)
                                                    <button value="{{ (int)!$item->status }}" name="status">
                                                        <i class="bi bi-bookmark-check-fill text-success"></i>
                                                    </button>
                                                @else
                                                    <button value="{{ (int)!$item->status }}" name="status">
                                                        <i class="bi bi-bookmark-x-fill text-danger"></i>
                                                    </button>
                                                @endif
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
        </div>
    </main>
@endsection