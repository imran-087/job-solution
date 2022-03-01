@extends('admin.layout.app')
@section('title', 'Question')

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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Question</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Question Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">All Question</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                <!--end::Button-->
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
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search passage">
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
                                <option value="active" data-select2-id="select2-data-129-5n39">Active</option>
                                <option value="deactive" data-select2-id="select2-data-131-pohp">Deactive</option>
                                <option value="pending" data-select2-id="select2-data-131-pohp">Pending</option>

                            </select>
                            <!--end::Select2-->
                        </div>
                        <!--begin::Add product-->
                        <a href="javascript:;" class="btn btn-sm btn-primary me-3" onclick="addNew()">Add Question</a>
                        <!--end::Add product-->
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
                                        <th class="min-w-100px">Sub Category</th>
                                        <th class="min-w-100px">Subject</th>
                                        <th class=" min-w-300px">Question</th>
                                        <th class=" min-w-50px">Status</th>
                                        <th class=" min-w-100px">Created at</th>
                                        <th class=" min-w-70px">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->

                                <tbody>

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
</div>


@endsection


@push('script')
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#dataTable').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: "{{ url('admin/question/question-index') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'sub_category_id',
                        name: 'sub_category_id'
                    },
                    {
                        data: 'subject_id',
                        name: 'subject_id'
                    },
                    {
                        data: 'question',
                        name: 'question'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                   
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ],
                "order": [
                    [5, 'desc']
                ] //created at desc

            })

            document.querySelector('[data-kk-product-table-filter="search"]').addEventListener("keyup", (function(
                t) {
                table.search(t.target.value).draw()
            }))

             $('.kk-datatable-filter').on('change',function(){
                console.log(this.value)
                table.ajax.url( "{{ url('admin/question/question-index?status=') }}"+this.value ).load();
            })

        })


    //deleteQuestion
    function deleteQuestion(id){
        Swal.fire({
            text: "Are you sure you want delete this?",
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Confirm",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then((function (o) {
            if(o.value){ //if agree
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/question/delete') }}"+'/'+id,
                    data: {},
                    success: function (res)
                    {
                        if(res.success){
                            Swal.fire({
                                text: res.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh datatable
                                $('#dataTable').DataTable().ajax.reload();
                            }))
                        }
                    }
                });

            }else{ //if cancel
                Swal.fire({
                    text: "Item has not been deleted",
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                })
            }

        }))
    }

    </script>
@endpush
