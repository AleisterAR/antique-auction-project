@extends('master')

@section('content')
    <div class="container form-container-style">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1 class="form-title">Item Update Form</h1><br><br>
                <form action={{ route('user.item.update', ['id' => $item->id]) }}
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="i_name"
                               name="name"
                               type="text"
                               value="{{ $item->name }}"
                               placeholder="Item Name"
                               required>
                    </div>
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="creator"
                               name="creator"
                               type="text"
                               value="{{ $item->provenance->creator }}"
                               placeholder="Creator">
                    </div>
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="year"
                               name="year"
                               type="text"
                               value="{{ $item->provenance->year }}"
                               placeholder="Year Created">
                    </div>
                    <div class="mb-3">
                        <select class="form-select-cus"
                                name="category_id"
                                aria-label="Default select example">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                        @selected($category->id == $item->category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="condition"
                               name="condition"
                               type="text"
                               value="{{ $item->condition }}"
                               placeholder="Condition">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"
                               for="photo">Image of Antique</label>
                        <input class="form-cus"
                               id="photo"
                               name="antique"
                               type="file">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"
                               for="certificate">Certificate of Authenticity</label>
                        <input class="form-cus"
                               id="certificate"
                               name="certificate"
                               type="file">
                    </div>
                    <div class="mb-3">
                        <textarea class = "form-cus textarea-size"
                                  id="description"
                                  name="description"
                                  type="text"
                                  placeholder="Description"
                                  required>{{ $item->description }}</textarea>
                    </div>
                    <div class = "row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center"><button class="btn-cus btn-submit btn-submit-color"
                                    type="submit">Update</button></div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
