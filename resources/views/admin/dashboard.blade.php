@extends('admin.layout.app')
@section('title', 'Dashboard')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <!--end::Separator-->
                    <!--begin::Description-->
                    <small class="text-muted fs-7 fw-bold my-1 ms-1">#XRS-45670</small>
                    <!--end::Description-->
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->
                <div class="m-0">
                    <!--begin::Menu toggle-->
                    <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Filter</a>
                    <!--end::Menu toggle-->
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                        id="kt_menu_6219fd15181ee">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->
                        <!--begin::Form-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <select class="form-select form-select-solid" data-kt-select2="true"
                                        data-placeholder="Select option" data-dropdown-parent="#kt_menu_6219fd15181ee"
                                        data-allow-clear="true">
                                        <option></option>
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="2">In Process</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Member Type:</label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="d-flex">
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                        <span class="form-check-label">Author</span>
                                    </label>
                                    <!--end::Options-->
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                        <span class="form-check-label">Customer</span>
                                    </label>
                                    <!--end::Options-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Notifications:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="notifications"
                                        checked="checked" />
                                    <label class="form-check-label">Enabled</label>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary"
                                    data-kt-menu-dismiss="true">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->
                </div>
                <!--end::Filter menu-->
                <!--begin::Secondary button-->
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                <a href="/metronic8/demo1/../demo1/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_create_app">Create</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Row-->
								<div class="row gy-5 g-xl-8">
									<!--begin::Col-->
									<div class="col-xl-8">
										<!--begin::Mixed Widget 2-->
										<div class="card card-xl-stretch">
											<!--begin::Header-->
											<div class="card-header border-0 bg-danger py-5">
												<h3 class="card-title fw-bolder text-white">Site Statistics</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0 ">
												<!--begin::Chart-->
												<div class="mixed-widget-2-chart card-rounded-bottom bg-danger" data-kt-color="danger" style="height: 200px; min-height: 200px;"><div id="apexchartsqh12jgvv" class="apexcharts-canvas apexchartsqh12jgvv apexcharts-theme-light" style="width: 374px; height: 200px;"><svg id="SvgjsSvg1795" width="374" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1797" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1796"><clipPath id="gridRectMaskqh12jgvv"><rect id="SvgjsRect1800" width="381" height="203" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskqh12jgvv"></clipPath><clipPath id="nonForecastMaskqh12jgvv"></clipPath><clipPath id="gridRectMarkerMaskqh12jgvv"><rect id="SvgjsRect1801" width="378" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><filter id="SvgjsFilter1807" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1808" flood-color="#cb1b46" flood-opacity="0.5" result="SvgjsFeFlood1808Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1809" in="SvgjsFeFlood1808Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1809Out"></feComposite><feOffset id="SvgjsFeOffset1810" dx="0" dy="5" result="SvgjsFeOffset1810Out" in="SvgjsFeComposite1809Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1811" stdDeviation="3 " result="SvgjsFeGaussianBlur1811Out" in="SvgjsFeOffset1810Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1812" result="SvgjsFeMerge1812Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1813" in="SvgjsFeGaussianBlur1811Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1814" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1815" in="SourceGraphic" in2="SvgjsFeMerge1812Out" mode="normal" result="SvgjsFeBlend1815Out"></feBlend></filter><filter id="SvgjsFilter1817" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1818" flood-color="#cb1b46" flood-opacity="0.5" result="SvgjsFeFlood1818Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1819" in="SvgjsFeFlood1818Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1819Out"></feComposite><feOffset id="SvgjsFeOffset1820" dx="0" dy="5" result="SvgjsFeOffset1820Out" in="SvgjsFeComposite1819Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1821" stdDeviation="3 " result="SvgjsFeGaussianBlur1821Out" in="SvgjsFeOffset1820Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1822" result="SvgjsFeMerge1822Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1823" in="SvgjsFeGaussianBlur1821Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1824" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1825" in="SourceGraphic" in2="SvgjsFeMerge1822Out" mode="normal" result="SvgjsFeBlend1825Out"></feBlend></filter></defs><g id="SvgjsG1826" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1827" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1836" class="apexcharts-grid"><g id="SvgjsG1837" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1839" x1="0" y1="0" x2="374" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1840" x1="0" y1="20" x2="374" y2="20" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1841" x1="0" y1="40" x2="374" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1842" x1="0" y1="60" x2="374" y2="60" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1843" x1="0" y1="80" x2="374" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1844" x1="0" y1="100" x2="374" y2="100" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1845" x1="0" y1="120" x2="374" y2="120" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1846" x1="0" y1="140" x2="374" y2="140" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1847" x1="0" y1="160" x2="374" y2="160" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1848" x1="0" y1="180" x2="374" y2="180" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1849" x1="0" y1="200" x2="374" y2="200" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1838" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1851" x1="0" y1="200" x2="374" y2="200" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1850" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1802" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1803" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1806" d="M 0 200L 0 125C 21.816666666666663 125 40.516666666666666 87.5 62.33333333333333 87.5C 84.14999999999999 87.5 102.85 120 124.66666666666666 120C 146.48333333333332 120 165.1833333333333 25 186.99999999999997 25C 208.81666666666663 25 227.51666666666665 100 249.33333333333331 100C 271.15 100 289.84999999999997 100 311.66666666666663 100C 333.4833333333333 100 352.1833333333333 100 373.99999999999994 100C 373.99999999999994 100 373.99999999999994 100 373.99999999999994 200M 373.99999999999994 100z" fill="transparent" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskqh12jgvv)" filter="url(#SvgjsFilter1807)" pathTo="M 0 200L 0 125C 21.816666666666663 125 40.516666666666666 87.5 62.33333333333333 87.5C 84.14999999999999 87.5 102.85 120 124.66666666666666 120C 146.48333333333332 120 165.1833333333333 25 186.99999999999997 25C 208.81666666666663 25 227.51666666666665 100 249.33333333333331 100C 271.15 100 289.84999999999997 100 311.66666666666663 100C 333.4833333333333 100 352.1833333333333 100 373.99999999999994 100C 373.99999999999994 100 373.99999999999994 100 373.99999999999994 200M 373.99999999999994 100z" pathFrom="M -1 200L -1 200L 62.33333333333333 200L 124.66666666666666 200L 186.99999999999997 200L 249.33333333333331 200L 311.66666666666663 200L 373.99999999999994 200"></path><path id="SvgjsPath1816" d="M 0 125C 21.816666666666663 125 40.516666666666666 87.5 62.33333333333333 87.5C 84.14999999999999 87.5 102.85 120 124.66666666666666 120C 146.48333333333332 120 165.1833333333333 25 186.99999999999997 25C 208.81666666666663 25 227.51666666666665 100 249.33333333333331 100C 271.15 100 289.84999999999997 100 311.66666666666663 100C 333.4833333333333 100 352.1833333333333 100 373.99999999999994 100" fill="none" fill-opacity="1" stroke="#cb1b46" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskqh12jgvv)" filter="url(#SvgjsFilter1817)" pathTo="M 0 125C 21.816666666666663 125 40.516666666666666 87.5 62.33333333333333 87.5C 84.14999999999999 87.5 102.85 120 124.66666666666666 120C 146.48333333333332 120 165.1833333333333 25 186.99999999999997 25C 208.81666666666663 25 227.51666666666665 100 249.33333333333331 100C 271.15 100 289.84999999999997 100 311.66666666666663 100C 333.4833333333333 100 352.1833333333333 100 373.99999999999994 100" pathFrom="M -1 200L -1 200L 62.33333333333333 200L 124.66666666666666 200L 186.99999999999997 200L 249.33333333333331 200L 311.66666666666663 200L 373.99999999999994 200"></path><g id="SvgjsG1804" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1857" r="0" cx="373.99999999999994" cy="100" class="apexcharts-marker wuvcnnzwf no-pointer-events" stroke="#cb1b46" fill="#f1416c" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1805" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1852" x1="0" y1="0" x2="374" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1853" x1="0" y1="0" x2="374" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1854" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1855" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1856" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1835" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1798" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 100px;"></div><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 197.698px; top: 103px;"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">Aug</div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: transparent; display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Net Profit: </span><span class="apexcharts-tooltip-text-y-value">$40 thousands</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
												<!--begin::Stats-->
												<div class="card-p  position-relative" style="margin-top:-150px !important">
													<!--begin::Row-->
													<div class="row g-0">
														<!--begin::Col-->
														<div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
															<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
																	<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
															<a href="#" class="text-warning fw-bold fs-6 d-flex justify-content-between">Total MCQ Qestion <span class="badge  badge-warning fs-4">{{ $total_mcq_question }}</span></a>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
															<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor"></path>
																	<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
															<a href="#" class="text-primary fw-bold fs-6 d-flex justify-content-between">Total Samprotik Qestion <span class="badge  badge-primary fs-4">{{ $total_samprotik_question }}</span></a>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row g-0">
														<!--begin::Col-->
														<div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
															<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
																	<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
															<a href="#" class="text-danger fw-bold fs-6 d-flex justify-content-between">Total Written Qestion <span class="badge  badge-danger fs-4">{{ $total_written_question }}</span></a>
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col bg-light-success px-6 py-8 rounded-2">
															<!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
															<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="currentColor"></path>
																	<path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="currentColor"></path>
																</svg>
															</span>
															<!--end::Svg Icon-->
															<a href="#" class="text-success fw-bold fs-6 d-flex justify-content-between">Total Description <span class="badge  badge-success fs-4">{{ $total_description }}</span></a>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Row-->
												</div>
												<!--end::Stats-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 2-->
									</div>
									<!--end::Col-->
									
									<!--begin::Col-->
									<div class="col-xl-4">
										<!--begin::Mixed Widget 7-->
										<div class="card card-xl-stretch-50 mb-5 mb-xl-8">
											<!--begin::Body-->
											<div class="card-body d-flex flex-column p-0">
												<!--begin::Stats-->
												<div class="flex-grow-1 card-p pb-0">
													<div class="d-flex flex-stack flex-wrap">
														<div class="me-2">
															<a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Generate Reports</a>
															<div class="text-muted fs-7 fw-bold">Finance and accounting reports</div>
														</div>
														<div class="fw-bolder fs-3 text-primary">$24,500</div>
													</div>
												</div>
												<!--end::Stats-->
												<!--begin::Chart-->
												<div class="mixed-widget-7-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 150px; min-height: 150px;"><div id="apexchartsj5foraau" class="apexcharts-canvas apexchartsj5foraau apexcharts-theme-light" style="width: 374px; height: 150px;"><svg id="SvgjsSvg1904" width="374" height="150" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1906" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1905"><clipPath id="gridRectMaskj5foraau"><rect id="SvgjsRect1909" width="381" height="153" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskj5foraau"></clipPath><clipPath id="nonForecastMaskj5foraau"></clipPath><clipPath id="gridRectMarkerMaskj5foraau"><rect id="SvgjsRect1910" width="378" height="154" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1917" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1918" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1926" class="apexcharts-grid"><g id="SvgjsG1927" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1929" x1="0" y1="0" x2="374" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1930" x1="0" y1="15" x2="374" y2="15" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1931" x1="0" y1="30" x2="374" y2="30" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1932" x1="0" y1="45" x2="374" y2="45" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1933" x1="0" y1="60" x2="374" y2="60" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1934" x1="0" y1="75" x2="374" y2="75" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1935" x1="0" y1="90" x2="374" y2="90" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1936" x1="0" y1="105" x2="374" y2="105" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1937" x1="0" y1="120" x2="374" y2="120" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1938" x1="0" y1="135" x2="374" y2="135" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1939" x1="0" y1="150" x2="374" y2="150" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1928" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1941" x1="0" y1="150" x2="374" y2="150" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1940" x1="0" y1="1" x2="0" y2="150" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1911" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1912" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1915" d="M 0 150L 0 112.5C 26.179999999999996 112.5 48.620000000000005 87.5 74.8 87.5C 100.97999999999999 87.5 123.42 112.5 149.6 112.5C 175.78 112.5 198.22 50 224.4 50C 250.57999999999998 50 273.02 100 299.2 100C 325.38 100 347.82 25 374 25C 374 25 374 25 374 150M 374 25z" fill="rgba(241,250,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskj5foraau)" pathTo="M 0 150L 0 112.5C 26.179999999999996 112.5 48.620000000000005 87.5 74.8 87.5C 100.97999999999999 87.5 123.42 112.5 149.6 112.5C 175.78 112.5 198.22 50 224.4 50C 250.57999999999998 50 273.02 100 299.2 100C 325.38 100 347.82 25 374 25C 374 25 374 25 374 150M 374 25z" pathFrom="M -1 150L -1 150L 74.8 150L 149.6 150L 224.4 150L 299.2 150L 374 150"></path><path id="SvgjsPath1916" d="M 0 112.5C 26.179999999999996 112.5 48.620000000000005 87.5 74.8 87.5C 100.97999999999999 87.5 123.42 112.5 149.6 112.5C 175.78 112.5 198.22 50 224.4 50C 250.57999999999998 50 273.02 100 299.2 100C 325.38 100 347.82 25 374 25" fill="none" fill-opacity="1" stroke="#009ef7" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskj5foraau)" pathTo="M 0 112.5C 26.179999999999996 112.5 48.620000000000005 87.5 74.8 87.5C 100.97999999999999 87.5 123.42 112.5 149.6 112.5C 175.78 112.5 198.22 50 224.4 50C 250.57999999999998 50 273.02 100 299.2 100C 325.38 100 347.82 25 374 25" pathFrom="M -1 150L -1 150L 74.8 150L 149.6 150L 224.4 150L 299.2 150L 374 150"></path><g id="SvgjsG1913" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1947" r="0" cx="0" cy="0" class="apexcharts-marker w1xp1ehgf no-pointer-events" stroke="#009ef7" fill="#f1faff" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1914" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1942" x1="0" y1="0" x2="374" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1943" x1="0" y1="0" x2="374" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1944" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1945" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1946" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1925" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1907" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 75px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(241, 250, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 7-->
										<!--begin::Mixed Widget 10-->
										<div class="card card-xl-stretch-50 mb-5 mb-xl-8">
											<!--begin::Body-->
											<div class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden">
												<!--begin::Hidden-->
												<div class="d-flex flex-stack flex-wrap flex-grow-1 px-9 pt-9 pb-3">
													<div class="me-2">
														<span class="fw-bolder text-gray-800 d-block fs-3">Total Users</span>
														<span class="text-gray-400 fw-bold">Aug/8/15 - {{ date('M/d/Y') }}</span>
													</div>
													<div class="fw-bolder fs-3 text-primary">{{ $total_user }}</div>
												</div>
												<!--end::Hidden-->
												<!--begin::Chart-->
												<div class="mixed-widget-10-chart" data-kt-color="primary" style="height: 175px; min-height: 183px;"><div id="apexchartslxg3qoqu" class="apexcharts-canvas apexchartslxg3qoqu apexcharts-theme-light" style="width: 374px; height: 168px;"><svg id="SvgjsSvg1948" width="374" height="168" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1950" class="apexcharts-inner apexcharts-graphical" transform="translate(42.34274673461914, 40)"><defs id="SvgjsDefs1949"><linearGradient id="SvgjsLinearGradient1954" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1955" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop1956" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop1957" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMasklxg3qoqu"><rect id="SvgjsRect1959" width="327.65725326538086" height="88.03333127593993" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMasklxg3qoqu"></clipPath><clipPath id="nonForecastMasklxg3qoqu"></clipPath><clipPath id="gridRectMarkerMasklxg3qoqu"><rect id="SvgjsRect1960" width="325.65725326538086" height="90.03333127593993" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><rect id="SvgjsRect1958" width="10.051789164543152" height="86.03333127593993" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1954)" class="apexcharts-xcrosshairs" y2="86.03333127593993" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG2000" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG2001" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText2003" font-family="inherit" x="20.103578329086304" y="115.03333127593993" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2004">Feb</tspan><title>Feb</title></text><text id="SvgjsText2006" font-family="inherit" x="60.31073498725891" y="115.03333127593993" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2007">Mar</tspan><title>Mar</title></text><text id="SvgjsText2009" font-family="inherit" x="100.51789164543152" y="115.03333127593993" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2010">Apr</tspan><title>Apr</title></text><text id="SvgjsText2012" font-family="inherit" x="140.72504830360413" y="115.03333127593993" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2013">May</tspan><title>May</title></text><text id="SvgjsText2015" font-family="inherit" x="180.93220496177673" y="115.03333127593993" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2016">Jun</tspan><title>Jun</title></text><text id="SvgjsText2018" font-family="inherit" x="221.13936161994934" y="115.03333127593993" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2019">Jul</tspan><title>Jul</title></text><text id="SvgjsText2021" font-family="inherit" x="261.34651827812195" y="115.03333127593993" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2022">Aug</tspan><title>Aug</title></text><text id="SvgjsText2024" font-family="inherit" x="301.55367493629456" y="115.03333127593993" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2025">Sep</tspan><title>Sep</title></text></g></g><g id="SvgjsG2038" class="apexcharts-grid"><g id="SvgjsG2039" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine2041" x1="0" y1="0" x2="321.65725326538086" y2="0" stroke="#eff2f5" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2042" x1="0" y1="21.508332818984982" x2="321.65725326538086" y2="21.508332818984982" stroke="#eff2f5" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2043" x1="0" y1="43.016665637969965" x2="321.65725326538086" y2="43.016665637969965" stroke="#eff2f5" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2044" x1="0" y1="64.52499845695495" x2="321.65725326538086" y2="64.52499845695495" stroke="#eff2f5" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine2045" x1="0" y1="86.03333127593993" x2="321.65725326538086" y2="86.03333127593993" stroke="#eff2f5" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG2040" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine2047" x1="0" y1="86.03333127593993" x2="321.65725326538086" y2="86.03333127593993" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine2046" x1="0" y1="1" x2="0" y2="86.03333127593993" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1961" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1962" class="apexcharts-series" rel="1" seriesName="NetxProfit" data:realIndex="0"><path id="SvgjsPath1966" d="M 10.051789164543152 86.03333127593993L 10.051789164543152 36.26249922847747Q 10.051789164543152 32.26249922847747 14.051789164543152 32.26249922847747L 14.103578329086304 32.26249922847747Q 18.103578329086304 32.26249922847747 18.103578329086304 36.26249922847747L 18.103578329086304 36.26249922847747L 18.103578329086304 86.03333127593993L 18.103578329086304 86.03333127593993z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 10.051789164543152 86.03333127593993L 10.051789164543152 36.26249922847747Q 10.051789164543152 32.26249922847747 14.051789164543152 32.26249922847747L 14.103578329086304 32.26249922847747Q 18.103578329086304 32.26249922847747 18.103578329086304 36.26249922847747L 18.103578329086304 36.26249922847747L 18.103578329086304 86.03333127593993L 18.103578329086304 86.03333127593993z" pathFrom="M 10.051789164543152 86.03333127593993L 10.051789164543152 86.03333127593993L 18.103578329086304 86.03333127593993L 18.103578329086304 86.03333127593993L 18.103578329086304 86.03333127593993L 18.103578329086304 86.03333127593993L 18.103578329086304 86.03333127593993L 10.051789164543152 86.03333127593993" cy="32.26249922847747" cx="49.25894582271576" j="0" val="50" barHeight="53.770832047462456" barWidth="10.051789164543152"></path><path id="SvgjsPath1968" d="M 50.25894582271576 86.03333127593993L 50.25894582271576 25.508332818984982Q 50.25894582271576 21.508332818984982 54.25894582271576 21.508332818984982L 54.31073498725891 21.508332818984982Q 58.31073498725891 21.508332818984982 58.31073498725891 25.508332818984982L 58.31073498725891 25.508332818984982L 58.31073498725891 86.03333127593993L 58.31073498725891 86.03333127593993z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 50.25894582271576 86.03333127593993L 50.25894582271576 25.508332818984982Q 50.25894582271576 21.508332818984982 54.25894582271576 21.508332818984982L 54.31073498725891 21.508332818984982Q 58.31073498725891 21.508332818984982 58.31073498725891 25.508332818984982L 58.31073498725891 25.508332818984982L 58.31073498725891 86.03333127593993L 58.31073498725891 86.03333127593993z" pathFrom="M 50.25894582271576 86.03333127593993L 50.25894582271576 86.03333127593993L 58.31073498725891 86.03333127593993L 58.31073498725891 86.03333127593993L 58.31073498725891 86.03333127593993L 58.31073498725891 86.03333127593993L 58.31073498725891 86.03333127593993L 50.25894582271576 86.03333127593993" cy="21.508332818984982" cx="89.46610248088837" j="1" val="60" barHeight="64.52499845695495" barWidth="10.051789164543152"></path><path id="SvgjsPath1970" d="M 90.46610248088837 86.03333127593993L 90.46610248088837 14.754166409492498Q 90.46610248088837 10.754166409492498 94.46610248088837 10.754166409492498L 94.51789164543152 10.754166409492498Q 98.51789164543152 10.754166409492498 98.51789164543152 14.754166409492498L 98.51789164543152 14.754166409492498L 98.51789164543152 86.03333127593993L 98.51789164543152 86.03333127593993z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 90.46610248088837 86.03333127593993L 90.46610248088837 14.754166409492498Q 90.46610248088837 10.754166409492498 94.46610248088837 10.754166409492498L 94.51789164543152 10.754166409492498Q 98.51789164543152 10.754166409492498 98.51789164543152 14.754166409492498L 98.51789164543152 14.754166409492498L 98.51789164543152 86.03333127593993L 98.51789164543152 86.03333127593993z" pathFrom="M 90.46610248088837 86.03333127593993L 90.46610248088837 86.03333127593993L 98.51789164543152 86.03333127593993L 98.51789164543152 86.03333127593993L 98.51789164543152 86.03333127593993L 98.51789164543152 86.03333127593993L 98.51789164543152 86.03333127593993L 90.46610248088837 86.03333127593993" cy="10.754166409492498" cx="129.67325913906097" j="2" val="70" barHeight="75.27916486644743" barWidth="10.051789164543152"></path><path id="SvgjsPath1972" d="M 130.67325913906097 86.03333127593993L 130.67325913906097 4Q 130.67325913906097 0 134.67325913906097 0L 134.72504830360413 0Q 138.72504830360413 0 138.72504830360413 4L 138.72504830360413 4L 138.72504830360413 86.03333127593993L 138.72504830360413 86.03333127593993z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 130.67325913906097 86.03333127593993L 130.67325913906097 4Q 130.67325913906097 0 134.67325913906097 0L 134.72504830360413 0Q 138.72504830360413 0 138.72504830360413 4L 138.72504830360413 4L 138.72504830360413 86.03333127593993L 138.72504830360413 86.03333127593993z" pathFrom="M 130.67325913906097 86.03333127593993L 130.67325913906097 86.03333127593993L 138.72504830360413 86.03333127593993L 138.72504830360413 86.03333127593993L 138.72504830360413 86.03333127593993L 138.72504830360413 86.03333127593993L 138.72504830360413 86.03333127593993L 130.67325913906097 86.03333127593993" cy="0" cx="169.88041579723358" j="3" val="80" barHeight="86.03333127593993" barWidth="10.051789164543152"></path><path id="SvgjsPath1974" d="M 170.88041579723358 86.03333127593993L 170.88041579723358 25.508332818984982Q 170.88041579723358 21.508332818984982 174.88041579723358 21.508332818984982L 174.93220496177673 21.508332818984982Q 178.93220496177673 21.508332818984982 178.93220496177673 25.508332818984982L 178.93220496177673 25.508332818984982L 178.93220496177673 86.03333127593993L 178.93220496177673 86.03333127593993z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 170.88041579723358 86.03333127593993L 170.88041579723358 25.508332818984982Q 170.88041579723358 21.508332818984982 174.88041579723358 21.508332818984982L 174.93220496177673 21.508332818984982Q 178.93220496177673 21.508332818984982 178.93220496177673 25.508332818984982L 178.93220496177673 25.508332818984982L 178.93220496177673 86.03333127593993L 178.93220496177673 86.03333127593993z" pathFrom="M 170.88041579723358 86.03333127593993L 170.88041579723358 86.03333127593993L 178.93220496177673 86.03333127593993L 178.93220496177673 86.03333127593993L 178.93220496177673 86.03333127593993L 178.93220496177673 86.03333127593993L 178.93220496177673 86.03333127593993L 170.88041579723358 86.03333127593993" cy="21.508332818984982" cx="210.0875724554062" j="4" val="60" barHeight="64.52499845695495" barWidth="10.051789164543152"></path><path id="SvgjsPath1976" d="M 211.0875724554062 86.03333127593993L 211.0875724554062 36.26249922847747Q 211.0875724554062 32.26249922847747 215.0875724554062 32.26249922847747L 215.13936161994934 32.26249922847747Q 219.13936161994934 32.26249922847747 219.13936161994934 36.26249922847747L 219.13936161994934 36.26249922847747L 219.13936161994934 86.03333127593993L 219.13936161994934 86.03333127593993z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 211.0875724554062 86.03333127593993L 211.0875724554062 36.26249922847747Q 211.0875724554062 32.26249922847747 215.0875724554062 32.26249922847747L 215.13936161994934 32.26249922847747Q 219.13936161994934 32.26249922847747 219.13936161994934 36.26249922847747L 219.13936161994934 36.26249922847747L 219.13936161994934 86.03333127593993L 219.13936161994934 86.03333127593993z" pathFrom="M 211.0875724554062 86.03333127593993L 211.0875724554062 86.03333127593993L 219.13936161994934 86.03333127593993L 219.13936161994934 86.03333127593993L 219.13936161994934 86.03333127593993L 219.13936161994934 86.03333127593993L 219.13936161994934 86.03333127593993L 211.0875724554062 86.03333127593993" cy="32.26249922847747" cx="250.2947291135788" j="5" val="50" barHeight="53.770832047462456" barWidth="10.051789164543152"></path><path id="SvgjsPath1978" d="M 251.2947291135788 86.03333127593993L 251.2947291135788 14.754166409492498Q 251.2947291135788 10.754166409492498 255.2947291135788 10.754166409492498L 255.34651827812195 10.754166409492498Q 259.34651827812195 10.754166409492498 259.34651827812195 14.754166409492498L 259.34651827812195 14.754166409492498L 259.34651827812195 86.03333127593993L 259.34651827812195 86.03333127593993z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 251.2947291135788 86.03333127593993L 251.2947291135788 14.754166409492498Q 251.2947291135788 10.754166409492498 255.2947291135788 10.754166409492498L 255.34651827812195 10.754166409492498Q 259.34651827812195 10.754166409492498 259.34651827812195 14.754166409492498L 259.34651827812195 14.754166409492498L 259.34651827812195 86.03333127593993L 259.34651827812195 86.03333127593993z" pathFrom="M 251.2947291135788 86.03333127593993L 251.2947291135788 86.03333127593993L 259.34651827812195 86.03333127593993L 259.34651827812195 86.03333127593993L 259.34651827812195 86.03333127593993L 259.34651827812195 86.03333127593993L 259.34651827812195 86.03333127593993L 251.2947291135788 86.03333127593993" cy="10.754166409492498" cx="290.5018857717514" j="6" val="70" barHeight="75.27916486644743" barWidth="10.051789164543152"></path><path id="SvgjsPath1980" d="M 291.5018857717514 86.03333127593993L 291.5018857717514 25.508332818984982Q 291.5018857717514 21.508332818984982 295.5018857717514 21.508332818984982L 295.55367493629456 21.508332818984982Q 299.55367493629456 21.508332818984982 299.55367493629456 25.508332818984982L 299.55367493629456 25.508332818984982L 299.55367493629456 86.03333127593993L 299.55367493629456 86.03333127593993z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 291.5018857717514 86.03333127593993L 291.5018857717514 25.508332818984982Q 291.5018857717514 21.508332818984982 295.5018857717514 21.508332818984982L 295.55367493629456 21.508332818984982Q 299.55367493629456 21.508332818984982 299.55367493629456 25.508332818984982L 299.55367493629456 25.508332818984982L 299.55367493629456 86.03333127593993L 299.55367493629456 86.03333127593993z" pathFrom="M 291.5018857717514 86.03333127593993L 291.5018857717514 86.03333127593993L 299.55367493629456 86.03333127593993L 299.55367493629456 86.03333127593993L 299.55367493629456 86.03333127593993L 299.55367493629456 86.03333127593993L 299.55367493629456 86.03333127593993L 291.5018857717514 86.03333127593993" cy="21.508332818984982" cx="330.709042429924" j="7" val="60" barHeight="64.52499845695495" barWidth="10.051789164543152"></path><g id="SvgjsG1964" class="apexcharts-bar-goals-markers" style="pointer-events: none"><g id="SvgjsG1965" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1967" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1969" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1971" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1973" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1975" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1977" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1979" className="apexcharts-bar-goals-groups"></g></g></g><g id="SvgjsG1981" class="apexcharts-series" rel="2" seriesName="Revenue" data:realIndex="1"><path id="SvgjsPath1985" d="M 20.103578329086304 86.03333127593993L 20.103578329086304 36.26249922847747Q 20.103578329086304 32.26249922847747 24.103578329086304 32.26249922847747L 24.155367493629456 32.26249922847747Q 28.155367493629456 32.26249922847747 28.155367493629456 36.26249922847747L 28.155367493629456 36.26249922847747L 28.155367493629456 86.03333127593993L 28.155367493629456 86.03333127593993z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 20.103578329086304 86.03333127593993L 20.103578329086304 36.26249922847747Q 20.103578329086304 32.26249922847747 24.103578329086304 32.26249922847747L 24.155367493629456 32.26249922847747Q 28.155367493629456 32.26249922847747 28.155367493629456 36.26249922847747L 28.155367493629456 36.26249922847747L 28.155367493629456 86.03333127593993L 28.155367493629456 86.03333127593993z" pathFrom="M 20.103578329086304 86.03333127593993L 20.103578329086304 86.03333127593993L 28.155367493629456 86.03333127593993L 28.155367493629456 86.03333127593993L 28.155367493629456 86.03333127593993L 28.155367493629456 86.03333127593993L 28.155367493629456 86.03333127593993L 20.103578329086304 86.03333127593993" cy="32.26249922847747" cx="59.31073498725891" j="0" val="50" barHeight="53.770832047462456" barWidth="10.051789164543152"></path><path id="SvgjsPath1987" d="M 60.31073498725891 86.03333127593993L 60.31073498725891 25.508332818984982Q 60.31073498725891 21.508332818984982 64.31073498725891 21.508332818984982L 64.36252415180206 21.508332818984982Q 68.36252415180206 21.508332818984982 68.36252415180206 25.508332818984982L 68.36252415180206 25.508332818984982L 68.36252415180206 86.03333127593993L 68.36252415180206 86.03333127593993z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 60.31073498725891 86.03333127593993L 60.31073498725891 25.508332818984982Q 60.31073498725891 21.508332818984982 64.31073498725891 21.508332818984982L 64.36252415180206 21.508332818984982Q 68.36252415180206 21.508332818984982 68.36252415180206 25.508332818984982L 68.36252415180206 25.508332818984982L 68.36252415180206 86.03333127593993L 68.36252415180206 86.03333127593993z" pathFrom="M 60.31073498725891 86.03333127593993L 60.31073498725891 86.03333127593993L 68.36252415180206 86.03333127593993L 68.36252415180206 86.03333127593993L 68.36252415180206 86.03333127593993L 68.36252415180206 86.03333127593993L 68.36252415180206 86.03333127593993L 60.31073498725891 86.03333127593993" cy="21.508332818984982" cx="99.51789164543152" j="1" val="60" barHeight="64.52499845695495" barWidth="10.051789164543152"></path><path id="SvgjsPath1989" d="M 100.51789164543152 86.03333127593993L 100.51789164543152 14.754166409492498Q 100.51789164543152 10.754166409492498 104.51789164543152 10.754166409492498L 104.56968080997467 10.754166409492498Q 108.56968080997467 10.754166409492498 108.56968080997467 14.754166409492498L 108.56968080997467 14.754166409492498L 108.56968080997467 86.03333127593993L 108.56968080997467 86.03333127593993z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 100.51789164543152 86.03333127593993L 100.51789164543152 14.754166409492498Q 100.51789164543152 10.754166409492498 104.51789164543152 10.754166409492498L 104.56968080997467 10.754166409492498Q 108.56968080997467 10.754166409492498 108.56968080997467 14.754166409492498L 108.56968080997467 14.754166409492498L 108.56968080997467 86.03333127593993L 108.56968080997467 86.03333127593993z" pathFrom="M 100.51789164543152 86.03333127593993L 100.51789164543152 86.03333127593993L 108.56968080997467 86.03333127593993L 108.56968080997467 86.03333127593993L 108.56968080997467 86.03333127593993L 108.56968080997467 86.03333127593993L 108.56968080997467 86.03333127593993L 100.51789164543152 86.03333127593993" cy="10.754166409492498" cx="139.72504830360413" j="2" val="70" barHeight="75.27916486644743" barWidth="10.051789164543152"></path><path id="SvgjsPath1991" d="M 140.72504830360413 86.03333127593993L 140.72504830360413 4Q 140.72504830360413 0 144.72504830360413 0L 144.77683746814728 0Q 148.77683746814728 0 148.77683746814728 4L 148.77683746814728 4L 148.77683746814728 86.03333127593993L 148.77683746814728 86.03333127593993z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 140.72504830360413 86.03333127593993L 140.72504830360413 4Q 140.72504830360413 0 144.72504830360413 0L 144.77683746814728 0Q 148.77683746814728 0 148.77683746814728 4L 148.77683746814728 4L 148.77683746814728 86.03333127593993L 148.77683746814728 86.03333127593993z" pathFrom="M 140.72504830360413 86.03333127593993L 140.72504830360413 86.03333127593993L 148.77683746814728 86.03333127593993L 148.77683746814728 86.03333127593993L 148.77683746814728 86.03333127593993L 148.77683746814728 86.03333127593993L 148.77683746814728 86.03333127593993L 140.72504830360413 86.03333127593993" cy="0" cx="179.93220496177673" j="3" val="80" barHeight="86.03333127593993" barWidth="10.051789164543152"></path><path id="SvgjsPath1993" d="M 180.93220496177673 86.03333127593993L 180.93220496177673 25.508332818984982Q 180.93220496177673 21.508332818984982 184.93220496177673 21.508332818984982L 184.98399412631989 21.508332818984982Q 188.98399412631989 21.508332818984982 188.98399412631989 25.508332818984982L 188.98399412631989 25.508332818984982L 188.98399412631989 86.03333127593993L 188.98399412631989 86.03333127593993z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 180.93220496177673 86.03333127593993L 180.93220496177673 25.508332818984982Q 180.93220496177673 21.508332818984982 184.93220496177673 21.508332818984982L 184.98399412631989 21.508332818984982Q 188.98399412631989 21.508332818984982 188.98399412631989 25.508332818984982L 188.98399412631989 25.508332818984982L 188.98399412631989 86.03333127593993L 188.98399412631989 86.03333127593993z" pathFrom="M 180.93220496177673 86.03333127593993L 180.93220496177673 86.03333127593993L 188.98399412631989 86.03333127593993L 188.98399412631989 86.03333127593993L 188.98399412631989 86.03333127593993L 188.98399412631989 86.03333127593993L 188.98399412631989 86.03333127593993L 180.93220496177673 86.03333127593993" cy="21.508332818984982" cx="220.13936161994934" j="4" val="60" barHeight="64.52499845695495" barWidth="10.051789164543152"></path><path id="SvgjsPath1995" d="M 221.13936161994934 86.03333127593993L 221.13936161994934 36.26249922847747Q 221.13936161994934 32.26249922847747 225.13936161994934 32.26249922847747L 225.1911507844925 32.26249922847747Q 229.1911507844925 32.26249922847747 229.1911507844925 36.26249922847747L 229.1911507844925 36.26249922847747L 229.1911507844925 86.03333127593993L 229.1911507844925 86.03333127593993z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 221.13936161994934 86.03333127593993L 221.13936161994934 36.26249922847747Q 221.13936161994934 32.26249922847747 225.13936161994934 32.26249922847747L 225.1911507844925 32.26249922847747Q 229.1911507844925 32.26249922847747 229.1911507844925 36.26249922847747L 229.1911507844925 36.26249922847747L 229.1911507844925 86.03333127593993L 229.1911507844925 86.03333127593993z" pathFrom="M 221.13936161994934 86.03333127593993L 221.13936161994934 86.03333127593993L 229.1911507844925 86.03333127593993L 229.1911507844925 86.03333127593993L 229.1911507844925 86.03333127593993L 229.1911507844925 86.03333127593993L 229.1911507844925 86.03333127593993L 221.13936161994934 86.03333127593993" cy="32.26249922847747" cx="260.34651827812195" j="5" val="50" barHeight="53.770832047462456" barWidth="10.051789164543152"></path><path id="SvgjsPath1997" d="M 261.34651827812195 86.03333127593993L 261.34651827812195 14.754166409492498Q 261.34651827812195 10.754166409492498 265.34651827812195 10.754166409492498L 265.3983074426651 10.754166409492498Q 269.3983074426651 10.754166409492498 269.3983074426651 14.754166409492498L 269.3983074426651 14.754166409492498L 269.3983074426651 86.03333127593993L 269.3983074426651 86.03333127593993z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 261.34651827812195 86.03333127593993L 261.34651827812195 14.754166409492498Q 261.34651827812195 10.754166409492498 265.34651827812195 10.754166409492498L 265.3983074426651 10.754166409492498Q 269.3983074426651 10.754166409492498 269.3983074426651 14.754166409492498L 269.3983074426651 14.754166409492498L 269.3983074426651 86.03333127593993L 269.3983074426651 86.03333127593993z" pathFrom="M 261.34651827812195 86.03333127593993L 261.34651827812195 86.03333127593993L 269.3983074426651 86.03333127593993L 269.3983074426651 86.03333127593993L 269.3983074426651 86.03333127593993L 269.3983074426651 86.03333127593993L 269.3983074426651 86.03333127593993L 261.34651827812195 86.03333127593993" cy="10.754166409492498" cx="300.55367493629456" j="6" val="70" barHeight="75.27916486644743" barWidth="10.051789164543152"></path><path id="SvgjsPath1999" d="M 301.55367493629456 86.03333127593993L 301.55367493629456 25.508332818984982Q 301.55367493629456 21.508332818984982 305.55367493629456 21.508332818984982L 305.6054641008377 21.508332818984982Q 309.6054641008377 21.508332818984982 309.6054641008377 25.508332818984982L 309.6054641008377 25.508332818984982L 309.6054641008377 86.03333127593993L 309.6054641008377 86.03333127593993z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMasklxg3qoqu)" pathTo="M 301.55367493629456 86.03333127593993L 301.55367493629456 25.508332818984982Q 301.55367493629456 21.508332818984982 305.55367493629456 21.508332818984982L 305.6054641008377 21.508332818984982Q 309.6054641008377 21.508332818984982 309.6054641008377 25.508332818984982L 309.6054641008377 25.508332818984982L 309.6054641008377 86.03333127593993L 309.6054641008377 86.03333127593993z" pathFrom="M 301.55367493629456 86.03333127593993L 301.55367493629456 86.03333127593993L 309.6054641008377 86.03333127593993L 309.6054641008377 86.03333127593993L 309.6054641008377 86.03333127593993L 309.6054641008377 86.03333127593993L 309.6054641008377 86.03333127593993L 301.55367493629456 86.03333127593993" cy="21.508332818984982" cx="340.76083159446716" j="7" val="60" barHeight="64.52499845695495" barWidth="10.051789164543152"></path><g id="SvgjsG1983" class="apexcharts-bar-goals-markers" style="pointer-events: none"><g id="SvgjsG1984" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1986" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1988" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1990" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1992" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1994" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1996" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1998" className="apexcharts-bar-goals-groups"></g></g></g><g id="SvgjsG1963" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1982" class="apexcharts-datalabels" data:realIndex="1"></g></g><line id="SvgjsLine2048" x1="0" y1="0" x2="321.65725326538086" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine2049" x1="0" y1="0" x2="321.65725326538086" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG2050" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG2051" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG2052" class="apexcharts-point-annotations"></g></g><g id="SvgjsG2026" class="apexcharts-yaxis" rel="0" transform="translate(12.34274673461914, 0)"><g id="SvgjsG2027" class="apexcharts-yaxis-texts-g"><text id="SvgjsText2028" font-family="inherit" x="20" y="41.4" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2029">80</tspan><title>80</title></text><text id="SvgjsText2030" font-family="inherit" x="20" y="62.90833281898498" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2031">60</tspan><title>60</title></text><text id="SvgjsText2032" font-family="inherit" x="20" y="84.41666563796997" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2033">40</tspan><title>40</title></text><text id="SvgjsText2034" font-family="inherit" x="20" y="105.92499845695495" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2035">20</tspan><title>20</title></text><text id="SvgjsText2036" font-family="inherit" x="20" y="127.43333127593993" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan2037">0</tspan><title>0</title></text></g></g><g id="SvgjsG1951" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 84px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 158, 247);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(228, 230, 239);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
												<!--end::Chart-->
											</div>
										</div>
										<!--end::Mixed Widget 10-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
								
								<!--begin::Row-->
								<div class="row gy-5 g-xl-8">
									<!--begin::Col-->
									<div class="col-xl-4">
										<!--begin::List Widget 2-->
										<div class="card card-xl-stretch mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0">
												<h3 class="card-title fw-bolder text-dark">Admins</h3>
												<div class="card-toolbar">
													<!--begin::Menu-->
													<span class="badge badge-square badge-primary fs-4">{{ $admin_panel_users->count() }}</span>
													<!--end::Menu-->
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2">
                                                @foreach($admin_panel_users as $admin)
												<!--begin::Item-->
												<div class="d-flex align-items-center mb-7">
													<!--begin::Avatar-->
													<div class="symbol symbol-50px me-5">
                                                        @if($admin->avatar)
														<img src="{{ asset($admin->avatar) }}" class="" alt="">
                                                        @else
														<img src="/metronic8/demo1/assets/media/avatars/300-6.jpg" class="" alt="">
                                                        @endif
													</div>
													<!--end::Avatar-->
													<!--begin::Text-->
													<div class="flex-grow-1">
														<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{ $admin->name }}</a>
														<span class="text-muted d-block fw-bold">Super Admin</span>
													</div>
													<!--end::Text-->
												</div>
												<!--end::Item-->
												@endforeach
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 2-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-4">
										<!--begin::List Widget 6-->
										<div class="card card-xl-stretch mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0">
												<h3 class="card-title fw-bolder text-dark">Notifications</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0">
												<!--begin::Item-->
												<div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
													<!--begin::Icon-->
													<span class="svg-icon svg-icon-warning me-5">
														<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
																<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</span>
													<!--end::Icon-->
													<!--begin::Title-->
													<div class="flex-grow-1 me-2">
														<a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Group lunch celebration</a>
														<span class="text-muted fw-bold d-block">Due in 2 Days</span>
													</div>
													<!--end::Title-->
													<!--begin::Lable-->
													<span class="fw-bolder text-warning py-1">+28%</span>
													<!--end::Lable-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
													<!--begin::Icon-->
													<span class="svg-icon svg-icon-success me-5">
														<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
																<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</span>
													<!--end::Icon-->
													<!--begin::Title-->
													<div class="flex-grow-1 me-2">
														<a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Navigation optimization</a>
														<span class="text-muted fw-bold d-block">Due in 2 Days</span>
													</div>
													<!--end::Title-->
													<!--begin::Lable-->
													<span class="fw-bolder text-success py-1">+50%</span>
													<!--end::Lable-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
													<!--begin::Icon-->
													<span class="svg-icon svg-icon-danger me-5">
														<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
																<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</span>
													<!--end::Icon-->
													<!--begin::Title-->
													<div class="flex-grow-1 me-2">
														<a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Rebrand strategy planning</a>
														<span class="text-muted fw-bold d-block">Due in 5 Days</span>
													</div>
													<!--end::Title-->
													<!--begin::Lable-->
													<span class="fw-bolder text-danger py-1">-27%</span>
													<!--end::Lable-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-center bg-light-info rounded p-5">
													<!--begin::Icon-->
													<span class="svg-icon svg-icon-info me-5">
														<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
																<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</span>
													<!--end::Icon-->
													<!--begin::Title-->
													<div class="flex-grow-1 me-2">
														<a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Product goals strategy</a>
														<span class="text-muted fw-bold d-block">Due in 7 Days</span>
													</div>
													<!--end::Title-->
													<!--begin::Lable-->
													<span class="fw-bolder text-info py-1">+8%</span>
													<!--end::Lable-->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 6-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-4">
										<!--begin::List Widget 4-->
										<div class="card card-xl-stretch mb-5 mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder text-dark">Trends</span>
													<span class="text-muted mt-1 fw-bold fs-7">Latest tech trends</span>
												</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-5">
												<!--begin::Item-->
												<div class="d-flex align-items-sm-center mb-7">
													<!--begin::Symbol-->
													<div class="symbol symbol-50px me-5">
														<span class="symbol-label">
															<img src="/metronic8/demo1/assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="">
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Section-->
													<div class="d-flex align-items-center flex-row-fluid flex-wrap">
														<div class="flex-grow-1 me-2">
															<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Top Authors</a>
															<span class="text-muted fw-bold d-block fs-7">Mark, Rowling, Esther</span>
														</div>
														<span class="badge badge-light fw-bolder my-2">+82$</span>
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-sm-center mb-7">
													<!--begin::Symbol-->
													<div class="symbol symbol-50px me-5">
														<span class="symbol-label">
															<img src="/metronic8/demo1/assets/media/svg/brand-logos/telegram.svg" class="h-50 align-self-center" alt="">
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Section-->
													<div class="d-flex align-items-center flex-row-fluid flex-wrap">
														<div class="flex-grow-1 me-2">
															<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Popular Authors</a>
															<span class="text-muted fw-bold d-block fs-7">Randy, Steve, Mike</span>
														</div>
														<span class="badge badge-light fw-bolder my-2">+280$</span>
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-sm-center mb-7">
													<!--begin::Symbol-->
													<div class="symbol symbol-50px me-5">
														<span class="symbol-label">
															<img src="/metronic8/demo1/assets/media/svg/brand-logos/vimeo.svg" class="h-50 align-self-center" alt="">
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Section-->
													<div class="d-flex align-items-center flex-row-fluid flex-wrap">
														<div class="flex-grow-1 me-2">
															<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">New Users</a>
															<span class="text-muted fw-bold d-block fs-7">John, Pat, Jimmy</span>
														</div>
														<span class="badge badge-light fw-bolder my-2">+4500$</span>
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-sm-center mb-7">
													<!--begin::Symbol-->
													<div class="symbol symbol-50px me-5">
														<span class="symbol-label">
															<img src="/metronic8/demo1/assets/media/svg/brand-logos/bebo.svg" class="h-50 align-self-center" alt="">
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Section-->
													<div class="d-flex align-items-center flex-row-fluid flex-wrap">
														<div class="flex-grow-1 me-2">
															<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Active Customers</a>
															<span class="text-muted fw-bold d-block fs-7">Mark, Rowling, Esther</span>
														</div>
														<span class="badge badge-light fw-bolder my-2">+686$</span>
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex align-items-sm-center mb-7">
													<!--begin::Symbol-->
													<div class="symbol symbol-50px me-5">
														<span class="symbol-label">
															<img src="/metronic8/demo1/assets/media/svg/brand-logos/kickstarter.svg" class="h-50 align-self-center" alt="">
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Section-->
													<div class="d-flex align-items-center flex-row-fluid flex-wrap">
														<div class="flex-grow-1 me-2">
															<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Bestseller Theme</a>
															<span class="text-muted fw-bold d-block fs-7">Disco, Retro, Sports</span>
														</div>
														<span class="badge badge-light fw-bolder my-2">+726$</span>
													</div>
													<!--end::Section-->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::List Widget 4-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
								
							</div>
							<!--end::Container-->
						</div>
    <!--end::Post-->

</div>
@endsection
