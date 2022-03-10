@extends('frontend.layout')
@section('title', 'Forum')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Discussion Forum</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('discussion') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Discussion</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="m-0">
                <!--begin::Menu toggle-->
                <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->Filter</a>
                <!--end::Menu toggle-->
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_622497f4e1893">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->
                    <!--begin::Form-->
                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Status:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div>
                                <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_622497f4e1893" data-allow-clear="true">
                                    <option></option>
                                    <option value="1">Approved</option>
                                    <option value="2">Pending</option>
                                    <option value="2">In Process</option>
                                    <option value="2">Rejected</option>
                                </select>
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Member Type:</label>
                            <!--end::Label-->
                            <!--begin::Options-->
                            <div class="d-flex">
                                <!--begin::Options-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                    <span class="form-check-label">Author</span>
                                </label>
                                <!--end::Options-->
                                <!--begin::Options-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                    <span class="form-check-label">Customer</span>
                                </label>
                                <!--end::Options-->
                            </div>
                            <!--end::Options-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Notifications:</label>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                <label class="form-check-label">Enabled</label>
                            </div>
                            <!--end::Switch-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Menu 1-->
            </div>
            <!--end::Filter menu-->
            <!--begin::Secondary button-->
            <!--end::Secondary button-->
            <!--begin::Primary button-->
            <a href="/metronic8/demo1/../demo1/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
            <!--end::Primary button-->
        </div> --}}
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-xl-2">
                <!--begin::Add Discussion-->
                <div class="new-discussion mb-5">
                    <a href="javascript:;" class="btn btn-primary me-3 text-uppercase" onclick="addNew()">New Discussion</a>
                </div>
                <!--end::Add Discussion-->
                <div class="nav">
                    <ul class="nav-item">
                        @foreach($channels as $channel)
                        <a class="nav-link" href="{{ route('discussion.channel', $channel->id) }}"><li class="mb-3">{{$channel->name}}</li></a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-8">
                <!--begin::Card-->
                <div class="card mb-5">
                    <!--begin::Card header-->
                    <div class="card-header border-0 ">
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
                                    class="form-control form-control-solid w-350px ps-14" id="search" placeholder="Search discussion">
                                {{-- <div id="display"></div> --}}
                                   
                            </div>
                            <!--end::Search-->
                          
                            
                        </div>
                        <!--begin::Card title-->

                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5"
                            data-select2-id="select2-data-123-0tixx">
                            <div class="w-100 mw-150px" data-select2-id="select2-data-122-mhmqq">
                                <!--begin::Select2-->
                                
                                <select class="form-select form-select-solid select2-hidden-accessible kk-discussion-filter"
                                    data-control="select2" data-hide-search="true" data-placeholder="Filter by ..."
                                    data-kt-ecommerce-product-filter="status" data-select2-id="select2-data-10-i8aqq"
                                    tabindex="-1" aria-hidden="true" >
                                    <option></option>
                                    <option value="latest">Latest</option>
                                    <option value="popular">Most Popular</option>
                                    <option value="weekago">Last Week</option>
                                </select>
                                <!--end::Select2-->
                            </div> 
                            
                        </div>

                    </div>
                    <!--end::Card header-->
                    <div id="result"></div>
                </div>
                <!--end::Card-->

                
                 
                
                <div id="main">
                    @foreach($discussions as $discussion)
                    <!--begin::Feeds Widget 2-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body pb-0">
                            <!--begin::Header-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::User-->
                                <div class="d-flex align-items-center flex-grow-1">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-45px me-5">
                                        <img src="{{ asset('assets') }}/media/avatars/300-23.jpg" alt="" />
                                        
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('discussion.show', $discussion->id) }}" class="text-gray-900 text-hover-primary fs-6 fw-bolder view" data-id="{{ $discussion->id }}" style="font-size: 20px !important;">{{ Str::limit($discussion->title, 50, $end='...') }}</a>
                                        <span class="text-gray-400 fw-bold">{{$discussion->created_at->diffForHumans()}}</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                                <!--begin::Menu-->
                                <div class="my-0">
                                    <div class="channel-badge">
                                    <a href="{{ route('discussion.channel', $channel->id) }}">{{$discussion->channel->name}}</a>
                                    </div>
                                    
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Header-->

                        
                            <!--begin::Post-->
                            <div class="mb-5">
                                <!--begin::Text-->
                                <a href="{{ route('discussion.show', $discussion->id) }}" class="view" data-id="{{ $discussion->id }}">
                                    <p class="text-gray-800 fw-normal mb-5">{{ Str::limit($discussion->content, 250, $end='...') }}</p>
                                </a>
                                <!--end::Text-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center mb-5">

                                    <a href="{{ route('discussion.show', $discussion->id) }}" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4 view" data-id="{{ $discussion->id }}">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="black" />
                                            <rect x="6" y="12" width="7" height="2" rx="1" fill="black" />
                                            <rect x="6" y="7" width="12" height="2" rx="1" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{$discussion->replies->count()}}</a>
                                    <a href="javascript:;" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-4"  data-id="{{ $discussion->id }}">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{$discussion->vote}}</a>

                                    <a href="" style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                      <i class="fas fa-eye fa-xl"></i> {{$discussion->view}} </a>
                                    
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Post-->
                        
                            
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Feeds Widget 2-->
                    @endforeach
                    <div class="d-flex justify-content-end">
                        {{ $discussions->links() }}
                    </div>
                </div>
                <div id="render"></div>
                
            </div>
            <!--end::Col-->
           
            <!--begin::Col-->
            <div class="col-xl-2">
                
            </div>
        </div>
    </div>
