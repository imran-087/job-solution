@extends('layouts.app')

@section('title', 'News-Feed')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">News Feed</h1>
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
                <li class="breadcrumb-item text-dark">Feed</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">News List</li>
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
            <div class="col-md-2 ">
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body pb-0">
                        <!--begin::Catigories-->
                        <div class="mb-15">
                            <h4 class="text-black mb-5">News Category</h4>
                            <!--begin::Menu-->
                            <div class="menu menu-rounded menu-column menu-title-gray-700 menu-state-title-primary menu-active-bg-light-primary fw-bold">
                                @foreach($categories as $category)
                                <!--begin::Item-->
                                <div class="menu-item mb-3">
                                    <!--begin::Link-->
                                    <a class="menu-link py-3 active" href="{{ route('news-feed', ['id' => $category->id, 'category' => $category->name]) }}">{{$category->name}}</a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Item-->
                                @endforeach
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Catigories-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="col-md-6">
                @if($feeds->count() > 0)
                @foreach($feeds as $feed)
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
                                    <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bolder">{{ $feed->user->name }}</a>
                                    <span class="text-gray-400 fw-bold">{{ $feed->created_at->diffForHumans() }}</span>
                                </div>
                                <!--end::Info-->
                               
                            </div>
                            <!--end::User-->
                            <!--begin::Menu-->
                            <div class="my-0">
                                <div class="badge badge-info">
                                <a href="">{{ $feed->category->name }}</a>
                                </div>
                            </div>
                            <!--end::Menu-->
                            
                        </div>
                        <!--end::Header-->
                        <!--begin::image-->
                        <div>
                            <!--begin::Avatar-->
                                <div class="symbol symbol-45px me-5">
                                    <img src="assets/media/avatars/300-21.jpg" alt="">
                                </div>
                            <!--end::Avatar-->
                        </div>
                        <!--begin::Post-->
                        <div class="mb-7">
                            <!--begin::Text-->
                            <div class="text-gray-800 mb-5">{{ $feed->content }}</div>                            <!--end::Text-->
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
                                <!--end::Svg Icon-->{{$feed->comments->count()}}</a>
                                <a href="javascript:;" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 like" data-id="{{ $feed->id }}">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->{{ $feed->like}}</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Post-->
                        <!--begin::Replies-->
                        <div class="mb-7 ps-10">
                            @foreach($feed->comments as $comment)
                            <!--begin::Reply-->
                            <div class="d-flex mb-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-45px me-5">
                                    <img src="assets/media/avatars/300-14.jpg" alt="">
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column flex-row-fluid">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center flex-wrap mb-1">
                                        <a href="#" class="text-gray-800 text-hover-primary fw-bolder me-2">{{ $comment->user->name }}</a>
                                        <span class="text-gray-400 fw-bold fs-7">{{ $comment->created_at->diffForHumans() }}</span>
                                        {{-- <a href="#" class="ms-auto text-gray-400 text-hover-primary fw-bold fs-7">Reply</a> --}}
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Post-->
                                    <span class="text-gray-800 fs-7 fw-normal pt-1">{{ $comment->content }}</span>
                                    <!--end::Post-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Reply-->
                            @endforeach
                        </div>
                        <!--end::Replies-->
                        <!--begin::Separator-->
                        <div class="separator mb-4"></div>
                        <!--end::Separator-->
                        <!--begin::Reply input-->
                        <form class="position-relative mb-6" method="POST" action="{{ route('feed.reply') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $feed->id }}">
                            <textarea name="reply" class="form-control border-0 p-0 pe-10 resize-none min-h-25px @error('reply') is-invalid @enderror" data-kt-autosize="true" rows="1" placeholder="Reply.." style="overflow: hidden; overflow-wrap: break-word; height: 25px;"></textarea>
                            <div class="position-absolute top-0 end-0 me-n5"> 
                                <span class="btn btn-icon btn-sm btn-active-color-primary ps-0">
                                   <button type="submit" class=" py-1 px-2" style="border: none; border-radius:7px"><i class="fas fa-arrow-alt-circle-right fa-2xl" style="font-size: 20px !important"></i></button>
                                </span>
                            </div>
                            @error('reply')
                            <span class="invalid-reply" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </form>
                        <!--edit::Reply input-->
                    </div>
                    <!--end::Body-->
                </div>
                @endforeach
                @else
                 <div class="card mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body pb-0">
                        <h4 class="text-black mb-5 text-muted">No news available for this category !!!</h4>
                    </div>
                    <!--end::Body-->
                </div>
                @endif
                <div class="mb-5">
                    {{ $feeds->links() }}
                </div>
            </div>
            <div class="col-md-4" >
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
                        <form id="kt_forms_widget_1_form" class="ql-quil ql-quil-plain pb-3" method="POST" action="{{ route('feed.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Input group-->
                            <div class="d-flex flex-column fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 mt-2">
                                </label>
                                <!--end::Label-->
                                <input type="text" name="title" class="form-control form-control-solid @error('title') is-invalid @enderror" placeholder="Enter news title" value={{ old('title') }}>
                                @error('title')
                                <span class="invalid-title" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="help-block with-errors text-error"></div>
                            </div>
                            <!--end::Input group-->
                            
                            <!--begin::Input group-->
                            <div class="d-flex flex-column fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2 ">
                                </label>
                                <!--end::Label-->
                                <textarea name="content" class="form-control form-control-solid h-200px @error('content') is-invalid @enderror" placeholder="Whats on your mind?">{{ old('content') }}</textarea>
                                @error('content')
                                <span class="invalid-content" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="help-block with-errors description-error"></div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Col-->
                            <div class="input-group mb-5">
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select news category" name="category_id" required >
                                    <option value=""></option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end:Col-->
                            <div class="mb-3">
                                <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="formFile" value="{{ old('image') }}">
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--begin::Input group-->
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">
                                    <i class="las la-wallet fs-1"></i>
                                </span>
                                <input type="text" class="form-control @error('reference_url') is-invalid @enderror" name="reference_url"  placeholder="Reference url" value="{{ old('reference_url') }}" aria-describedby="basic-addon3"/>
                                @error('reference_url')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-sm btn-dark text-white" type="submit">Post</button>
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
        //news/feed vote/like
        $('.like').on('click', function(){
            var id = $(this).data('id')
            //console.log(id)
            var val = $(this).text()
            $(this).html(`<i class="fas fa-heart"></i>`+(parseInt(val)+1))
            //console.log(val)
            //alert(id)
            $.ajax({
                type:"GET",
                url: "{{ url('feed/news/like')}}"+'/'+id,
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