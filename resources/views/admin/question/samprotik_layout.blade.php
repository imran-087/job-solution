                
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
        <input type="text" class="form-control form-control-solid" placeholder="Enter Question"
            name="question[]" />
        <div class="help-block with-errors title-error"></div>
    </div>
    <!--end::Input group-->

    <!--begin::Input group-->
    <div class="d-flex flex-column mb-8 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">Answer</span>
        </label>
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid" placeholder="Enter answer"
                    name="answer[]" />
        <div class="help-block with-errors answer-error"></div>
    </div>
    <!--end::Input group-->
    
</div> 

@endfor
@endif
      

                       