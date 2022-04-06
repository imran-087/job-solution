 <div class="d-flex justify-content-start mt-2">
    <button type="button" class="btn btn-sm  btn-light me-3">
        <a href="{{ url('jobs',
            [$question->sub_category->category->slug, $question->sub_category->slug, $question->subject->slug]
        ) }}">{{$question->subject->name}}</a>
    </button>              
    <button type="button" class="btn btn-sm  btn-light me-3">
        <a href="{{ route('jobs.sub-category.subject.all-question', [$question->sub_category->category->slug, $question->sub_category->slug]) }}">{{$question->sub_category->name}}</a>
    </button>  
    <button type="button" class="btn btn-sm  btn-light me-3">
        <a href="{{ url('job-solution', [$question->sub_category->category->main_category->slug, $question->sub_category->category->slug]) }}">{{$question->sub_category->category->name}}</a>
    </button>            
    <button type="button" class="btn btn-sm  btn-light me-3">
        <a href="{{ url('job-solution', $question->sub_category->category->main_category->slug) }}">{{$question->sub_category->category->main_category->name}}</a>
    </button>            
            
</div>