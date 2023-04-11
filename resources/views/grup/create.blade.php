@extends('layouts.app')

@section('title')
    Gruplar
@endsection

@section('css')
<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}} " rel="stylesheet" type="text/css">
<link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<div class="card">

<div class="card-body">
    <div>
        <ul class="wizard-nav mb-5">
            <li class="wizard-list-item">
                <div class="list-item">
                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Basic Info">
                        <i class="uil uil-clipboard-notes"></i>
                    </div>
                </div>
            </li>
            <li class="wizard-list-item">
                <div class="list-item">
                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Assignee">
                        <i class="uil uil-users-alt"></i>
                    </div>
                </div>
            </li>

            <li class="wizard-list-item">
                <div class="list-item">
                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Attached Files">
                        <i class="uil uil-paperclip"></i>
                    </div>
                </div>
            </li>
        </ul>
        <!-- wizard-nav -->

        <div class="wizard-tab">
            <div class="text-center mb-4">
                <h5>Grup Bilgileri</h5>
                <p class="card-title-desc">Aşağıdaki Tüm Alanları Doldurunuz</p>
            </div>
            <form>
                <div>
                    <div class="mb-3">
                        <label for="grup_name" class="form-label">Grup Adı</label>
                        <input id="grup_name" type="text" class="form-control" placeholder="Grup Adını Giriniz..">
                    </div>

                    <div class="mb-3">
                        <label for="grup_detail" class="form-label">Grup Detayı</label>
                        <textarea class="form-control" name="grup_detail" id="projectdesc" rows="3" placeholder="Enter Project Description..."></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="grup_branch" class="form-label">Branş Adı</label>
                        <input id="grup_branch" type="text" class="form-control" placeholder="Grup Adını Giriniz..">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Project Date</label>
                        <input type="text" class="form-control" id="datepicker-range">
                    </div>  
                </div>
            </form>
        </div>
        <!-- wizard-tab -->

        <div class="wizard-tab">
            
            <div class="text-center mb-4">
                <h5>Assign to</h5>
                <p class="card-title-desc">Select Members</p>
            </div>
            <form>
                <div>
                    <div class="mb-3">
                        <label>Department</label>
                        <select class="form-select shadow-none">
                            <option selected>Open this select Department</option>
                            <option value="Design">Design</option>
                            <option value="Development">Development</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Assign to</label>
                        <div class="mb-3">
                            <button class="btn btn-light w-100" type="button" data-bs-toggle="modal" data-bs-target="#selectmembermodal">
                                Select Members for Project
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="selectmembermodal" tabindex="-1" aria-labelledby="selectmembermodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="selectmembermodalLabel">Select Members</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="p-3">
                                            <div class="avatar-group align-items-center">
                                                <div class="me-4">Team :</div>
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Janna Johnson">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-sm">
                                                    </a>
                                                </div>
                                                <div class="avatar-group-item">
                                                    <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Heather Ford">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-sm">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="p-3">
                                            <div class="input-group border rounded">
                                                <span class="input-group-text bg-transparent border-0 pr-1">
                                                    <i class="uil uil-search"></i>
                                                </span>
                                                <input type="text" class="form-control border-0" placeholder="Search">
                                                
                                                <button class="btn btn-primary" type="button">Search</button>
                                            </div>
                                        </div>

                                        <div data-simplebar style="max-height: 200px;">
                                            <div>
                                                <div class="p-3 fw-semibold font-size-12 text-muted">
                                                    A
                                                </div>

                                                <ul class="list-group list-group-flush contact-list">
                                                    <li class="list-group-item">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="memberCheck1" checked>
                                                            <label class="form-check-label" for="memberCheck1">
                                                                Albert Rodarte
                                                            </label>
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="memberCheck2">
                                                            <label class="form-check-label" for="memberCheck2">
                                                                Allison Etter
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul><!-- end ul -->
                                            </div>

                                            <div>
                                                <div class="p-3 fw-semibold font-size-12 text-muted">
                                                    B
                                                </div>

                                                <ul class="list-group list-group-flush contact-list">
                                                    <li class="list-group-item">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="memberCheck3">
                                                            <label class="form-check-label" for="memberCheck3">
                                                                Bobby Gaffney
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul><!-- end ul -->
                                            </div>

                                            <div>
                                                <div class="p-3 fw-semibold font-size-12 text-muted">
                                                    C
                                                </div>

                                                <ul class="list-group list-group-flush contact-list">
                                                    <li class="list-group-item">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="memberCheck4" checked>
                                                            <label class="form-check-label" for="memberCheck4">
                                                                Charles Willis
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="memberCheck5" checked>
                                                            <label class="form-check-label" for="memberCheck5">
                                                                Christi
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul><!-- end ul -->
                                            </div>
                                        </div>
                                        <!-- end simplebar -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light w-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary w-sm">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </div>
                </div>
            </form>
        </div>
        <!-- wizard-tab -->

        <div class="wizard-tab">
            <div class="text-center mb-4">
                <h5>Attached Files</h5>
                <p class="card-title-desc">Upload Attached Files</p>
            </div>
            <form action="#" class="dropzone">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>

                <div class="dz-message needsclick">
                    <div class="mb-3">
                        <i class="display-4 text-light uil uil-upload-alt"></i>
                    </div>

                    <h5 class="font-size-16">Drop files here or click to upload.</h5>
                </div>
            </form>
        </div>
        <!-- wizard-tab -->

        <div class="d-flex align-items-start gap-3 mt-4">
            <button type="button" class="btn btn-primary w-sm" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" class="btn btn-primary w-sm ms-auto" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>
</div><!-- end card body -->
</div>
@endsection

@section('js')
       <!-- flatpickr js -->
       <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>

       <!-- dropzone plugin -->
       <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>


        <!-- init js -->
        <script src="{{asset('assets/js/pages/project-create.init.js')}} "></script>
@endsection
