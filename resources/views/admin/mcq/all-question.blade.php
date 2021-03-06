<div class="card card-bordered mb-5 py-5 px-5">
    @isset($sub_category)
    <div class="card card-bordered mb-5 py-5 px-5">
        <div class=" d-flex flex-column align-items-center justify-content-center ">
            <h3 class="">{{$sub_category->name}}</h3>
            <h5 class="">সাল ঃ {{ $sub_category->year->year }}</h5>
        </div>
    </div>
    @endisset

    @php $serial_number = 1; @endphp
    @if($questions->count() > 0)
    @foreach($questions as $key => $question)
        <div class="card card-bordered mb-5 py-3 px-2">
            <div class="d-flex flex-column align-items-center justify-content-center ">
                <h3 class="">বিষয় ঃ {{$question->subject->name}}</h3>
            </div>
            <div class="card-body">
                @php
                $subject_questions = App\Models\Question::with('question_option', 'descriptions')
                    ->where([
                        'subject_id' => $question->subject_id,
                        'passage_id' => 0,
                        'sub_category_id' => $sub_category->id
                        ])->get();
                @endphp
                <div class="row">
                @foreach($subject_questions as $key => $question)
                    <div class="col-md-6">
                        <div class="card card-bordered mb-5">
                            <div class="card-header">
                                <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                                        <span > {{ $serial_number }}. {{$question->question}} </span>
                                </h3>
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <a href="{{route('admin.question.edit', ['id' => $question->id, 'ques' => $question->slug])}}" target="_blank" class="btn btn-sm btn-icon btn-light btn-active-primary fw-bold edit me-1" ><i class="fas fa-edit"></i></a>
                                    <!--end::Menu-->

                                    <!--begin::Menu-->
                                    <a href="javascript:;" data-id="{{ $question->id }}" class="btn btn-sm btn-icon btn-light btn-active-primary fw-bold delete"><i class="fas fa-trash"></i></a>
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- question image start--}}
                                <div class="text-center mb-3">
                                    @if($question->question_type == 'image')
                                    @isset($question->question_option->image_question)
                                        <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                            <span class="symbol-label">
                                                <img src="{{ asset($question->question_option->image_question) }}" class="h-150 align-self-center" alt="">
                                            </span>
                                        </div>
                                    @endisset
                                    @endif
                                </div>
                                {{-- question image end  --}}

                                <div class="row"  style="font-size: 16px">
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-bold " >
                                        <span >
                                            @if($question->question_option->answer == 1)
                                            <i class="fas fa-check-circle fa-2xl"></i>
                                            @else
                                            <i class="fas fa-dot-circle fa-2xl"></i>
                                            @endif
                                        </span> {{$question->question_option->option_1 }}</p>
                                        @if($question->question_type == 'image')
                                        <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                            <span class="symbol-label">
                                                <img src="{{ asset($question->question_option->image_option[0]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-bold " >
                                        <span >
                                            @if($question->question_option->answer == 2)
                                            <i class="fas fa-check-circle fa-2xl"></i>
                                            @else
                                            <i class="fas fa-dot-circle fa-2xl"></i>
                                            @endif
                                        </span> {{$question->question_option->option_2}}</p>
                                        @if($question->question_type == 'image')
                                        <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                            <span class="symbol-label">
                                                <img src="{{ asset($question->question_option->image_option[1]) }}" class="h-50 align-self-center" alt="">
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-bold">
                                        <span >
                                            @if($question->question_option->answer == 3)
                                            <i class="fas fa-check-circle fa-2xl"></i>
                                            @else
                                            <i class="fas fa-dot-circle fa-2xl"></i>
                                            @endif
                                            </span> {{$question->question_option->option_3 }}</p>
                                            @if($question->question_type == 'image')
                                            <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                <span class="symbol-label">
                                                    <img src="{{ asset($question->question_option->image_option[2]) }}" class="h-50 align-self-center" alt="">
                                                </span>
                                            </div>
                                            @endif
                                    </div>
                                    @isset($question->question_option->option_4)
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-bold " >
                                        <span >
                                            @if($question->question_option->answer == 4)
                                            <i class="fas fa-check-circle fa-2xl"></i>
                                            @else
                                            <i class="fas fa-dot-circle fa-2xl"></i>
                                            @endif
                                            </span> {{ $question->question_option->option_4 }}</p>
                                            @if($question->question_type == 'image')
                                            <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                <span class="symbol-label">
                                                    <img src="{{ asset($question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
                                                </span>
                                            </div>
                                            @endif
                                    </div>
                                    @endisset
                                    @isset($question->question_option->option_5)
                                    <div class="col-md-6">
                                        <p class="text-gray-800 fw-bold " >
                                        <span >
                                            @if($question->question_option->answer == 5)
                                            <i class="fas fa-check-circle fa-2xl"></i>
                                            @else
                                            <i class="fas fa-dot-circle fa-2xl"></i>
                                            @endif
                                            </span> {{ $question->question_option->option_5 }}</p>
                                            @if($question->question_type == 'image')
                                            <div class="symbol symbol-45px me-2 mb-5 mt-2">
                                                <span class="symbol-label">
                                                    <img src="{{ asset($question->question_option->image_option[4]) }}" class="h-50 align-self-center" alt="">
                                                </span>
                                            </div>
                                            @endif
                                    </div>
                                    @endisset
                                </div>

                                {{--  Question Tag --}}
                                @foreach($question->subjects as $tag)
                                    <span class="badge badge-success fs-7 mb-3 tag">{{ $tag->name }}<span class="ms-2 cursor-pointer d-none text-danger fs-5 X" data-id={{ $tag->id }}>X</span></span>
                                @endforeach
                                {{-- </div> --}}

                                <div class="row">
                                    <!--end::Input group-->
                                    @if($question->descriptions->count() > 0)
                                        @foreach($question->descriptions as $description)
                                        <span class="text-muted d-flex justify-content-between">
                                            <span>added by <span class="text-uppercase text-black fw-bolder fs-7">{{ $description->created_by->name }}</span></span>
                                            <span> {{ $description->created_at  }}</span>
                                        </span>
                                        <span class="text-gray-800 fw-bold ml-4 cursor-pointer update-des" data-description_id={{ $description->id }} style="text-align: justify">{{ $description->description }}</span>
                                        @endforeach
                                    @endif

                                    <!-- start: update description -->
                                    <div class="d-flex flex-column mt-2 fv-row update-form">
                                        
                                    </div>
                                    <!-- end: description update -->

                                   
                                    <!-- Start: description add -->
                                    <span class="add-description cursor-pointer" data-question_id="{{ $question->id }}"><i class="fas fa-plus-circle fa-2xl"></i> <span class="fw-bolder fs-5">Description</span> </span>
                                    <div class="d-flex flex-column mt-2 fv-row add-des-form">
                                        
                                    </div>
                                    <!-- end: description add -->
                                </div>

                                <div class="row mt-5 mb-5">
                                    <input type="text"  data-question_id="{{ $question->id }}" data-subject_id="{{ $question->subject_id }}" class="form-control form-control-solid w-180px  search_tag"  placeholder="Type to search tag">
                                    <div class="result" style="z-index:999"></div>
                                </div>
                                <div class="row">
                                    <span class="text-muted d-flex justify-content-between">
                                        <span>added by <span class="text-uppercase text-black fw-bolder fs-7">{{ $question->created_by->name }}</span></span>
                                        <span> {{ $question->created_at  }}</span>
                                    </span>
                                    @isset($question->updated_user_id)
                                    <span class="text-muted d-flex justify-content-between">
                                        <span>updated by <span class="text-uppercase text-black fw-bolder fs-7">{{ $question->updated_by->name }}</span></span>
                                        <span> {{ $question->updated_at   }}</span>
                                    </span>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $serial_number++ ; @endphp
                @endforeach
                </div>
            </div>
        </div>

    @endforeach
    @else
    <div class="card card-bordered mb-5">
            <div class="card-header d-flex align-items-center justify-content-center ">
                <h3 class="text-danger">No Question found !!!</h3>
            </div>
    </div>
    @endif

    @if($passages->count() > 0)
    <div class="col-md-12">
        <!--begin::apassage question-->
        <div class="row" >
            @foreach($passages as $key => $passage)
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-bordered mb-5">
                        <div class="card-header p-10">

                            <h3 class="card-title text-gray-700  mb-0 view">
                                <span ><span class="fs-3 fw-bold" style="color: black">Read the passage and answer the following question :</span><br> {!! $passage->passage !!} </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            @foreach($passage->questions as $question)

                            <div class="col-md-6">
                                <div class="card card-bordered mb-5">
                                    <div class="card-header">
                                        <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                                                <span > {{ $serial_number }}. {{$question->question}} </span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <a href="{{route('admin.question.edit', ['id' => $question->id, 'ques' => $question->slug])}}" class="btn btn-sm btn-icon btn-light btn-active-primary fw-bold edit" ><i class="fas fa-edit"></i></a>
                                            <!--end::Menu-->
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="row"  style="font-size: 16px">
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " >
                                                <span >
                                                    @if($question->question_option->answer == 1)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                </span> {{$question->question_option->option_1 }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " >
                                                <span >
                                                    @if($question->question_option->answer == 2)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                </span> {{$question->question_option->option_2}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " >
                                                <span >
                                                    @if($question->question_option->answer == 3)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                    </span> {{$question->question_option->option_3 }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-gray-800 fw-bold " >
                                                <span >
                                                    @if($question->question_option->answer == 4)
                                                    <i class="fas fa-check-circle fa-2xl"></i>
                                                    @else
                                                    <i class="fas fa-dot-circle fa-2xl"></i>
                                                    @endif
                                                    </span> {{$question->question_option->option_4 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $serial_number++ ; @endphp
                            @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            @endforeach
        </div>
        <!--end::passage question-->
    </div>
    @endif

</div>
