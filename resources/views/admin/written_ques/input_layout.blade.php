<!--start:Form-->
    @if($type == 'withIns')
    <!--end::Input group-->
    <div class="card mb-10" style="margin-top:30px !important; border:7px solid #F2F5F7; border-radius:5px; padding:5px">
        <div class="card-body pt-4 " style="padding-bottom: 0px !important">
            <!--begin::Input group-->
            <div class="row g-9 pb-4">
                <div class="row mt-7">
                    <div class="col-md-1">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <div class="required">INo. </div>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder=" I.No." name="instruction_no" />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required text-uppercase fw-bolder" style="font-size: 16px">Question Instruction </span>
                        </label>

                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid mb-2 @error('instruction') is-invalid @enderror" placeholder="Enter instruction" name="instruction" value="{{ old('instruction') }}" />

                        @error('instruction')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- end: col-->
                    <div class="col-md-2">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <div class="required">Parent Instruction</div>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder=" P.I.No." name="parent_instruction" />
                        </div>
                        <!--end::Input group-->
                    </div>
                    <div class="col-md-1">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
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
            </div>
        </div>
    </div>
    @endif
    @for($i = 0; $i < $number; $i++)
    <div class="card" style="margin-top:20px !important; border:7px solid #F2F5F7; border-radius:5px; padding:20px">
        <div class="card-body pt-4 " style="padding-bottom: 0px !important">
            <!--begin::Input group-->
            <div class="row g-9 pb-4"> 
                <div> 
                    <div class="row">
                        
                        <div class="col-md-1">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <div class="required">QN. </div>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Q.No." name="question_no[]" /> 
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-md-7">
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
                                    <div class="">OR</div>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="অথবা" name="question_or[]" /> 
                            </div>
                            <!--end::Input group-->
                        </div>
                        
                        <div class="col-md-1">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <div class="required">Mark</div>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="5/10" name="mark[]" /> 
                            </div>
                            <!--end::Input group-->
                        </div>
                        @if($type == 'withoutIns')
                        <!-- end: col-->
                        <div class="col-md-2">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <div class="required">Parent Instruction</div>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder=" P.I.No." name="parent_instruction_no[]" />
                            </div>
                            <!--end::Input group-->
                        </div>
                        @endif
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
   


                       