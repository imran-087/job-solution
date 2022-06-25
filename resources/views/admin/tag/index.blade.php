@extends('admin.layout.app')
@section('title', 'Question')

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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Question</h1>
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
                    <li class="breadcrumb-item text-muted">Question Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">All Question</li>
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
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search Question">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->

                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5"
                        data-select2-id="select2-data-123-0tix">
                        
                        <div class="w-100 mw-150px" data-select2-id="select2-data-122-mhmq">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid select2-hidden-accessible kk-datatable-filter"
                                data-control="select2" data-hide-search="true" data-placeholder="Category"
                                data-kt-ecommerce-product-filter="status" data-select2-id="select2-data-10-i8aq"
                                tabindex="-1" aria-hidden="true">
                                <option data-select2-id="select2-data-12-ibou"></option>
                                <option value="all" data-select2-id="select2-data-128-oc9k">All</option>
                                @foreach($sub_categories as $sub_category)
                                    <option value="{{$sub_category->id}}" >{{$sub_category->name}}</option>
                                @endforeach
                            </select>
                            <!--end::Select2-->
                        </div>
                       
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
                                        <th class="min-w-100px">Sub Category</th>
                                        <th class="min-w-100px">Subject</th>
                                        <th class="min-w-100px">Add Subject</th>
                                        <th class=" min-w-300px">Question</th>
                                        <th class=" min-w-100px">Tag</th>
                                        <th class=" min-w-80px">Add Tag</th>
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


@endsection


@push('script')
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#dataTable').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: "{{ url('admin/question/add-tag-on-question') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'sub_category_id',
                        name: 'sub_category_id'
                    },
                    {
                        data: 'subject_id',
                        name: 'subject_id'
                    },
                    {
                        data: 'add_subject',
                        name: 'add_subject'
                    },
                    {
                        data: 'question',
                        name: 'question'
                    },
                    {
                        data: 'tag',
                        name: 'tag'
                    },
                  
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
                table.ajax.url( "{{ url('admin/question/add-tag-on-question?category=') }}"+this.value ).load();
            })

        })

        //search tag
        $(document).ready(function() {
            var timeout = null;
            $(document).on('keyup', '.search_tag', function() {
                var question_id = $(this).data('question_id')
                var subject_id = $(this).data('subject_id')
             
                var this_input = $(this)
                //console.log(id)

                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    var val = $(this).val();
                        if (val == "") {
                        $('.result').html('');
                    }
                //If val is not empty.
                else {
                    //AJAX is called.
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/question/tag/search')}}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            //Assigning value of "val" into "search" variable.
                            search: val,
                            question_id : question_id,
                            subject_id : subject_id,
                        },
                        //If result found, this funtion will be called.
                        success: function(data) {
                            //console.log(data)
                            this_input.closest('div').find('.result').html(data);
                            //this_input.closest('#result').hide()
                            //$('#result').html(data);

                        }
                    });
                }
                }, 1000);

            });
        })

        //add tag
        $(document).ready(function(){
            $(document).on('click', '.add', function(){
                var sid = $(this).data('sid')
                var qid = $(this).data('qid')

                //AJAX is called.
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/question/tag/tag-added')}}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            //Assigning value of "val" into "search" variable.
                            subject_id: sid,
                            question_id : qid,
                        },
                        //If result found, this funtion will be called.
                        success: function(data) {
                            if(data.success){
                                toastr.success(data.message)
                                $('#dataTable').DataTable().ajax.reload();
                            }
                            else{
                                toastr.error(data.message)
                            }
                         
                        }
                    });
            })
        })

        //get subject
        $(document).on('click', '.get-subject', function() {
            var question_id = $(this).data('question_id')
            var sub_category_id = $(this).data('subcategory_id')

            var this_input = $(this)
            
            $.ajax({
                type: "GET",
                url: "{{ url('admin/question/subject/get-subject')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    //Assigning value of "val" into "search" variable.
                    question_id : question_id,
                    sub_category_id : sub_category_id,
                },
                //If result found, this funtion will be called.
                success: function(data) {
                    //console.log(data)
                    this_input.hide();
                    this_input.closest('div').find('.subject').html(data);
                  
                }
            });
           
        });

        //add subject
        $(document).on('change', '.add-subject', function(){
            var sid = $(this).find(':selected').data('sid');
            var qid = $(this).find(':selected').data('qid');
           
            // console.log(sid)
            // console.log(qid)
            var this_input = $(this)
            
            //AJAX is called.
            $.ajax({
                type: "POST",
                url: "{{ url('admin/question/subject/add-subject')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    //Assigning value of "val" into "search" variable.
                    subject_id: sid,
                    question_id : qid,
                },
                //If result found, this funtion will be called.
                success: function(data) {
                    if(data.success){
                        toastr.success(data.message);
                        this_input.hide();
                        $('#dataTable').DataTable().ajax.reload();
                    }
                    else{
                        toastr.error(data.message)
                    }
                    
                }
            });
        })
       
    </script>
@endpush
