
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
                    <p class="text-gray-800 fw-bold"> 
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
   