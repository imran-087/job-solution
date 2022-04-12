@extends('layouts.app')

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
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Single Discussion</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Primary button-->
            <a href="{{route('discussion.index')}}" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Back</a>
            <!--end::Primary button-->
        </div>
        
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
                <a href="javascript:;" class="btn btn-primary text-uppercase" onclick="addNew()">New Discussion</a>
                </div>
                <!--end::Add Discussion-->
                <div class="nav">
                    <ul class="nav-item">
                        @foreach($channels as $channel)
                            <a class="nav-link" href="{{ route('discussion.channel', $channel->id) }}"><li class="mb-3">{{$channel->name}}</li></a>
                        @endforeach
                    </ul>
                    <ul class="nav-item ">
                        <a class="nav-link" href="{{ route('discussion.index') }}"><li class="mb-3">All</li></a>
                     </ul>
                </div>
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-8">
                <!--begin::Feeds Widget 4-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body pb-0">
                        <!--begin::Header-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::User-->
                            <div class="d-flex align-items-center flex-grow-1">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-45px me-5">
                                    <img src="/metronic8/demo1/assets/media/avatars/300-7.jpg" alt="">
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ $discussion->user->name }}</a>
                                    <span class="text-gray-400 fw-bold">{{ $discussion->created_at->diffForHumans() }}</span>
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
                        <div class="mb-7">
                            <!--begin::Text-->
                            <div class="text-gray-800 mb-5">{!! $discussion->content !!}</div>
                            <!--end::Text-->
                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center mb-5">
                                <a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor"></path>
                                        <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor"></rect>
                                        <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->22</a>
                                <a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->59</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Post-->
                        <!--begin::Separator-->
                        <div class="separator mb-4"></div>
                        <!--end::Separator-->
                        @if($discussion->reply_id != '')
                        <!--begin::Best reply-->
                        <div class="d-flex mb-5">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-45px me-5">
                                <img src="{{ asset('assets') }}/media/avatars/300-15.jpg" alt="" />
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Info-->
                            <div class="d-flex flex-column flex-row-fluid">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mb-1">
                                    <a href="#" class="text-gray-800 text-hover-primary fw-bolder me-2">{{ $discussion->reply->user->name }}</a>
                                    <span class="text-gray-400 fw-bold fs-7">{{ $discussion->reply->created_at->diffForHumans() }}</span>
                                    {{-- <a href="#" class="ms-auto text-gray-400 text-hover-primary fw-bold fs-7">Reply</a> --}}
                                    <p class="ms-auto badge badge-success fw-bolder" >best reply</p>
                                </div>
                                <!--end::Info-->
                                <!--begin::Post-->
                                <span class="text-gray-800 fs-7 fw-normal pt-1">{{ $discussion->reply->reply }}</span>
                                <!--end::Post-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Best reply-->
                        <div class="separator mb-4"></div>
                        @endif
                        <!--begin::Reply input-->
                        <form class="position-relative mb-6" method="POST" action="{{ route('discussion.reply') }}">
                            @csrf
                            <input type="hidden" name="discussion" value="{{ $discussion->id }}">
                            <textarea class="form-control  form-control-solid border-0   h-100px" name="reply" data-kt-autosize="true" rows="1" placeholder="Write your answer.."></textarea>
                            <input type="submit" class=" submit mt-4 mb-2" value="post answer">
                        </form>
                        <!--edit::Reply input-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Feeds Widget 4-->

                @foreach($replies as $reply)
                <!--begin::Feeds Widget 3-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body pb-0">
                        <!--begin::Header-->
                        <div class="d-flex align-items-center mb-3">
                            <!--begin::User-->
                            <div class="d-flex align-items-center flex-grow-1">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-45px me-5">
                                    <img src="{{ asset('assets') }}/media/avatars/300-15.jpg" alt="" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                   <a href="#" class="text-gray-800 text-hover-primary fw-bolder me-2">{{ $reply->user->name }}</a>
                                        <span class="text-gray-400 fw-bold fs-7">{{ $reply->created_at->diffForHumans() }}</span>
                                        {{-- <a href="#" class="ms-auto text-gray-400 text-hover-primary fw-bold fs-7">Reply</a> --}}
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->
                            <!--begin::Menu-->
                            <div class="my-0">
                                <a href="{{ route('discussions.best-reply', ['discussion' => $discussion->id, 'reply' => $reply->id]) }}" class="ms-auto  fw-bold fs-7 badge badge-primary text-white" id="mark-as-best">mark as best</a>
        
                            </div>
                            <!--end::Menu-->
                            
                        </div>
                        <!--end::Header-->
                        <!--begin::Post-->
                        <div class="mb-7">
                            <!--begin::Text-->
                            <div class="text-gray-800 mb-5">{{ $reply->reply }}</div>
                            <!--end::Text-->
                            <!--begin::Toolbar-->
                            {{-- <div class="d-flex align-items-center mb-5">
                                <a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor"></path>
                                        <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor"></rect>
                                        <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->22</a>
                                <a href="#" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->59</a>
                            </div> --}}
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Post-->
                        <!--begin::Separator-->
                        <div class="separator mb-4"></div>
                        
                        <!--begin::Replies-->
                        <div class="mb-7 ps-10">
                            <!--begin::Reply-->
                            @foreach($reply->comments as $comment)
                            <div class="d-flex mb-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-45px me-5">
                                    <img src="{{ asset('assets') }}/media/avatars/300-16.jpg" alt="" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column flex-row-fluid">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center flex-wrap mb-1">
                                        <a href="#" class="text-gray-800 text-hover-primary fw-bolder me-2">{{ $comment->user->name }}</a>
                                        <span class="text-gray-400 fw-bold fs-7">{{ $comment->created_at->diffForHumans() }}</span>
                                   
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Post-->
                                    <span class="text-gray-800 fs-7 fw-normal pt-1">{{ $comment->content }}</span>
                                    <!--end::Post-->
                                </div>
                                <!--end::Info-->
                                
                            </div>
                            <div class="separator mb-4"></div>
                            <!--end::Separator-->
                            
                            @endforeach
                            <!--end::Reply-->
                            <!--begin::Reply input-->
                            <form class="position-relative mb-6" method="POST" action="{{ route('duscussion.answer.reply') }}">
                                @csrf
                                <input type="hidden" name="reply_id" value="{{ $reply->id }}">
                                <textarea class="form-control border-0 p-0 pe-10 resize-none min-h-25px" data-kt-autosize="true" name="comment" rows="1" placeholder="Reply.." placeholder="add reply to this answer.." style="overflow: hidden; overflow-wrap: break-word; height: 25px;"></textarea>
                                <input type="submit" class="btn btn-sm btn-dark mt-4 mb-2" value="reply">
                            </form>
                            <!--edit::Reply input-->
                        </div>
                        <!--end::Replies-->
                        
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Feeds Widget 3-->
                @endforeach
            </div>
            <!--end::Col-->
           
            <!--begin::Col-->
            <div class="col-xl-2">
                
            </div>
        </div>
    </div>
</div>

<!--begin::Modal - New Product/Service-->
<div class="modal fade" id="kk_modal_new_discussion" tabindex="-1" aria-hidden="true">
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
                <form id="kk_modal_new_discussion_form" class="form" enctype="multipart/form-data">
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
                        <textarea name="content"  class="form-control form-control-solid h-100px"></textarea>
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
        
        // add new
        function addNew(){
            $('input[name="passage_id"]').val('')
            $('.with-errors').text('')
            $('#kk_modal_new_discussion_form')[0].reset();
            $('#kk_modal_new_discussion').modal('show')
        }

       

        //cancel button
        $('#kk_modal_new_service_cancel').on('click', function(){
            $('#kk_modal_new_discussion_form')[0].reset();
            $("#kk_modal_new_discussion").modal('hide');
        })

        //new discussion save
        $('#kk_modal_new_discussion_form').on('submit',function(e){
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
                        $('#kk_modal_new_discussion_form').find('.messages').html(alertBox).show();
                    }else{
                        // empty the form
                        $('#kk_modal_new_discussion_form')[0].reset();
                        $("#kk_modal_new_discussion").modal('hide');
                       
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

    </script>
@endpush
