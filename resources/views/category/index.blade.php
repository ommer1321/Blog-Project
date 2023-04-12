@extends('layouts.app')

@section('title')
    Detay
@endsection

@section('css')
    <!-- quill css -->
    <link href="{{ asset('assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="card pb-0"> @include('includes.alerts')

        @include('includes.errors')

        <ul class="nav nav-tabs nav-tabs-custom nav-justified project-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab" aria-selected="true">
                    <i class="mdi mdi-atom font-size-20"></i>
                    <span class="d-none d-sm-block">Kategori Ekle
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab" aria-selected="false">
                    <i class="mdi mdi-clipboard-edit-outline font-size-20"></i>
                    <span class="d-none d-sm-block">Kategori Sil
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#team" role="tab">
                    <i class="mdi mdi-account-multiple-outline font-size-20"></i>
                    <span class="d-none d-sm-block">Alt Kategori Ekle
                    </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#activities" role="tab">
                    <i class="mdi mdi-chart-box-plus-outline font-size-20"></i>
                    <span class="d-none d-sm-block"></span>Alt Kategori Sil
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="overview" role="tabpanel">
                <div class="card mb-0 border-0">
                    <div class="card-header bg-transparent border-bottom d-flex"> Kategori Ekle</div>


                    <div class="card-body">
                        <form action="{{ route('store.category') }}" method="post">
                            @csrf
                            <div class="row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"> Kategori </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name"
                                        id="horizontal-firstname-input" placeholder=" Kategori Giriniz">
                                </div>
                            </div><!-- end row -->




                            <div class="row justify-content-end">
                                <div class="col-sm-9">

                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Kaydet</button>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </form><!-- end form -->
                    </div>
                </div><!-- end card -->
            </div><!-- end tab pane -->

            <div class="tab-pane" id="tasks" role="tabpanel">
                <div class="card mb-0 border-0">
                    <div class="card-header bg-transparent border-bottom d-flex"> Kategori Sil </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr class="border-2">
                                        <th>#</th>
                                        <th>Kategori Adı</th>
                                        <th>Kategori Sil</th>
                                        <th>Kategori Güncelle</th>
                                    </tr>
                                </thead>
                                <tbody class="border-2">
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <form action="{{ route('update.category', $category->id) }}" method="post">
                                                <th scope="row"> <input class="form-control" type="text"
                                                        name="name" value="{{ $category->name }}"></th>

                                                <th scope="row">

                                                    @csrf
                                                    <input type="submit" name="updateCategoryButton"
                                                        class="btn btn-success" value="Güncelle">
                                            </form>
                                            </th>
                                            <th scope="row">
                                                <form action="{{ route('delete.category', $category->id) }}" method="post">
                                                    @csrf
                                                    <input type="submit" name="deleteCategoryButton" class="btn btn-danger"
                                                        value="Sil">
                                                </form>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end responsive -->
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end tab pane -->

            <div class="tab-pane" id="team" role="tabpanel">
                <div>
                    <div class="card mb-0 border-0">
                        <div class="card-header bg-transparent border-bottom d-flex">Alt Kategori Ekle</div>

                        <div class="card-body">
                            <form action="{{route('store.altcategory')}}" method="post">
                                @csrf
                                <div class="row mb-4">
                                    <label for="horizontal-floatingSelectGrid" class="col-sm-3 col-form-label">Kategoriler
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="category_id" id="floatingSelectGrid"
                                            aria-label="Floating label select example">
                                            <option >Kategori Seç</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Alt Kategori
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name"
                                            id="horizontal-firstname-input" placeholder="Alt Kategori Giriniz">
                                    </div>
                                </div><!-- end row -->




                                <div class="row justify-content-end">
                                    <div class="col-sm-9">

                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">Kaydet</button>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </form><!-- end form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end tab pane -->

            <div class="tab-pane" id="activities" role="tabpanel">
                <div class="card mb-0 border-0">
                    <div class="card-header bg-transparent border-bottom d-flex">Alt Kategori Sil</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr class="border-2">
                                        <th>#</th>
                                        <th>Alt Kategori Adı</th>
                                        <th> Kategori </th>
                                        <th>Kategori Sil</th>
                                        <th>Kategori Güncelle</th>
                                    </tr>
                                </thead>
                                <tbody class="border-2">
                                    @foreach ($alt_categories as $alt_category)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>


                                            <form action="{{ route('update.altcategory', $alt_category->id) }}"
                                                method="post">
                                                @csrf
                                                <th scope="row">
                                                    <input class="form-control" type="text" name="name"
                                                        value="{{ $alt_category->name }}">
                                                </th>



                                                <td scope="row">
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="category_id"
                                                            id="floatingSelectGrid"
                                                            aria-label="Floating label select example">
                                                            <option>Kategori Seç</option>
                                                            @foreach ($categories as $category)
                                                                <option @if ($category->id == $alt_category->category_id) selected @endif
                                                                    value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>

                                                </td>

                                                <th scope="row">


                                                    <input type="submit" name="updateAltCategoryButton"
                                                        class="btn btn-success" value="Güncelle">
                                            </form>
                                            </th>



                                            <th scope="row">
                                                <form action="{{ route('delete.altcategory', $alt_category->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="submit" name="deleteCategoryButton"
                                                        class="btn btn-danger" value="Sil">
                                                </form>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end responsive -->
                    </div><!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- ckeditor -->
    <script src="{{ asset('assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- quill js -->
    <script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
@endsection
