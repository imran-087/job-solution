@php $serial_number = 1 ; @endphp
@foreach($questions as $key => $question)
<div class="col-md-6">
    <div class="card card-bordered mb-5">
        <div class="card-header">
            <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                    <span > {{ $serial_number }}. {{$question->question}} </span>
            </h3>
            <div class="card-toolbar">
                <!--begin::Menu-->
                <a href="{{route('admin.samprotik.edit', ['id' => $question->id, 'ques' => $question->slug])}}" target="_blank" class="btn btn-sm btn-icon btn-light btn-active-primary me-1 fw-bold edit" ><i class="fas fa-edit"></i></a>
                <!--end::Menu-->
                <!--begin::Menu-->
                <a href="javascript:;" data-id="{{ $question->id }}" class="btn btn-sm btn-icon btn-light btn-active-primary fw-bold delete"><i class="fas fa-trash"></i></a>
                <!--end::Menu-->

            </div>

        </div>
        
        @if($question->options != '')
        <div class="card-body">
            <div class="row"  style="font-size: 16px">
                <div class="col-md-6">
                    <p class="text-gray-800 fw-bold " >
                    <span >
                        @if($question->options['answer'] == 1)
                        <i class="fas fa-check-circle fa-2xl"></i>
                        @else
                        <i class="fas fa-dot-circle fa-2xl"></i>
                        @endif
                    </span> {{$question->options['option_1'] }}</p>
                </div>
                <div class="col-md-6">
                    <p class="text-gray-800 fw-bold " >
                    <span >
                         @if($question->options['answer'] == 2)
                        <i class="fas fa-check-circle fa-2xl"></i>
                        @else
                        <i class="fas fa-dot-circle fa-2xl"></i>
                        @endif
                    </span> {{$question->options['option_2'] }}</p>
                </div>
                <div class="col-md-6">
                    <p class="text-gray-800 fw-bold " >
                    <span >
                         @if($question->options['answer'] == 3)
                        <i class="fas fa-check-circle fa-2xl"></i>
                        @else
                        <i class="fas fa-dot-circle fa-2xl"></i>
                        @endif
                        </span> {{$question->options['option_3'] }}</p>
                </div>
                <div class="col-md-6">
                    <p class="text-gray-800 fw-bold " >
                    <span >
                         @if($question->options['answer'] == 4)
                        <i class="fas fa-check-circle fa-2xl"></i>
                        @else
                        <i class="fas fa-dot-circle fa-2xl"></i>
                        @endif
                        </span> {{$question->options['option_4'] }}</p>
                </div>
            </div>
        </div>
        @else
        <div class="card-body">
            <div class="row"  style="font-size: 16px">
               <p class="text-gray-800 fw-bold " >
                    <span style="color:green; font-weight:bold">উত্তর:</span> {{$question->answer }}</p>
            </div>
            
            {{-- Samprotik Question Tag --}}
            @foreach($question->subjects as $tag)
                <span class="badge badge-info fs-7 mb-2">{{ $tag->name }}</span>
            @endforeach
            {{-- </div> --}}

            <div class="row">
                @foreach($question->descriptions as $description)
                    <span class="text-muted d-flex justify-content-between">
                        <span>added by <span class="text-uppercase fs-7 text-black fw-bolder">{{ $description->created_by->name }}</span></span>
                        <span> {{ $description->created_at  }}</span>
                    </span>
                    <span class="text-gray-800 fw-bold  ml-4 cursor-pointer update-des fs-6 mb-2" data-description_id={{ $description->id }} style="text-align: justify">{{ $description->description }}</span>
                @endforeach

                <!-- start: update description -->
                <div class="d-flex flex-column mt-2 fv-row update-form">
                    
                </div>
                <!-- end: description add -->

                <!-- Start: description add -->
                <span class="add-description cursor-pointer" data-question_id="{{ $question->id }}"><i class="fas fa-plus-circle fa-2xl"></i> <b>Description</b> </span>
                <div class="d-flex flex-column mt-2 fv-row add-des-form">
                    
                </div>
                <!-- end: description add -->
            </div>
            <div class="row mt-5 mb-5">
                <input type="text"  data-question_id="{{ $question->id }}" class="form-control form-control-solid w-180px  get-tag"  placeholder="Type to search tag">
                {{-- <span data-question_id=" {{ $question->id }}" class="btn btn-sm btn-light btn-active-color-primary get-tag cursor-pointer" title="Click" >Add Tag</span> --}}
                <div class="tag" style="z-index:999"></div>
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
        @endif

    </div>
</div>
@php $serial_number++ ; @endphp
@endforeach
<div>
    {{ $questions->links() }}
</div>