</div>

<!--begin::Modal - New Product/Service-->
<div class="modal fade" id="kk_modal_new_passage" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
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
                <form id="kk_modal_new_passage_form" class="form" enctype="multipart/form-data">
                    <div class="messages"></div>
                    {{-- csrf token  --}}
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Create New Discussion</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Discussion Title</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Title"
                            name="title" />
                        <div class="help-block with-errors title-error"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Discussion Content</span>
                        </label>
                        <!--end::Label-->
                        <textarea name="content" class="form-control form-control-solid h-100px "></textarea>
                        <div class="help-block with-errors content-error"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select Discussion Channel</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Select channel" name="channel" id="channel">
                                <option value="">Choose ...</option>
                                @foreach ($channels as $channel)
                                    <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors channel-error"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kk_modal_new_service_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary">
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
<!--end::Modal - New Product/Service-->


@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#dataTable').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: "{{ url('admin/passage/index') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'passage',
                        name: 'passage'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ],
                "order": [
                    [3, 'desc']
                ] //created at desc

            })

            // document.querySelector('[data-kk-product-table-filter="search"]').addEventListener("keyup", (function(
            //     t) {
            //     table.search(t.target.value).draw()
            // }))


        })

        //search
        $(document).ready(function() {
            var timeout = null
            $("#search").keyup(function() {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    var val = $('#search').val();
                    if (val == "") {
                     $('#result').html('');
                }
                //If val is not empty.
                else {
                    //AJAX is called.
                    $.ajax({
                        type: "POST",
                        url: "{{ url('discussion/search')}}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            //Assigning value of "val" into "search" variable.
                            search: val
                        },
                        //If result found, this funtion will be called.
                        success: function(data) {
                            //console.log(data)
                          $('#result').html(data);
                          
                           
                        }
                    });
                }
                }, 1000);
                
            });
        })

        //filter
        $(document).ready(function(){
            $('.kk-discussion-filter').on('change',function(){
                //var val = (this.value)
                //table.ajax.url( "{{ url('admin/category/category-index?status=') }}"+this.value ).load();
                $.ajax({
                    type:"GET",
                    url: "{{ url('discussion')}}"+'/'+this.value,
                    success:function(data){
                        if(data){
                            $("#render").html(data.html)
                            $("#main").hide()
                        }
                        else{
                            $("#main").hide()
                        }
                       
                        
                    }
                })
            })
        });

        // add new
        function addNew(){
            $('input[name="passage_id"]').val('')
            $('.with-errors').text('')
            $('#kk_modal_new_passage_form')[0].reset();
            $('#kk_modal_new_passage').modal('show')
        }

       

        //cancel button
        $('#kk_modal_new_service_cancel').on('click', function(){
            $('#kk_modal_new_passage_form')[0].reset();
            $("#kk_modal_new_passage").modal('hide');
        })

        //new category save
        $('#kk_modal_new_passage_form').on('submit',function(e){
            e.preventDefault()
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_service_submit').attr('disabled','true')

            var formData = new FormData(this);
            $.ajax({
                type:"POST",
                url: "{{ url('discussion/store')}}",
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
                        $('#kk_modal_new_passage_form').find('.messages').html(alertBox).show();
                    }else{
                        // empty the form
                        $('#kk_modal_new_passage_form')[0].reset();
                        $("#kk_modal_new_passage").modal('hide');
                       
                        Swal.fire({
                                text: data.message,
                                icon: "success",
                                showConfirmButton: false
                                
                            }).then((function () {
                                //refresh datatable
                                $('#dataTable').DataTable().ajax.reload();
                            }))
                    }

                    $('.indicator-label').show()
                    $('.indicator-progress').hide()
                    $('#kk_modal_new_service_submit').removeAttr('disabled')
                    setTimeout(function() {
                        location.reload();  //Refresh page
                    }, 1000);

                }
          });

        })

        //vote
        $('.vote').on('click', function(){
            var id = $(this).data('id')
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('discussion/vote')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    Swal.fire({
                        text: data.message,
                        icon: "success",
                        showConfirmButton: false
                        
                    })
                    setTimeout(function() {
                        location.reload();  //Refresh page
                    }, 1000);
                }
            })
        });

        //view
        $('.view').on('click', function(){
            var id = $(this).data('id')
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('discussion/view-count')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    
                }
            })
        });

        


    </script>
@endpush
