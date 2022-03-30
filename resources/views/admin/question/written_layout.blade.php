                
@if(isset($question))
@for($i = 0; $i < $question; $i++)
<div style="border:1px solid green; border-radius:5px; padding: 20px" class="mb-5"> 
    <!--begin::Input group-->
    <div class="d-flex flex-column mb-8 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">Question : {{ $i+1 }} </span>
        </label>
        <input type="hidden" name="type" value="{{ $type }}">
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid @error('question.*') is-invalid @enderror" placeholder="Enter Question"
            name="question[]" />
        @error('question')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="d-flex flex-column mb-8 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">Answer</span>
        </label>
        <!--end::Label-->
        <textarea name="written_answer[]" class="form-control form-control-solid h-100px @error('written_answer.*') is-invalid @enderror"></textarea>
        @error('written_answer.*')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--end::Input group-->
    
</div> 

@endfor
@endif
      

                       