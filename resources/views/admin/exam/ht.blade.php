 <div class="post d-flex flex-column-fluid" id="kt_post" data-select2-id="select2-data-kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl" data-select2-id="select2-data-kt_content_container">
            <!--begin::Form-->
            <form id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework" data-kt-redirect="/metronic8/demo1/../demo1/apps/ecommerce/sales/listing.html" data-select2-id="select2-data-kt_ecommerce_edit_order_form">
                <!--begin::Aside column-->
                <div class="w-100 flex-lg-row-auto w-lg-300px mb-7 me-7 me-lg-10">
                    <!--begin::Order details-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Category</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-5">
                                <!--begin::Input group-->
                                <div class="fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-bold mb-2">Select Category</label>
                                    <select class="form-select form-select-solid " data-control="select2"
                                    data-hide-search="true" data-placeholder="Select category" name="category"
                                    id="category" required>
                                    <option value="">Choose ...</option>
                                    
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                    <div class="help-block with-errors category-error"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row fv-plugins-icon-container">
                                   <label class="required fs-6 fw-bold mb-2">Select Sub Category</label>
                                    <select class="form-select form-select-solid " data-control="select2"
                                        data-hide-search="true" data-placeholder="Select sub category" name="sub_category"
                                        id="sub_category" required>


                                    </select>
                                    <div class="help-block with-errors sub_category-error"></div>
                                </div>
                                <!--end::Input group-->
                                
                            </div>
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Order details-->
                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                    <!--begin::Order details-->
                    <div class="card card-flush py-4" data-select2-id="select2-data-131-9f42">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Exam Details</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0" data-select2-id="select2-data-130-dgmb">
                            <!--begin::Billing address-->
                            <div class="d-flex flex-column gap-5 gap-md-7" data-select2-id="select2-data-129-68nh">
                               
                                <!--begin::Input group-->
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                       <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="required">Exam Name</span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Enter exam name" name="name" value="{{ old('name') }}"/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="flex-row-fluid">
                                       <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <label class="required fs-6 fw-bold mb-2">Examinee Type</label>
                                                <select class="form-select form-select-solid " data-control="select2"
                                                    data-hide-search="true" data-placeholder="Select ..." name="examinee_type"
                                                    id="examinee_type" required>
                                                    <option value=""></option>
                                                    <option value="user">User</option>
                                                    <option value="subscriber">Subscriber</option>
                                                </select>
                                                <div class="help-block with-errors examinee_type-error"></div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <label class="required fs-6 fw-bold mb-2">Exam Mode</label>
                                                <select class="form-select form-select-solid " data-control="select2"
                                                    data-hide-search="true" data-placeholder="Select ..." name="exam_mode"
                                                    id="exam_mode" required>
                                                    <option value=""></option>
                                                    <option value="public">Public</option>
                                                    <option value="private">Private</option>
                                                </select>
                                                <div class="help-block with-errors exam_mode-error"></div>
                                            </div>
                                            <!--end::Col-->
                                       </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column flex-md-row gap-5">
                                    <div class="flex-row-fluid">
                                        <!--begin::Label-->
                                        <label class="form-label">City</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control" name="billing_order_city" placeholder="" value="">
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">Postcode</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control" name="billing_order_postcode" placeholder="" value="">
                                        <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                    <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">State</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control" name="billing_order_state" placeholder="" value="">
                                        <!--end::Input-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                </div>
                                <!--end::Input group-->
                                
                                <!--begin::Checkbox-->
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" id="same_as_billing" checked="checked">
                                    <label class="form-check-label" for="same_as_billing">Shipping address is the same as billing address</label>
                                </div>
                                <!--end::Checkbox-->
                                <!--begin::Shipping address-->
                                <div class="d-none d-flex flex-column gap-5 gap-md-7" id="kt_ecommerce_edit_order_shipping_form">
                                    <!--begin::Title-->
                                    <div class="fs-3 fw-bolder mb-n2">Shipping Address</div>
                                    <!--end::Title-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column flex-md-row gap-5">
                                        <div class="fv-row flex-row-fluid">
                                            <!--begin::Label-->
                                            <label class="form-label">Address Line 1</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control" name="kt_ecommerce_edit_order_address_1" placeholder="Address Line 1" value="">
                                            <!--end::Input-->
                                        </div>
                                        <div class="flex-row-fluid">
                                            <!--begin::Label-->
                                            <label class="form-label">Address Line 2</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control" name="kt_ecommerce_edit_order_address_2" placeholder="Address Line 2">
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column flex-md-row gap-5">
                                        <div class="flex-row-fluid">
                                            <!--begin::Label-->
                                            <label class="form-label">City</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control" name="kt_ecommerce_edit_order_city" placeholder="" value="">
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row flex-row-fluid">
                                            <!--begin::Label-->
                                            <label class="form-label">Postcode</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control" name="kt_ecommerce_edit_order_postcode" placeholder="" value="">
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row flex-row-fluid">
                                            <!--begin::Label-->
                                            <label class="form-label">State</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control" name="kt_ecommerce_edit_order_state" placeholder="" value="">
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    
                                </div>
                                <!--end::Shipping address-->
                            </div>
                            <!--end::Billing address-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Order details-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/products.html" id="kt_ecommerce_edit_order_cancel" class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_edit_order_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait... 
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            <div></div></form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>