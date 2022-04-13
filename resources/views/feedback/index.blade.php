@extends('layouts.app')

@section('title', 'Feedback')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Feedback</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('question/all-question') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">User Feedback</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Feedback List</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
            
        </div>
        <!--end::Page title-->
         <div class="d-flex align-items-center gap-2 gap-lg-3">
            @guest
            <!--begin::Primary button-->
            <a href="{{ route('login') }}" class="btn btn-sm btn-primary" id="readingMode" >Login</a>
            <!--end::Primary button-->
            @endguest
        </div>
    
     
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin:Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        <div class="row gy-5 g-xl-10">
            <div class="col-lxl-8 col-lg-8 col-md-10 col-sm-12 col-xs-12">
                @foreach($feedbacks as $feedback)
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body pb-0">
                        <!--begin::Header-->
                        <div class="d-flex align-items-center mb-3">
                            <!--begin::User-->
                            <div class="d-flex align-items-center flex-grow-1">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-45px me-5">
                                    <img src="assets/media/avatars/300-21.jpg" alt="">
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ $feedback->user->name }}</a>
                                    <span class="text-gray-400 fw-bold">{{ $feedback->created_at->diffForHumans() }}</span>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->
                            
                        </div>
                        <!--end::Header-->
                        <!--begin::Post-->
                        <div class="mb-7">
                            <!--begin::Text-->
                            <div class="text-gray-800 mb-5">{{ $feedback->feedback }}</div>                            <!--end::Text-->
                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center mb-5">
        
                                <a href="javascript:;" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 like" data-id="{{ $feedback->id }}">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->{{ $feedback->like}}</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Post-->
                        
                       
                    </div>
                    <!--end::Body-->
                </div>
               
                @endforeach
                <div class="mb-5">
                    {{ $feedbacks->links() }}
                </div>
                @auth
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body pb-0">
                        <!--begin::Header-->
                        <div class="d-flex align-items-center">
                            <!--begin::User-->
                            <div class="d-flex align-items-center flex-grow-1">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-45px me-5">
                                    <img src="assets/media/avatars/300-6.jpg" alt="">
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ Auth::user()->name }}</a>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->
                            
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form id="kt_forms_widget_1_form" class="ql-quil ql-quil-plain pb-3" method="POST" action="{{ route('feedback.store') }}">
                            @csrf
                            <!--begin::Input group-->
                            <div class="d-flex flex-column fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 mt-2">
                                    
                                </label>
                                <!--end::Label-->
                                <textarea name="feedback" class="form-control form-control-solid h-100px @error('feedback') is-invalid @enderror" placeholder="Give us your valuable feedback ....."></textarea>
                                @error('feedback')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="help-block with-errors feedback-error"></div>
                            </div>
                            <!--end::Input group-->
                            <div>
                                <button class="btn btn-sm btn-dark text-white" type="submit">Give us feedback</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Body-->
                </div>
                @endauth
               
            </div>
        </div>
        <!--end::Row-->  
        
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->
@endsection

@push('script')
    <script type="text/javascript">
        //news/feedback vote/like
        $('.like').on('click', function(){
            var id = $(this).data('id')
            //console.log(id)
            var val = $(this).text()
            $(this).html(`<i class="fas fa-heart"></i>`+(parseInt(val)+1))
            //console.log(val)
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('feedback/like')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    if(data.success){
                        toastr.success(data.message);
                    }else{
                        toastr.warning(data.message);
                    }
                  
                }
            })
        });
    </script>
@endpush