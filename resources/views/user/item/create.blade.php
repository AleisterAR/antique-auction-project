@extends('master')

@section('content')
    <div class="container form-container-style">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1 class="form-title">Item Registration</h1><br><br>
                <form action={{ route('user.item.store') }}
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="i_name"
                               name="name"
                               type="text"
                               placeholder="Item Name"
                               >
                    </div>
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="creator"
                               name="creator"
                               type="text"
                               placeholder="Creator">
                    </div>
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="year"
                               name="year"
                               type="text"
                               placeholder="Year Created">
                    </div>
                    <div class="mb-3">
                        <select class="form-select-cus text-capitalize"
                                name="category_id"
                                aria-label="Default select example">
                                <option value="" disabled selected>Select a category</option>
                            @foreach ($categories as $category)
                                <option class="role-option" value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="condition"
                               name="condition"
                               type="text"
                               placeholder="Condition" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"
                               for="photo">Image of Antique</label>
                        <input class="form-cus"
                               id="photo"
                               name="antique"
                               type="file" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"
                               for="certificate">Certificate of Authenticity</label>
                        <input class="form-cus"
                               id="certificate"
                               name="certificate"
                               type="file" required>
                    </div>
                    <div class="mb-3">
                        <textarea class = "form-cus textarea-size"
                                  id="description"
                                  name="description"
                                  type="text"
                                  placeholder="Description"
                                  required></textarea>
                    </div>
                    <div class = "row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center"><button class="btn-cus btn-submit btn-submit-color"
                                    type="submit">Submit</button></div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
