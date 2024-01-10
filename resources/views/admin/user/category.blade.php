@extends('admin.master')
@section('content')
    <main>
        <div class="container px-4 form-container-style">
            <a href="{{ route('admin.index') }}" class="admin-back-icon">
                <i class="bi bi-box-arrow-left"></i>
            </a>
            <div class="row pt-10">
                <div class="col-md-1"></div>
                <div class="col-md-10 form-style">
                    <h1 class="form-title">Category Registration</h1><br><br>
                    <form  method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <input class="form-cus"
                                   name="name"
                                   type="text"
                                   placeholder="Category Name">
                        </div>
                        <br>
                        <div class = "row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <button class="btn-submit btn-submit-color"
                                                                      type="submit">
                                    Submit
                                </button>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
