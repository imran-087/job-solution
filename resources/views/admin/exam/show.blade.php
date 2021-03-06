@extends('admin.layout.app')
@section('title', 'Exam view')

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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Exam </h1>
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
                    <li class="breadcrumb-item text-muted">Exam Question</li>
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
    <div class="post d-flex flex-column-fluid col-12" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header py-10 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="">{{$exam->category->name ?? ''}}</h5>
                            <h6 class=""> {{$exam->sub_category->name ?? ''}}</h6>
                            <h3 class="card-title">{{$exam->name ?? ''}}</h3>
                            
                        </div>
                        <div class="card-header fw-bold d-flex justify-content-between py-3 px-5 ">
                            <div class="left fw-bolder">
                                <p>Total Question: {{ $exam->number_of_question }}</p>
                                <p>Total Mark: {{ $exam->mark }}</p>
                                <p>Cut Mark: {{ $exam->cut_mark }}</p>
                                <p>Negative Mark: {{ $exam->negative_mark }}</p>
                            </div>
                            <div class="right fw-bolder">
                                <p>Duration: {{ $exam->duration }}</p>
                                <p>Time: {{ Carbon\Carbon::parse($exam->exam_starting_time)->format('g:i:s A') }}</p>
                                <p>Date: {{ Carbon\Carbon::parse($exam->exam_starting_time)->format('d-m-Y ') }}</p>
                               
                            </div>
                        </div>
                        @php $serial_number = 1 ; @endphp
                        <div class="card-body">
                            @foreach ($exam_details as $kay => $exam_detail)
                            <div class="card card-bordered mb-5">
                                <div class="card-header d-flex justify-content-center align-items-center card-success">
                                    <h3 class="card-title  text-gray-700 fw-bolder cursor-pointer mb-0">
                                            <span class=""> ??????????????? {{ $exam_detail[0] }} </span>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    @foreach ($exam_detail[1] as $passage_id  => $questions)
                                        @if ($passage_id != 0) 
                                            @php $passage = App\Models\Passage::find($passage_id); @endphp
                                            {{-- <h4>{{ $passage->title }}</h4> --}}
                                            <h5>{!! $passage->passage !!}</h5>
                                        @endif
                                    
                                        <div class="row">
                                            @foreach($questions as $question)
                                                @php $question = (object) $question @endphp
                                                <div class="col-md-6">
                                                    <div class="card card-bordered mb-5">
                                                        <div class="card-header card-success">
                                                            <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0">
                                                                    <span > {{ $serial_number }}. {{$question->question}} </span>
                                                            </h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row"  style="font-size: 16px">
                                                                <div class="col-md-6">
                                                                    <p class="text-gray-800 fw-bold " > 
                                                                        <span ><i class="{{ $question->answer == 1 ? 'fas' : 'far' }} fa-circle fa-2xl"></i></span> {{$question->option_1 }}
                                                                    </p>
                                                                    @if($question->question_type == 'image')
                                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                                        <span class="symbol-label">
                                                                            <img src="{{ asset($question->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                                                        </span>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p class="text-gray-800 fw-bold " > 
                                                                        <span><i class="{{ $question->answer == 2 ? 'fas' : 'far' }} fa-circle fa-2xl"></i></span> {{$question->option_2}}
                                                                    </p>
                                                                    @if($question->question_type == 'image')
                                                                    <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                                        <span class="symbol-label">
                                                                            <img src="{{ asset($question->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                                                        </span>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p class="text-gray-800 fw-bold"> 
                                                                    <span ><i class="{{ $question->answer == 3 ? 'fas' : 'far' }} fa-circle fa-2xl"></i></span> {{$question->option_3 }}</p>
                                                                        @if($question->question_type == 'image')
                                                                        <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                                            <span class="symbol-label">
                                                                                <img src="{{ asset($question->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                                                            </span>
                                                                        </div>
                                                                        @endif
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p class="text-gray-800 fw-bold " > 
                                                                    <span ><i class="{{ $question->answer == 4 ? 'fas' : 'far' }} fa-circle fa-2xl"></i> </span> {{$question->option_4 }}</p>
                                                                        @if($question->question_type == 'image')
                                                                        <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                                            <span class="symbol-label">
                                                                                <img src="{{ asset($question->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                                                            </span>
                                                                        </div>
                                                                        @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php $serial_number++ ; @endphp
                                            @endforeach
                                        </div>  
                                    @endforeach
                                </div>
                            </div>
                            @endforeach 
                        </div>
                        <div class="card-footer">
                            Footer
                        </div>
                    </div>
                </div>
               
            </div>
            
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    
</div>

@endsection


