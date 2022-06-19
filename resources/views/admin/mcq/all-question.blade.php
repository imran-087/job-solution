<div class="card card-bordered mb-5 py-5 px-5">
    @if($sub_category != '')
    <div class="card card-bordered mb-5 py-5 px-5">
        <div class=" d-flex flex-column align-items-center justify-content-center ">
            <h3 class="">{{$sub_category->name}}</h3>
            <h5 class="">সাল ঃ {{$sub_category->year->year}}</h5>
        </div>
    </div>
    @endif
    

    @if($questions->count() > 0)

    @foreach($questions as $key => $question)
        <div class="card card-bordered mb-5 py-3 px-2">
            <div class="d-flex flex-column align-items-center justify-content-center ">
                <h3 class="">বিষয় ঃ {{$question->subject->name}}
                {{ $question->subject_id }}</h3>
            </div>
            <div class="card-body">
                @php
                $subject_questions = App\Models\Question::with('question_option', 'descriptions')->where(['subject_id' => $question->subject_id, 'sub_category_id' => $sub_category->id])->get();
                @endphp
                <div class="row">
                @foreach($subject_questions as $key => $question)
                    <div class="col-md-6">
                        <div class="card card-bordered mb-5">
                            <div class="card-header">
                                <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                                        <span > {{ $question->id }}. {{$question->question}} </span>
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

                                <div class="row">
                                    <!--end::Input group-->
                                    @if($question->descriptions->count() > 0)
                                        @foreach($question->descriptions as $description) 
                                        <p class="text-gray-800 fw-bold ml-4 cursor-pointer update-des" style="text-align: justify"><b>Description : </b> {{ $description->description }}</p>

                                        <div class="d-flex flex-column mt-2 fv-row update-form d-none">
                                            <form id="kk_update_description_form" class="form">
                                                <div class="messages"></div>
                                                {{-- csrf token  --}}
                                                @csrf
                                                <input type="hidden" name="description_id" value="{{ $description->id }}">
                                                <div class="col-md-12 mb-5">
                                                    <textarea name="description" class="form-control form-control-solid h-150px">{{ $description->description }}</textarea>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    
                                                    <button type="submit" id="kk_modal_new_service_update" class="btn btn-primary btn-sm">update</button>
                                                </div>
                                            </form>
                                            
                                            <button type="button " class="btn btn-danger btn-sm me-3 kk_modal_new_update_cancel mb-5" style="width:80px; margin-top:-35px">cancel</button>
                                            
                                        </div>
                                        @endforeach
                                    @endif

                                    <span class="add-description cursor-pointer "><i class="fas fa-plus-circle fa-2xl"></i> <b>Description</b> </span>

                                    <div class="d-flex flex-column mt-2 fv-row des-form d-none">
                                        <form id="kk_add_description_form" class="form">
                                            <div class="messages"></div>
                                            {{-- csrf token  --}}
                                            @csrf
                                            <input type="hidden" name="question" value="{{ $question->id }}">
                                            <div class="col-md-12 mb-5">
                                                <textarea name="description" class="form-control form-control-solid h-100px"></textarea>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary btn-sm">
                                                <span class="indicator-label">add</span>
                                            </div>
                                        </form>
                                        <button type="button " class="btn btn-danger btn-sm me-3 kk_modal_new_add_cancel mb-5" style="width:80px; margin-top:-35px">cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
       
    @endforeach
    @else
    <div class="card card-bordered mb-5">
            <div class="card-header d-flex align-items-center justify-content-center ">
                <h3 class="text-danger">No Question found</h3>
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
                                                <span > {{ $question->id }}. {{$question->question}} </span>
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