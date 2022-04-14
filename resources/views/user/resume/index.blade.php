@extends('layouts.app')
@section('title', 'Profile')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">User Dashboard</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ url('question/all-question') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Profile</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">User Resume</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
     
    </div>
    <!--end::Container-->
</div>
@endsection

@section('content')
<!--begin:Post -->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        
        <!--begin::Overview-->
        @include('user.dashboard_header')
        <!--end::Overview-->

        <!--begin::post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_settings_general">
                            <i class="fas fa-address-card"></i> General</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_settings_store">
                            <i class="fas fa-university"></i> Education</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_settings_localization">
                            <i class="fas fa-clipboard-list"></i> Skills</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_settings_products">
                           <i class="fas fa-plus-circle"></i> Extracurricular activity</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        {{-- <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_settings_customers">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com014.svg-->
                            <span class="svg-icon svg-icon-2 me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor"></path>
                                    <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor"></rect>
                                    <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor"></path>
                                    <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Customers</a>
                        </li> --}}
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade active show" id="kt_ecommerce_settings_general" role="tabpanel">
                            @include('user.resume.general')
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_ecommerce_settings_store" role="tabpanel">
                            @include('user.resume.education')
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_ecommerce_settings_localization" role="tabpanel">
                            @include('user.resume.skill_experience')
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_ecommerce_settings_products" role="tabpanel">
                            <!--begin::Products-->
                            <div class="card card-flush mb-5 mb-xl-8">
                                <!--begin::Card header-->
                                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <!--begin::Title-->
                                        <h2>Cateogries</h2>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Form-->
                                    <form id="kt_ecommerce_settings_general_products" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span>Category Product Count</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Show the number of products inside the subcategories in the storefront header category menu. Be warned, this will cause an extreme performance hit for stores with a lot of subcategories!" aria-label="Show the number of products inside the subcategories in the storefront header category menu. Be warned, this will cause an extreme performance hit for stores with a lot of subcategories!"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex mt-3">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="radio" value="" name="category_product_count" id="category_product_count_yes" checked="checked">
                                                        <label class="form-check-label" for="category_product_count_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" value="" name="category_product_count" id="category_product_count_no">
                                                        <label class="form-check-label" for="category_product_count_no">No</label>
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="required">Default Items Per Page</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Determines how many items are shown per page" aria-label="Determines how many items are shown per page"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="products_items_per_page" value="10">
                                                <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        </div>
                                        <!--end::Input group-->
                                        <div class="separator my-5"></div>
                                        <h2 class="mb-5">Reviews</h2>
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span>Allow Reviews</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enable/disable review entries for registered customers" aria-label="Enable/disable review entries for registered customers"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex mt-3">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="radio" value="" name="allow_reviews" id="allow_reviews_yes" checked="checked">
                                                        <label class="form-check-label" for="allow_reviews_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" value="" name="allow_reviews" id="allow_reviews_no">
                                                        <label class="form-check-label" for="allow_reviews_no">No</label>
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span>Allow Guest Reviews</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enable/disable review entries for public guest customers" aria-label="Enable/disable review entries for public guest customers"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex mt-3">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="radio" value="" name="allow_guest_reviews" id="allow_guest_reviews_yes">
                                                        <label class="form-check-label" for="allow_guest_reviews_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" value="" name="allow_guest_reviews" id="allow_guest_reviews_no" checked="checked">
                                                        <label class="form-check-label" for="allow_guest_reviews_no">No</label>
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <div class="separator my-5"></div>
                                        <h2 class="mb-5">Vouchers</h2>
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="required">Minimum Vouchers</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Minimum number of vouchers customers can attach to an order" aria-label="Minimum number of vouchers customers can attach to an order"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="products_min_voucher" value="1">
                                                <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="required">Maximum Vouchers</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Maximum number of vouchers customers can attach to an order" aria-label="Maximum number of vouchers customers can attach to an order"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="products_max_voucher" value="10">
                                                <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        </div>
                                        <!--end::Input group-->
                                        <div class="separator my-5"></div>
                                        <h2 class="mb-5">Tax</h2>
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span>Display Prices with Tax</span>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex mt-3">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="radio" value="" name="product_tax" id="product_tax_yes" checked="checked">
                                                        <label class="form-check-label" for="product_tax_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" value="" name="product_tax" id="product_tax_no">
                                                        <label class="form-check-label" for="product_tax_no">No</label>
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="required">Default Tax Rate</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Determines the tax percentage (%) applied to orders" aria-label="Determines the tax percentage (%) applied to orders"></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="products_tax_rate" value="15%">
                                                <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Action buttons-->
                                        <div class="row">
                                            <div class="col-md-9 offset-md-3">
                                                <!--begin::Separator-->
                                                <div class="separator mb-6"></div>
                                                <!--end::Separator-->
                                                <div class="d-flex justify-content-end">
                                                    <!--begin::Button-->
                                                    <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">Cancel</button>
                                                    <!--end::Button-->
                                                    <!--begin::Button-->
                                                    <button type="submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary">
                                                        <span class="indicator-label">Save</span>
                                                        <span class="indicator-progress">Please wait... 
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Action buttons-->
                                    <div></div></form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Products-->
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade " id="kt_ecommerce_settings_customers" role="tabpanel">
                            <!--begin::Products-->
                            <div class="card card-flush">
                                <!--begin::Card header-->
                                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <!--begin::Title-->
                                        <h2>Customers</h2>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Form-->
                                    <form id="kt_ecommerce_settings_general_customers" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span>Customers Online</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enable/disable tracking customers online status." aria-label="Enable/disable tracking customers online status."></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex mt-3">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="radio" value="" name="customers_online" id="customers_online_yes" checked="checked">
                                                        <label class="form-check-label" for="customers_online_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" value="" name="customers_online" id="customers_online_no">
                                                        <label class="form-check-label" for="customers_online_no">No</label>
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span>Customers Activity</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enable/disable tracking customers activity." aria-label="Enable/disable tracking customers activity."></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex mt-3">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="radio" value="" name="customers_activity" id="customers_activity_yes" checked="checked">
                                                        <label class="form-check-label" for="customers_activity_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" value="" name="customers_activity" id="customers_activity_no">
                                                        <label class="form-check-label" for="customers_activity_no">No</label>
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span>Customer Searches</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enable/disable logging customers search keywords." aria-label="Enable/disable logging customers search keywords."></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex mt-3">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="radio" value="" name="customers_searches" id="customers_searches_yes" checked="checked">
                                                        <label class="form-check-label" for="customers_searches_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" value="" name="customers_searches" id="customers_searches_no">
                                                        <label class="form-check-label" for="customers_searches_no">No</label>
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span>Allow Guest Checkout</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enable/disable guest customers to checkout." aria-label="Enable/disable guest customers to checkout."></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex mt-3">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="radio" value="" name="customers_guest_checkout" id="customers_guest_checkout_yes">
                                                        <label class="form-check-label" for="customers_guest_checkout_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" value="" name="customers_guest_checkout" id="customers_guest_checkout_no" checked="checked">
                                                        <label class="form-check-label" for="customers_guest_checkout_no">No</label>
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span>Login Display Prices</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Only show prices when customers log in." aria-label="Only show prices when customers log in."></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex mt-3">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="radio" value="" name="customers_login_prices" id="customers_login_prices_yes">
                                                        <label class="form-check-label" for="customers_login_prices_yes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" value="" name="customers_login_prices" id="customers_login_prices_no" checked="checked">
                                                        <label class="form-check-label" for="customers_login_prices_no">No</label>
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="required">Max Login Attempts</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Set the max number of login attempts before the customer account is locked for 1 hour." aria-label="Set the max number of login attempts before the customer account is locked for 1 hour."></i>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" name="customer_login_attempts" value="">
                                                <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Action buttons-->
                                        <div class="row">
                                            <div class="col-md-9 offset-md-3">
                                                <!--begin::Separator-->
                                                <div class="separator mb-6"></div>
                                                <!--end::Separator-->
                                                <div class="d-flex justify-content-end">
                                                    <!--begin::Button-->
                                                    <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">Cancel</button>
                                                    <!--end::Button-->
                                                    <!--begin::Button-->
                                                    <button type="submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary">
                                                        <span class="indicator-label">Save</span>
                                                        <span class="indicator-progress">Please wait... 
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Action buttons-->
                                    <div></div></form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Products-->
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::post-->
        
    </div>
    <!--end::Container-->
</div>
<!--end:Post -->
@endsection


