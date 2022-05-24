@foreach($questions as $key => $question)
<div class="col-md-6">
    <div class="card card-bordered mb-5">
        <div class="card-header">
            <h3 class="card-title text-gray-700 fw-bolder cursor-pointer mb-0 view" data-id="{{ $question->id }}" style="max-width: 1100px !important; color:#0095E8 !important">
                    <span > {{ $question->id }}. {{$question->question}} </span>
            </h3>
            <div class="card-toolbar">
                <!--begin::Menu-->
                <a href="{{route('admin.samprotik.edit', ['id' => $question->id, 'ques' => $question->slug])}}" class="btn btn-sm btn-icon btn-light btn-active-primary fw-bold edit" ><i class="fas fa-edit"></i></a>
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
                <div class="col-md-12">
                    <p class="text-gray-800 fw-bold " > 
                    <span style="color:green; font-weight:bold">answer:</span> {{$question->answer }}</p>
                </div>
            </div>

            <div class="row">
                @foreach($question->descriptions as $description) 
                <div class="row">
                    <p class="text-gray-800 fw-bold mt-4 ml-4"><b>Description:</b> {{ $description->description }}</p>
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
                        <div class="col-md-2 offset-10">
                            <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary btn-sm">
                            <span class="indicator-label">add</span>
                        </div>
                    </form>
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