
@foreach($questions as $key => $question)
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
                <div class="col-md-6">
                    <p class="text-gray-800 fw-bold " > 
                    <span >
                        @if($question->question_option->answer == 4)
                        <i class="fas fa-check-circle fa-2xl"></i>
                        @else
                        <i class="fas fa-dot-circle fa-2xl"></i>
                        @endif
                        </span> {{$question->question_option->option_4 }}</p>
                        @if($question->question_type == 'image')
                        <div class="symbol symbol-45px me-2 mb-5 mt-2">
                            <span class="symbol-label">
                                <img src="{{ asset($question->question_option->image_option[3]) }}" class="h-50 align-self-center" alt="">
                            </span>
                        </div>
                        @endif
                </div>
            </div>

            <div class="row">
                <span class="add-description cursor-pointer "><i class="fas fa-plus-circle fa-2xl"></i> <b>Description</b> </span>
                <!--end::Input group-->
                @if($question->descriptions->count() > 0)
                @foreach($question->descriptions as $description) 
                <div class="row">
                   
                    <p class="text-gray-800 fw-bold mt-4 ml-4"> {{ $description->description }}</p>
                </div>
                @endforeach
                @endif
                <div class="d-flex flex-column mb-8 fv-row des-form d-none">
                    <form id="kk_add_description_form" class="form">
                        <div class="messages"></div>
                        {{-- csrf token  --}}
                        @csrf
                        <input type="hidden" name="question" value="{{ $question->id }}">
                        <div class="col-md-12 mb-5">
                            <textarea name="description" class="form-control form-control-solid h-100px"></textarea>
                        </div>
                        <div class="col-md-2 offset-10">
                            <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary btn-sm">
                            <span class="indicator-label">add</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@if($passages->count() > 0)
<div class="col-md-12">
    <!--begin::apassage question-->    
    <div class="row" >
        @foreach($passages as $key => $passage)
        <div class="row">
            <div class="col-md-12">
                <div class="card card-bordered mb-5">
                    <div class="card-header p-10">
                        <h4>Read the passage and answer the following question:</h4>
                        <h3 class="card-title text-gray-700  cursor-pointer mb-0 view"  style="max-width: 1100px !important; line-height:24px">
                                <span > {!! $passage->passage !!} </span>
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
   