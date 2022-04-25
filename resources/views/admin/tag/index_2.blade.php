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
                        
                        {{-- <div class="w-100 mw-150px" data-select2-id="select2-data-122-mhmq">
                            
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
                           
                        </div> --}}
                       
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
                                        <th class=" min-w-300px">Question</th>
                                        <th class=" min-w-100px">Tag</th>
                                        <th class=" min-w-100px">Add Tag</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->

                                <tbody>
                                    @foreach($questions as $question)
                                    <tr>
                                        <td>{{ $question->id }}</td>
                                        <td>{{ $question->sub_category->name }}</td>
                                        <td>{{ $question->subject->name }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>
                                            @foreach($question->pivotsubject as $tag)
                                                <div class="badge badge-success"> {{ $tag->name }} </div>
                                            @endforeach
                                        </td>
                                        <td>
                                           <div>
<input type="text" data-question_id="{{$question->id}}" class="form-control form-control-solid w-350px  search_tag"  placeholder="Type to search">
                                            
                                            <div class="result" ></div>
                                           </div>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            {{ $questions->links() }}
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
       

        //search tag
        $(document).ready(function() {
            var timeout = null
            $(document).on('keyup', '.search_tag', function() {
                var question_id = $(this).data(question_id)
                var id = question_id.question_id
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
                            question_id : id,
                        },
                        //If result found, this funtion will be called.
                        success: function(data) {
                            //console.log(data)
                            //this_input.hide();
                            this_input.closest('div').find('.result').html(data);
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
                var sid = $(this).data(sid)
                var qid = $(this).data(qid)

                console.log(sid.sid)
                console.log(qid.qid)
                // var subject_id = sid.sid
                // var question_id = qid.qid
                //AJAX is called.
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/question/tag/tag-added')}}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            //Assigning value of "val" into "search" variable.
                            subject_id: sid.sid,
                            question_id : qid.qid,
                        },
                        //If result found, this funtion will be called.
                        success: function(data) {
                            if(data.success){
                                toastr.success(data.message)
                            }
                            else{
                                toastr.error(data.message)
                            }
                         
                        }
                    });
            })
        })
        

    </script>
@endpush