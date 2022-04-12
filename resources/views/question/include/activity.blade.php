<div class="d-flex justify-content-end mt-2" style="margin-bottom: -40px !important;">
    <a href="javascript:;" class="comment me-2 btn btn-sm btn-light btn-color-muted btn-active-light-info px-4 py-2"  
    data-text="comment" data-id="{{ $question->id }}"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Add Comment">
    <i class="fas fa-comment-alt"></i> {{$question->comments->count()}}
    </a>
    <a href="javascript:;" class="bookmark me-2 btn btn-sm btn-light btn-color-muted btn-active-light-primary px-4 py-2"  
    data-id="{{ $question->id }}" data-catid="{{ $question->sub_category->category->id }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Bookmark">
    <i class="fas fa-bookmark"></i>
    </a>
    <a href="javascript:;" class=" btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2 vote me-2"  data-id="{{ $question->id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="tooltip-dark" title="Like">
    <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
    <i class="fas fa-heart"></i>
    <!--end::Svg Icon-->{{$question->vote}}</a>
    <span style="cursor:default" class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="tooltip-dark" title="Total view">
        <i class="fas fa-eye fa-xl"></i> {{$question->view_count}} 
    </span>
</div>