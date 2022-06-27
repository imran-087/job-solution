
@for($i = 0; $i < $number; $i++)
<div class="card" style="margin-top:20px !important; border:7px solid #F2F5F7; border-radius:5px; padding:20px">
    <div class="card-body pt-4 " style="padding-bottom: 0px !important">
        <!--begin::Input group-->
        <div class="row g-9 pb-4"> 
            <div> 
                <span><b class="me-2 fs-6">Instruction</b><input class="form-check-input instruction mb-2" type="checkbox" value="yes"></span>

                <div class="row">
                    <div class="col-md-1">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <div class="required">QN. </div>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Q.No." name="question_no[]" /> 
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-md-9">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <div class="required">Question </div>
                            </label>
                            <!--end::Label-->
                            <textarea type="text"  class="form-control form-control-solid h-100px kt_docs_ckeditor_classic"  placeholder="Enter Question or Instruction"
                            name="question[]"> </textarea>
                            {{-- <input type="text" class="form-control form-control-solid" placeholder="Enter Question" name="question[]" />  --}}
                            <div class="help-block with-errors question.*-error"></div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-md-1">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <div class="">OR</div>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="অথবা" name="question_or[]" /> 
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-md-1">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <div class="required">Mark</div>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="5/10" name="mark[]" /> 
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
               
                <div class="d-flex flex-column  fv-row written-answer">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                        <span class="required fw-bolder">answer</span> 
                    </label>
                    <!--end::Label-->
                    <textarea type="text"  class="form-control form-control-solid h-150px kt_docs_ckeditor_classic"  placeholder="Enter answer"
                            name="answer[]"> </textarea>
                    <div class="help-block with-errors answer-error"></div>
                </div>
            </div> 
        </div>
        <!--end::Input group-->
    </div>
</div>
@endfor

<!-- append dynamic input-->
<div  class="newRow"></div>
<!-- append dynamic input-->

<!--begin::Actions-->
<div class="text-center d-flex justify-content-end py-4 px-4" >
    {{-- <button class="btn btn-info btn-sm addRow" type="button" style="padding: 10px 20px">Add Input</button> --}}
    <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary" style="padding: 10px 70px">
        <span class="indicator-label">Submit</span>
        <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </button>
</div>
<!--end::Actions-->




                       