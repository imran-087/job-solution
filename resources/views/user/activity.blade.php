@extends('layouts.app')
@section('title', 'Profile')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">User Dashboard</h1>
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
                <li class="breadcrumb-item text-dark">Profile</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Profile Overview</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
     
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin:Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        
        <!--begin::Overview-->
        @include('user.dashboard_header')
        <!--end::Overview-->

        <!--begin::details View-->
        <div class="row">
            <div class="col-xl-4">
                <!--begin::List Widget 5-->
                <div class="card card-xl-stretch">
                    <!--begin::Header-->
                    <div class="card-header align-items-center border-0 mt-4">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="fw-bolder mb-2 text-dark">Bookmarks</span>
                            <span class="text-muted fw-bold fs-7">Total: {{ $bookmarks->count() }} Bookmark</span>
                        </h3>
                        <div>
                            <a href="" class="btn btn-sm btn-light btn-active-color-dark">view all</a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Timeline-->
                        <div class="timeline-label">
                            <!--begin::Item-->
                            @foreach($bookmarks as $bookmark)
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bolder text-gray-800 fs-8 " >{{ $bookmark->created_at->diffForHumans() }}</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-warning fs-1"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="fw-mormal timeline-content text-muted ps-3">
                                    <a href="{{ route('question.single-question', ['ques_id' => $bookmark->question_id]) }}">
                                        {{ $bookmark->question->question }} <br>
                                        <span style="color: #4FCA88; font-weight:600">
                                            @if($bookmark->question->question_type == 'mcq')
                                                @switch($bookmark->question->question_type == 'mcq')
                                                    @case($bookmark->question->question_option->answer == 1)
                                                        <span> answer: {{ $bookmark->question->question_option->option_1 }}</span>
                                                        @break

                                                    @case($bookmark->question->question_option->answer == 2)
                                                    <span> answer: {{ $bookmark->question->question_option->option_2 }}</span>
                                                        @break

                                                    @case($bookmark->question->question_option->answer == 3)
                                                    <span> answer: {{ $bookmark->question->question_option->option_3 }}</span>
                                                        @break

                                                    @case($bookmark->question->question_option->answer == 4)
                                                    <span> answer: {{ $bookmark->question->question_option->option_4 }}</span>
                                                        @break

                                                    @case($bookmark->question->question_option->answer == 5)
                                                    <span> answer: {{ $bookmark->question->question_option->option_5 }}</span>
                                                        @break

                                                    @default
                                                        <span>Something went wrong, please try again</span>
                                                @endswitch

                                            @elseif($bookmark->question->question_type == 'written')
                                                <span> answer: {{ $bookmark->question->question_option->written_answer }}</span>
                                            @elseif($bookmark->question->question_type == 'samprotik')
                                                <span> answer: {{ $bookmark->question->question_option->answer }}</span>
                                            @else
                                            <span> Please click to view</span>
                                            @endif
                                        </span>
                                    </a>
                                    
                                </div>
                                
                                <!--end::Text-->
                            </div>
                            @endforeach
                            <!--end::Item-->
                        </div>
                        <!--end::Timeline-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end: List Widget 5-->
            </div>
            <div class="col-xl-4">
                <!--begin::List Widget 5-->
                <div class="card card-xl-stretch">
                    <!--begin::Header-->
                    <div class="card-header align-items-center border-0 mt-4">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="fw-bolder mb-2 text-dark">Description </span>
                            <span class="text-muted fw-bold fs-7">Total: {{ $add_descriptions->count() }} Description added</span>
                        </h3>
                        <div>
                            <a href="{{ route('user.activity', ['description' => 'view-all']) }}" class="btn btn-sm btn-light btn-active-color-dark">view all</a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Timeline-->
                        <div class="timeline-label">
                            <!--begin::Item-->
                            @foreach($add_descriptions as $description)
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bolder text-gray-800 fs-8 " >{{ $description->created_at->diffForHumans() }}</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-warning fs-1"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="fw-mormal timeline-content text-muted ps-3"><a href="{{ route('question.single-question', ['ques_id' => $description->question_id]) }}">{{ Str::limit($description->description, 25, '...') }}</a></div>
                                <!--end::Text-->
                            </div>
                            @endforeach
                            <!--end::Item-->
                        </div>
                        <!--end::Timeline-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end: List Widget 5-->
            </div>
            <div class="col-xl-4 ">
                <!--begin::List Widget 5-->
                <div class="card card-xl-stretch">
                    <!--begin::Header-->
                    <div class="card-header align-items-center border-0 mt-4">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="fw-bolder mb-2 text-dark">Edit Question </span>
                            <span class="text-muted fw-bold fs-7">Total: {{ $edit_questions->count() }} Question edited</span>
                        </h3>
                        <div>
                            <a href="" class="btn btn-sm btn-light btn-active-color-dark">view all</a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Timeline-->
                        <div class="timeline-label">
                            <!--begin::Item-->
                            @foreach($edit_questions as $question)
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bolder text-gray-800 fs-8 " >{{ $question->created_at->diffForHumans() }}</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-warning fs-1"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="fw-mormal timeline-content text-muted ps-3"><a href="{{ route('question.single-question', ['ques_id' => $question->id]) }}">{{ $question->question }}</a></div>
                                <!--end::Text-->
                            </div>
                            @endforeach
                            <!--end::Item-->
                        </div>
                        <!--end::Timeline-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end: List Widget 5-->
            </div>
            <div class="col-xl-4 mt-5">
                <!--begin::List Widget 5-->
                <div class="card card-xl-stretch">
                    <!--begin::Header-->
                    <div class="card-header align-items-center border-0 mt-4">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="fw-bolder mb-2 text-dark">Comments </span>
                            <span class="text-muted fw-bold fs-7">Total: {{ $comments->count() }} Comments added</span>
                        </h3>
                        <div>
                            <a href="" class="btn btn-sm btn-light btn-active-color-dark">view all</a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Timeline-->
                        <div class="timeline-label">
                            <!--begin::Item-->
                            @foreach($comments as $comment)
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bolder text-gray-800 fs-8 " >{{ $comment->created_at->diffForHumans() }}</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-warning fs-1"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="fw-mormal timeline-content text-muted ps-3">
                                    {{-- <a href="{{ route('question.single-question', ['ques_id' => $comment->question->id]) }}">
                                        {{ $comment->question->question }} <br>
                                        <span > <span style="color:#F65667; font-weight:600">Comment:</span>  {{ $comment->comment }}</span>
                                    </a> --}}
                                </div>
                                <!--end::Text-->
                            </div>
                            @endforeach
                            <!--end::Item-->
                        </div>
                        <!--end::Timeline-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end: List Widget 5-->
            </div>
            <div class="col-xl-4 mt-5">
                <!--begin::List Widget 5-->
                <div class="card card-xl-stretch">
                    <!--begin::Header-->
                    <div class="card-header align-items-center border-0 mt-4">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="fw-bolder mb-2 text-dark">Discussion Create </span>
                            <span class="text-muted fw-bold fs-7">Total: {{ $discussions->count() }} Discussion added</span>
                        </h3>
                        <div>
                            <a href="" class="btn btn-sm btn-light btn-active-color-dark">view all</a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Timeline-->
                        <div class="timeline-label">
                            <!--begin::Item-->
                            @foreach($discussions as $discussion)
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bolder text-gray-800 fs-8 " >{{ $discussion->created_at->diffForHumans() }}</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-warning fs-1"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="fw-mormal timeline-content text-muted ps-3">
                                    <a href="">
                                        {!! $discussion->content !!} <br>
                                        <span style="color:#F65667; font-weight:600"> {{ $discussion->replies->count() }} Replies</span>
                                    </a>
                                </div>
                                <!--end::Text-->
                            </div>
                            @endforeach
                            <!--end::Item-->
                        </div>
                        <!--end::Timeline-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end: List Widget 5-->
            </div>
            <div class="col-xl-4 mt-5">
                <!--begin::List Widget 5-->
                <div class="card card-xl-stretch">
                    <!--begin::Header-->
                    <div class="card-header align-items-center border-0 mt-4">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="fw-bolder mb-2 text-dark">Reply to a discussion</span>
                            <span class="text-muted fw-bold fs-7">Total: {{ $replies->count() }} added</span>
                        </h3>
                        <div>
                            <a href="" class="btn btn-sm btn-light btn-active-color-dark">view all</a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Timeline-->
                        <div class="timeline-label">
                            <!--begin::Item-->
                            @foreach($replies as $reply)
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bolder text-gray-800 fs-8 " >{{ $reply->created_at->diffForHumans() }}</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless text-warning fs-1"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="fw-mormal timeline-content text-muted ps-3">
                                    <a href="">
                                       <span style="color:#65CB88; font-weight:600">replies: {{ $reply->reply }} </span> <br>
                                        <span > {!! $reply->discussion->content !!} </span>
                                    </a>
                                </div>
                                <!--end::Text-->
                            </div>
                            @endforeach
                            <!--end::Item-->
                        </div>
                        <!--end::Timeline-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end: List Widget 5-->
            </div>
        </div>
        <!--end::details View-->
        
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->
@endsection


