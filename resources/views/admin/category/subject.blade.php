@extends('admin.layout.app')
@section('title', 'Subject')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Subject</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Subject Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Subject List</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->



    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kk-product-table-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search subject">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->

                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5"
                        data-select2-id="select2-data-123-0tix">
                        <div class="w-100 mw-150px" data-select2-id="select2-data-122-mhmq">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid select2-hidden-accessible kk-datatable-filter"
                                data-control="select2" data-hide-search="true" data-placeholder="Status"
                                data-kt-ecommerce-product-filter="status" data-select2-id="select2-data-10-i8aq"
                                tabindex="-1" aria-hidden="true">
                                <option data-select2-id="select2-data-12-ibou"></option>
                                <option value="all" data-select2-id="select2-data-128-oc9k">All</option>
                                <option value="active" data-select2-id="select2-data-129-5n39">Active</option>
                                <option value="deactive" data-select2-id="select2-data-131-pohp">Deactive</option>

                            </select>
                            <!--end::Select2-->
                        </div>
                        <!--begin::Add product-->
                        <a href="javascript:;" class="btn btn-sm btn-primary me-3" onclick="addNew()" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Subject"><i class="fas fa-plus"></i>Add Subject</a>
                        <!--end::Add product-->
                    </div>

                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_table_Service_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                style="width:100%" id="dataTable">

                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-20px">#</th>
                                        <th class=" min-w-100px">Main Category</th>
                                        <th class=" min-w-100px">Sub Category</th>
                                        <th class="min-w-100px">Subject Name</th>
                                        <th class="min-w-100px">Parent</th>
                                        <th class=" min-w-100px">Status</th>
                                        {{-- <th class=" min-w-100px">Created at</th> --}}
                                        <th class=" min-w-70px">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->

                                <tbody>

                                </tbody>

                            </table>


                        </div>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>


<!--begin::Modal - New Subject-->
<div class="modal fade" id="kk_modal_new_subject" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-850px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kk_modal_new_subject_form" class="form" enctype="multipart/form-data">
                    <div class="messages"></div>
                    {{-- csrf token  --}}
                    @csrf
                    <input type="hidden" name="subject_id">

                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Add New Subject</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select Main Category</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                name="main_category" id="main_category">
                                <option value="">Select main category</option>
                                @foreach ($main_categories as $main_category)
                                    <option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                                @endforeach

                            </select>
                            <div class="help-block with-errors main_category-error"></div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select Category</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Select category"name="category" id="category">


                            </select>
                            <div class="help-block with-errors category-error"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select Sub Category</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Select sub category" name="sub_category" id="sub_category">


                            </select>
                            <div class="help-block with-errors sub_category-error"></div>
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-bold mb-2">Select Parent (optional)</label>
                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                        data-placeholder="Select parent" name="parent" id="parent">


                                    </select>
                                    <div class="help-block with-errors parent-error"></div>
                                </div>
                                <!--end::Col-->
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <div class="col-md-6">

                        </div>
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="fs-6 fw-bold mb-2">Select Sub Parent (optional)</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Select sub parent" name="sub_parent" id="sub_parent">


                            </select>
                            <div class="help-block with-errors sub_parent-error"></div>
                        </div>
                        <!--end::Col-->
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-3 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Subject Name</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter subject name"
                            name="name[]" id="name"/>
                        <div class="help-block with-errors name-error"></div>
                    </div>
                    <!--end::Input group-->

                    <!-- append dynamic input-->
                    <div  class="newRow"></div>
                    <!-- append dynamic input-->

                    <div class="col-md-5 mb-5">
                        <button class="btn btn-info btn-sm addRow" type="button" style="padding: 7px 10px !important"><i class="fas fa-plus"></i>Add Multiple Subject</button>
                    </div>

                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Status</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Select status" name="status">
                                <option value="active" selected>Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                            <div class="help-block with-errors status-error"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kk_modal_new_subject_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kk_modal_new_subject_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Subject-->

<!--begin::Modal - New Child Subject-->
<div class="modal fade" id="kk_modal_new_child_subject" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kk_modal_new_child_subject_form" class="form" enctype="multipart/form-data">
                    <div class="messages"></div>
                    {{-- csrf token  --}}
                    @csrf
                   

                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <span id="append_text"></span>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    {{-- hidden input  --}}
                    <input type="hidden" name="parent" id="parent_id" />
                    <input type="hidden" name="sub_category" id="sub_cat"/>
                    <input type="hidden" name="main_category" id="main_cat"/>
                    

                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-3 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Subject Name</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter subject name"
                            name="name[]" id="name"/>
                        <div class="help-block with-errors name-error"></div>
                    </div>
                    <!--end::Input group-->

                    <!-- append dynamic input-->
                    <div  class="append_new_row"></div>
                    <!-- append dynamic input-->

                    <div class="col-md-5 mb-5">
                        <button class="btn btn-info btn-sm addNewRow" type="button" style="padding: 7px 10px !important"><i class="fas fa-plus"></i>Add Multiple Child Subject</button>
                    </div>

                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Status</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Select status" name="status">
                                <option value="active" selected>Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                            <div class="help-block with-errors status-error"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kk_modal_new_child_subject_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kk_modal_new_child_subject_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Child Subject-->

