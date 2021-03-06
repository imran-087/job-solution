@extends('layouts.app')
@section('title', 'Model test')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Exam</h1>
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
                <li class="breadcrumb-item text-dark">Model Test</li>
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
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kk-product-table-filter="search"
                            class="form-control form-control-solid w-250px ps-14" placeholder="Search exam">
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->

                <div class="card-toolbar flex-row-fluid justify-content-end gap-5"
                    data-select2-id="select2-data-123-0tix">
                    <div class="w-100 mw-150px" data-select2-id="select2-data-122-mhmq">
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid select2-hidden-accessible kk-datatable-filter"
                            data-control="select2" data-hide-search="true" data-placeholder="Status"
                            data-kt-ecommerce-product-filter="status" data-select2-id="select2-data-10-i8aq"
                            tabindex="-1" aria-hidden="true">
                            <option data-select2-id="select2-data-12-ibou"></option>
                            <option value="all" data-select2-id="select2-data-128-oc9k">All</option>
                            <option value="user" data-select2-id="select2-data-129-5n39">Free</option>
                            <option value="subscriber" data-select2-id="select2-data-131-pohp">Paid</option>

                        </select>
                        <!--end::Select2-->
                    </div>
                    <div>
                        <a href="{{ route('custom.model-test')  }}" class="btn btn-sm btn-primary">Custom</a>
                    </div>
                    
                </div>

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_table_Service_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            style="width:100%" id="dataTable">

                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-20px">#</th>
                                    <th class="min-w-150px">Exam Name</th>
                                    <th class="min-w-50px">Question</th>
                                    <th class="min-w-50px">Mark</th>
                                    <th class="min-w-50px">Cut Mark</th>
                                    <th class="min-w-50px">Negative Mark</th>
                                    <th class="min-w-50px">Answered</th>
                                    <th class="min-w-50px">Right</th>
                                    <th class="min-w-50px">Wrong</th>
                                    <th class="min-w-50px">Not Ans.</th>
                                    <th class="min-w-50px">Obtain Mark</th>
                                    <th class="min-w-50px">Status</th>
                                    <th class="min-w-70px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->

                            <tbody>
                                {{-- <tr class="odd">				
                                    <!--begin::SKU=-->
                                    <td class=" pe-0">
                                        <span class="fw-bolder">02439003</span>
                                    </td>
                                    <!--end::SKU=-->
                                    <!--begin::Qty=-->
                                    <td class=" pe-0" data-order="10">
                                        <span class="fw-bolder ms-3">Bane</span>
                                    </td>
                                    <!--end::Qty=-->
                                    <!--begin::Price=-->
                                    <td class=" pe-0">
                                        <span class="fw-bolder text-dark">$72.00</span>
                                    </td>
                                    <!--end::Price=-->
                                    <!--begin::Price=-->
                                    <td class=" pe-0">
                                        <span class="fw-bolder text-dark">$72.00</span>
                                    </td>
                                    <!--end::Price=-->
                                    <!--begin::Price=-->
                                    <td class=" pe-0">
                                        <span class="fw-bolder text-dark">$72.00</span>
                                    </td>
                                    <!--end::Price=-->
                                    <!--begin::Price=-->
                                    <td class=" pe-0">
                                        <span class="fw-bolder text-dark">$72.00</span>
                                    </td>
                                    <!--end::Price=-->
                                    <!--begin::Price=-->
                                    <td class=" pe-0">
                                        <span class="fw-bolder text-dark">$72.00</span>
                                    </td>
                                    <!--end::Price=-->
                                    <!--begin::Price=-->
                                    <td class=" pe-0">
                                        <span class="fw-bolder text-dark">$72.00</span>
                                    </td>
                                    <!--end::Price=-->
                                    <!--begin::Price=-->
                                    <td class=" pe-0">
                                        <span class="fw-bolder text-dark">$72.00</span>
                                    </td>
                                    <!--end::Price=-->
                                    <!--begin::Price=-->
                                    <td class=" pe-0">
                                        <span class="fw-bolder text-dark">$72.00</span>
                                    </td>
                                    <!--end::Price=-->
                                    <!--begin::Price=-->
                                    <td class=" pe-0">
                                        <span class="fw-bolder text-dark">$72.00</span>
                                    </td>
                                    <!--end::Price=-->
                                    <!--begin::Price=-->
                                    <td class=" pe-0">
                                        <span class="fw-bolder text-dark">$72.00</span>
                                    </td>
                                    <!--end::Price=-->
                                    
                                </tr> --}}
                            </tbody>

                        </table>


                    </div>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->


@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#dataTable').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: "{{ url('/model-test/result') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'exam_id',
                        name: 'exam_id'
                    },
                    {
                        data: 'total_question',
                        name: 'total_question'
                    },
                    {
                        data: 'total_mark',
                        name: 'total_mark'
                    },
                    {
                        data: 'cut_mark',
                        name: 'cut_mark'
                    },
                    {
                        data: 'negative_mark',
                        name: 'negative_mark'
                    },
                    {
                        data: 'answered',
                        name: 'answered'
                    },
                  
                    {
                        data: 'right_ans',
                        name: 'right_ans'
                    },
                    {
                        data: 'wrong_ans',
                        name: 'wrong_ans'
                    },
                      {
                        data: 'not_ans',
                        name: 'not_ans'
                    },
                    {
                        data: 'obtain_mark',
                        name: 'obtain_mark'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                  
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ],
                // "order": [
                //     [6, 'desc']
                // ] //created at desc

            })

            document.querySelector('[data-kk-product-table-filter="search"]').addEventListener("keyup", (function(
                t) {
                table.search(t.target.value).draw()
            }))

            $('.kk-datatable-filter').on('change',function(){
                //console.log(this.value)
                table.ajax.url( "{{ url('/model-test/result?status=') }}"+this.value ).load();
            })

        })

    </script>
@endpush