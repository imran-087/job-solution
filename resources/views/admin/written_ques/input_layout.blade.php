<!--start:Form-->
<form id="kk_modal_new_samprotik_form" class="form"  method="POST" action="{{ route('admin.written.store') }}">
    <div class="messages"></div>
    {{-- csrf token  --}}
    @csrf
    
    @for($i = 0; $i < $number; $i++)
    <div class="card" style="margin-top:20px !important; border:7px solid #F2F5F7; border-radius:5px; padding:20px">
        <div class="card-body pt-4 " style="padding-bottom: 0px !important">
            <!--begin::Input group-->
            <div class="row g-9 pb-4"> 
                <div style="" class="mb-5"> 
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <div class="required">Question : {{ $i+1 }} </div>
                        </label>
                        <!--end::Label-->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Question" name="question[]" />
                            <div class="input-group-append">
                                <button class="btn btn-info addRow" type="button">Add</button>
                            </div>
                        </div>

                        <!-- append dynamic input-->
                        <div  class="newRow"></div>
                        <!-- append dynamic input-->
                      
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
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
    <!--begin::Actions-->
    <div class="text-center d-flex justify-content-end py-4 px-4" >
        <button type="submit" class="btn btn-primary" style="padding: 10px 70px">
            <span class="indicator-label">Submit</span>
        </button>
    </div>
    <!--end::Actions-->
</form>
<!--end:Form-->
   


                       