@endsection


@push('script')
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#dataTable').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: "{{ url('admin/category/subject') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'main_category_id',
                        name: 'main_category_id'
                    },
                    {
                        data: 'sub_category_id',
                        name: 'sub_category_id'
                    },

                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'parent_id',
                        name: 'parent_id'
                    },

                    {
                        data: 'status',
                        name: 'status'
                    },
                    // {
                    //     data: 'created_at',
                    //     name: 'created_at'
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ],
                // "order": [
                //     [6, 'desc']
                // ] //created at desc

            })

            document.querySelector('[data-kk-product-table-filter="search"]').addEventListener("keyup", (function(
                t) {
                table.search(t.target.value).draw()
            }))

            $('.kk-datatable-filter').on('change',function(){
                console.log(this.value)
                table.ajax.url( "{{ url('admin/category/subject?status=') }}"+this.value ).load();
            })

        })

        // add new sbject
        function addNew(){
            $('input[name="subject_id"]').val('')
            $('.with-errors').text('')
            $('#kk_modal_new_subject_form')[0].reset();
            clearAppendData();
            $('#kk_modal_new_subject').modal('show')
        }

        //edit subject modal
        function edit(id){
            $.ajax({
                type:"GET",
                url: "{{ url('admin/category/subject/get')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    $('input[name="subject_id"]').val(data.subject.id);
                    $('#name').val(data.subject.name);
                    $('input[name="title"]').val(data.subject.title);
                    $('textarea[name="description"]').val(data.subject.description);
                    $('select[name="parent"]').html('<option value="' + data.parent_subject.id + '">' + data.parent_subject.name + '</option>');
                    $('select[name="status"]').val(data.subject.status).change();
                    $('select[name="main_category"]').val(data.subject.main_category_id).change();
                    $('select[name="category"]').html('<option value="' + data.category.id + '">' + data.category.name + '</option>');
                    $('select[name="sub_category"]').html('<option value="' + data.sub_category.id + '">' + data.sub_category.name + '</option>');
                    $("#kk_modal_new_subject").modal('show');
                }
          });
        }

        //cancel button
        $('#kk_modal_new_subject_cancel').on('click', function(){
            $('#kk_modal_new_subject_form')[0].reset();
            clearAppendData();
            $('.indicator-label').show()
            $('.indicator-progress').hide()
            $('#kk_modal_new_subject_submit').removeAttr('disabled')
            $("#kk_modal_new_subject").modal('hide');

        })

        //new subject save
        $('#kk_modal_new_subject_form').on('submit',function(e){
            e.preventDefault()
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_subject_submit').attr('disabled','true')

            var formData = new FormData(this);
            // formData.append('description', myEditor.getData());
            $.ajax({
                type:"POST",
                url: "{{ url('admin/category/subject/store')}}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.success ==  false || data.success ==  "false"){
                        var arr = Object.keys(data.errors);
                        var arr_val = Object.values(data.errors);
                        for(var i= 0;i < arr.length;i++){
                        $('.'+arr[i]+'-error').text(arr_val[i][0])
                        }
                    }else if(data.error || data.error == 'true'){
                        var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                        $('#kk_modal_new_subject_form').find('.messages').html(alertBox).show();
                    }else{
                        // empty the form
                        $('#kk_modal_new_subject_form')[0].reset();
                        clearAppendData()
                        $("#kk_modal_new_subject").modal('hide');
                        $('.dynamic-row').remove();
                        Swal.fire({
                                text: data.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "{{__('Ok, got it!')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh datatable
                                $('#dataTable').DataTable().ajax.reload();
                            }))
                    }

                    $('.indicator-label').show()
                    $('.indicator-progress').hide()
                    $('#kk_modal_new_subject_submit').removeAttr('disabled')

                }
          });

        })

        //delete subject
        function deleteCategory(id){
            Swal.fire({
                text: "Are you sure you want delete this?",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Confirm",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((function (o) {
                if(o.value){ //if agree
                    $.ajax({
                        type: "GET",
                        url: "{{ url('admin/category/subject/delete') }}"+'/'+id,
                        data: {},
                        success: function (res)
                        {
                            if(res.success){
                                Swal.fire({
                                    text: res.message,
                                    icon: "success",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary"
                                    }
                                }).then((function () {
                                    //refresh datatable
                                    $('#dataTable').DataTable().ajax.reload();
                                }))
                            }
                        }
                    });

                }else{ //if cancel
                    Swal.fire({
                        text: "Item has not been deleted",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    })
                }

            }))
        }

        //clear append data
        function clearAppendData(){
            $('select[name="category"]').val('').text('');
            $('select[name="sub_category"]').val('').text('');
            $('select[name="parent"]').val('').text('');
            $('#kt_docs_ckeditor_classic').val('').text('');
            $('.dynamic-row').remove();
        }

        //add new dynamic input field
        $(document).on('click', '.addRow', function() {
            var html = '';
            html += '<div class="d-flex flex-column mb-3 fv-row dynamic-row">'

            html += '   <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
            html += '        <span class="required">Subject Name</span>'
            html += '    </label>'

            html += '    <div class="row">'
            html += '        <div class="col-md-11">'
            html += '            <input type="text" class="form-control form-control-solid" placeholder="Enter subject name" name="name[]" />'
            html += '            <div class="help-block with-errors name-error"></div>'
            html += '        </div>'
            html += '        <div class="col-md-1">'
            html += '            <button class="btn btn-danger btn-icon btn-sm removeRow" type="button"><i class="fas fa-minus"></i></button>'
            html += '        </div>'
            html += '    </div>'
            html += '</div>'

            $(this).closest('.newRow').append(html);
            $('.newRow').append(html);
        });

        // remove row
        $(document).on('click', '.removeRow', function() {
            $(this).closest('.dynamic-row').remove();
            //$(this).remove();
        });



        //Add Child Subject
        $(document).on('click', '.addChildSubject', function(){
            var id =  $(this).data('id');
            var name =  $(this).data('name');
            var main_category =  $(this).data('main_category');
            var sub_category =  $(this).data('sub_category');
            console.log(id);
            console.log(name);
           
            $('.with-errors').text('');
            $('#kk_modal_new_child_subject_form')[0].reset();
            $('.dynamic-new-row').remove();
            $('#parent_id').val(id);
            $('#main_cat').val(main_category);
            $('#sub_cat').val(sub_category);
            $('#append_text').html('<h1 class="mb-3" id="append_text">Add New Child Subject into <span class="text-capitalize"> '+ name +' </span> </h1>');
            $('#kk_modal_new_child_subject').modal('show');
        })

        //cancel button
        $('#kk_modal_new_child_subject_cancel').on('click', function(){
            $('#kk_modal_new_child_subject_form')[0].reset();
            $('.indicator-label').show();
            $('.indicator-progress').hide();
            $('.dynamic-new-row').remove();
            $('#kk_modal_new_child_subject_submit').removeAttr('disabled');
            $("#kk_modal_new_child_subject").modal('hide');
        })

        //new subject save
        $('#kk_modal_new_child_subject_form').on('submit',function(e){
            e.preventDefault()
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_child_subject_submit').attr('disabled','true')

            var formData = new FormData(this);
            // formData.append('description', myEditor.getData());
            $.ajax({
                type:"POST",
                url: "{{ url('admin/category/subject/store')}}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.success ==  false || data.success ==  "false"){
                        var arr = Object.keys(data.errors);
                        var arr_val = Object.values(data.errors);
                        for(var i= 0;i < arr.length;i++){
                        $('.'+arr[i]+'-error').text(arr_val[i][0])
                        }
                    }else if(data.error || data.error == 'true'){
                        var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                        $('#kk_modal_new_child_subject_form').find('.messages').html(alertBox).show();
                    }else{
                        // empty the form
                        $('#kk_modal_new_child_subject_form')[0].reset();
                        clearAppendData()
                        $("#kk_modal_new_child_subject").modal('hide');
                        $('.dynamic-new-row').remove();
                        Swal.fire({
                                text: data.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "{{__('Ok, got it!')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh datatable
                                $('#dataTable').DataTable().ajax.reload();
                            }))
                    }

                    $('.indicator-label').show()
                    $('.indicator-progress').hide()
                    $('#kk_modal_new_child_subject_submit').removeAttr('disabled')

                }
          });

        })

        //add new input field
        $(document).on('click', '.addNewRow', function() {
            var html = '';
            html += '<div class="d-flex flex-column mb-3 fv-row dynamic-new-row">'

            html += '   <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
            html += '        <span class="required">Subject Name</span>'
            html += '    </label>'

            html += '    <div class="row">'
            html += '        <div class="col-md-11">'
            html += '            <input type="text" class="form-control form-control-solid" placeholder="Enter subject name" name="name[]" />'
            html += '            <div class="help-block with-errors name-error"></div>'
            html += '        </div>'
            html += '        <div class="col-md-1">'
            html += '            <button class="btn btn-danger btn-icon btn-sm removeNewRow" type="button"><i class="fas fa-minus"></i></button>'
            html += '        </div>'
            html += '    </div>'
            html += '</div>'

            $(this).closest('.append_new_row').append(html);
            $('.append_new_row').append(html);
        });

        // remove row
        $(document).on('click', '.removeNewRow', function() {
            $(this).closest('.dynamic-new-row').remove();
            //$(this).remove();
        });

    </script>
@endpush
