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
                <form action="" class="py-4 d-none edit-form">
                    @csrf
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="answer" value="{{ $question->answer }}">
                        <input type="hidden" name="id" value="{{ $question->id }}">
                    </div>
                    <div class="col-md-2 float-end mt-2">
                        <button type="submit" class="btn btn-primary btn-sm"> Update</button>
                    </div>
                </form>
            </div>
        </div>
        
        @endif
    </div>
</div>
@endforeach