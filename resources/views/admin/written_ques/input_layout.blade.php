<!--start:Form-->
 
    @for($i = 0; $i < $number; $i++)
    <div class="card" style="margin-top:20px !important; border:7px solid #F2F5F7; border-radius:5px; padding:20px">
        <div class="card-body pt-4 " style="padding-bottom: 0px !important">
            <!--begin::Input group-->
            <div class="row g-9 pb-4"> 
                <div> 
                    <div class="row">
                        <div class="col-md-2">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <div class="required">Question No. </div>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Enter Ques. No." name="question_no[]" /> 
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-md-9">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <div class="required">Question </div>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Enter Question" name="question[]" /> 
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-md-1">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <div class="required">Marks</div>
                                </label>
                                <!--end::Label-->
                                <input type="number" class="form-control form-control-solid" placeholder="5/10" name="mark[]" /> 
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                
                    <!--begin::Input group-->
                    <div class="d-flex flex-column  fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required fw-bolder">answer</span>
                        </label>
                        <!--end::Label-->
                        <textarea type="text" class="form-control form-control-solid h-100px"  placeholder="Enter answer"
                                    name="answer[]" > </textarea>
                        <div class="help-block with-errors answer-error"></div>
                    </div>
                    <!--end::Input group-->
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
    <div class="text-center d-flex justify-content-between py-4 px-4" >
        <button class="btn btn-info btn-sm addRow" type="button">Add Input</button>
        <button type="submit" class="btn btn-primary" style="padding: 10px 70px">
            <span class="indicator-label">Submit</span>
        </button>
    </div>
    <!--end::Actions-->
</form>
<!--end:Form-->
   


                       