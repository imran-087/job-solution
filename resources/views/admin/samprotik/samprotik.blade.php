@foreach($questions as $key => $question)
<div class="col-md-6">
    <div class="card card-bordered mb-5">
        <div class="card-header">
            <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                    <span > {{ $question->id }}. {{$question->question}} </span>
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
            <div class="row">
                @foreach($question->descriptions as $description)
                    <p class="text-gray-800 fw-bold mt-4 ml-4 cursor-pointer update-des " style="text-align: justify"><b>Description:</b> {{ $description->description }}</p>
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
                            <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary btn-sm">add</button>
                        </div>
                    </form>
                    <button type="button " class="btn btn-danger btn-sm me-3 kk_modal_new_add_cancel mb-5" style="width:80px; margin-top:-35px">cancel</button>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-end">
                    <input type="text"  data-question_id="' . $row->id . '" class="form-control form-control-solid w-150px  search_tag"  placeholder="Type to search tag">
                    {{-- <span data-question_id=" {{ $question->id }}" class="btn btn-sm btn-light btn-active-color-primary get-tag cursor-pointer" title="Click" >Add Tag</span> --}}
                    <div class="tag" style="z-index:999"></div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endforeach
<div>
    {{ $questions->links() }}
</div>
