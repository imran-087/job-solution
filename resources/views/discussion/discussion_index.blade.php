@extends('frontend.layout')

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        <div class="row gy-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-xl-2">
            @include('discussion.aside')
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-8">
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
                                        <a href="{{ route('discussion.show', $discussion->id) }}" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ Str::limit($discussion->title, 50, $end='...') }}</a>
                                        <span class="text-gray-400 fw-bold">{{$discussion->created_at->diffForHumans()}}</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                                <!--begin::Menu-->
                                <div class="my-0">
                                    <div class="channel-badge">
                                    <a href="">{{$discussion->channel->name}}</a>
                                    </div>
                                    
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Header-->

                        
                            <!--begin::Post-->
                            <div class="mb-5">
                                <!--begin::Text-->
                                <p class="text-gray-800 fw-normal mb-5">{{$discussion->content}}</p>
                                <!--end::Text-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center mb-5">
                                    <a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="black" />
                                            <rect x="6" y="12" width="7" height="2" rx="1" fill="black" />
                                            <rect x="6" y="7" width="12" height="2" rx="1" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->{{$discussion->replies->count()}}</a>
                                    <a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->15</a>
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
                        <textarea name="content" class="form-control form-control-solid h-100px"></textarea>
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

            document.querySelector('[data-kk-product-table-filter="search"]').addEventListener("keyup", (function(
                t) {
                table.search(t.target.value).draw()
            }))


        })

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

    </script>
@endpush
