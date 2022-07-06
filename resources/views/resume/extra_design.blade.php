<!--begin:Form-->
                                        <form id="" class="kk_training_summary_update_form form d-none"  enctype="multipart/form-data">
                                            @csrf

                                            <div class="d-flex justify-content-end">
                                                <span class="btn btn-active-color-danger btn-light " id="cancel_edit_training_summary"><i class="fas fa-times"></i>Cancel</span>
                                            </div>

                                            <div class="messages"></div>

                                            {{-- hidden value  --}}
                                            <input type="text" name="training_id" value="{{ $training->id }}"> 

                                            <!--begin::Heading-->
                                            <div class="mb-8">
                                                <!--begin::Description-->
                                                <div class="fw-bold fs-4 mb-5 ">Training Information</div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-5">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">Training Title </span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="Enter training title"
                                                            name="title" value="{{ $training->training_title ?? '' }}" />
                                                        <div class="help-block with-errors title-error"></div>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="">Country</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="Enter country"
                                                            name="country" value="{{ $training->country ?? '' }}"  />
                                                        <div class="help-block with-errors country-error"></div>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-5">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="">Topics Covered</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="Topic covered"
                                                            name="topic_covered" value="{{ $training->topic_covered ?? '' }}"  />
                                                        <div class="help-block with-errors topic_covered-error"></div>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <label class="required fs-6 fw-bold mb-2">Training year</label>
                                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                                        name="training_year">
                                                        <option value="">Select year</option>
                                                        @foreach($years as $year)
                                                        <option value="{{$year->year}}" @isset($training->year)
                                                            {{ $training->year == $year->year ? 'selected' : '' }}
                                                            @endisset >{{$year->year}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="help-block with-errors training_year-error"></div>    
                                                </div>
                                                
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-5">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">Institute</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="Enter institute name"
                                                            name="institute" value="{{ $training->institute ?? '' }}" />
                                                        <div class="help-block with-errors institute-error"></div>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="required">Duration</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="Enter training duration"
                                                            name="duration" value="{{ $training->duration ?? '' }}" />
                                                        <div class="help-block with-errors duration-error"></div>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-5">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                            <span class="">Location/Address </span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="Enter address"
                                                            name="address" value="{{ $training->address ?? '' }}" />
                                                        <div class="help-block with-errors address-error"></div>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                
                                                </div>
                                                
                                            </div>
                                            <!--end::Input group-->
                                            
                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-between">
                                                <button type="reset" id="kk_training_summary_cancel" class="btn btn-light btn-active-color-danger me-3">Close</button>
                                                <button type="submit" id="kk_training_summary_submit" class="btn btn-primary">
                                                    <span class="indicator-label py-3 px-7">Save</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                        <!--end:Form-->