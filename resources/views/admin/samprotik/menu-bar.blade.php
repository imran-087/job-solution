<!--begin::Card body-->
<div class="card-body pt-4 " style="padding-bottom: 0px !important">
    <div class="row">
        <div class="col-md-6 d-flex flex-center" style="border-right: 1px solid gray">
            <a href="{{ route('admin.samprotik.index') }}"><h3 style="color:#D94540">All সাম্প্রতিক Question</h3></a>
        </div>
        <div class="col-md-6">
            
            <!--begin::Input group-->
            <div class="row g-9 pb-4">
                <!--begin::Col-->
                <div class="col-xl-4 col-lg-4 col-md-4  col-sm-6 col-xs-6 fv-row offset-2">
                    {{-- <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                        data-placeholder="Select" name="option" id="option">
                        <option value="0" selected>Without Option</option>
                        <option value="1">With Option</option>
                    </select> --}}
                    <!-- start: date filter-->
                <span class="pe-0 text-end">
                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter by option 
                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon--></a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true" style="">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{ route('admin.samprotik.with-option') }}" class="menu-link px-3">With option</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{ route('admin.samprotik.index') }}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Without Opt.</a>
                        </div>
                        <!--end::Menu item-->
                        
                    </div>
                    <!--end::Menu-->
                </span>
                <!--end::date filter--> 
                    
                </div>
                <!--end:Col-->
                
                    <!--begin::Col-->
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 fv-row">
                    
                    <div class="m-0">
                        <!--begin::Menu toggle-->
                        <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Filter by Date</a>
                        <!--end::Menu toggle-->
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6219fd15181ee" style="">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->
                            
                            <!--begin::Form-->
                            <form id="kk_modal_new_samprotik_form" class="form-inline"  method="GET" action="{{ route('admin.samprotik.date-filter') }}">
                                <div class="messages"></div>
                                
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bold">From:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div>
                                            <input type="date" class="form-control form-control-solid" placeholder="From"
                                                name="from" id="from_date" />
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bold">To:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div>
                                            <input type="date" class="form-control form-control-solid" placeholder="To"
                                                        name="to" id="to_date" />
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                            </form>
                            <!--end::Form-->
                            
                        </div>
                        <!--end::Menu 1-->
                    </div>

                </div>
                <!--end:Col-->
                
            </div>
            <!--end::Input group-->
                
        </div>
    </div>
    
</div>
<!--end::Card body-->