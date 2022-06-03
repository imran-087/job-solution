@extends('admin.layout.app')
@section('title', 'Sub-Category')

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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Sub Category</h1>
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
                    <li class="breadcrumb-item text-muted">Category Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Sub Category List</li>
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
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search category">
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

                            </select>
                            <!--end::Select2-->
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
                                        <th class="min-w-50px">Category</th>
                                        <th class="min-w-50px">Sub Category</th>
                                        <th class=" min-w-150px">Name</th>
                                        <th class=" min-w-50px">Question</th>
                                        <th class=" min-w-70px">Examinner</th>
                                        <th class=" min-w-70px">Type</th>
                                        <th class=" min-w-70px">Status</th>
                                        <th class=" min-w-70px">Subject</th>
                                        <th class=" min-w-100px">Add Subject</th>
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
                ajax: "{{ url('admin/exam') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'category_id',
                        name: 'category_id'
                    },
                    {
                        data: 'sub_category_id',
                        name: 'sub_category_id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'number_of_question',
                        name: 'number_of_question'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'examinee_type',
                        name: 'examinee_type'
                    },

                    {
                        data: 'exam_status',
                        name: 'exam_status'
                    },
                
                    {
                        data: 'subject',
                        name: 'subject'
                    },
                
                    {
                        data: 'add_subject',
                        name: 'add_subject'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ],
                "order": [
                    [6, 'desc']
                ] //created at desc

            })

            document.querySelector('[data-kk-product-table-filter="search"]').addEventListener("keyup", (function(
                t) {
                table.search(t.target.value).draw()
            }))

            $('.kk-datatable-filter').on('change',function(){
                console.log(this.value)
                table.ajax.url( "{{ url('admin/exam?status=') }}"+this.value ).load();
            })

        })

        //add subject
        function addSubject(id){
            $('input[name="exam_id"]').val('')
            $('.with-errors').text('')
            $('#kk_modal_new_subject_form')[0].reset();
            $('#kk_modal_add_subject').modal('show')
        }

        function getSubject(id){
            $.ajax({
                url: '/admin/exam-details/get-subject/' + id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('#subject').empty();
                        $('#subject').append('<option value="">Choose...</option>');
                        $.each(data.subject, function (key, subject) {
                            if(subject.sub_category){
                                $('select[name="subject_id[]"]').append(
                                '<option value="' + subject.id + '">' + subject.name   + ' - ' + subject.sub_category.name + '</option>');
                               
                            }else{
                                $('select[name="subject_id[]"]').append(
                                '<option value="' + subject.id + '">' + subject.name   +' - '+ subject.main_category.name + '</option>');
                            } 
                        });
                        $('input[name="total_question"]').val(data.exam.number_of_question);
                    }
                        else {
                        $('#subject').empty(); 
                    }
                }
            });
        }

        //save subject
        $('#kk_modal_new_subject_form').on('submit',function(e){
            e.preventDefault()
            $('.with-errors').text('')
            $('.indicator-label').hide()
            $('.indicator-progress').show()
            $('#kk_modal_new_service_submit').attr('disabled','true')

            var formData = new FormData(this);
            $.ajax({
                type:"POST",
                url: "{{ url('admin/category/category/store')}}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.success ==  false || data.success ==  "false"){
                        var arr = Object.keys(data.errors);
                        var arr_val = Object.values(data.errors);
                        for(var i= 0;i < arr.length;i++){
                        $('.'+arr[i]+'-error').text(arr_val[i][0])
                        }
                    }else if(data.error || data.error == 'true'){
                        var alertBox = '<div class="alert alert-danger" alert-dismissable">' + data.message + '</div>';
                        $('#kk_modal_new_subject_form').find('.messages').html(alertBox).show();
                    }else{
                        // empty the form
                        $('#kk_modal_new_subject_form')[0].reset();
                        $("#kk_modal_add_subject").modal('hide');

                        Swal.fire({
                                text: data.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "{{__('Ok, got it!')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh datatable
                                $('#dataTable').DataTable().ajax.reload();
                            }))
                    }

                    $('.indicator-label').show()
                    $('.indicator-progress').hide()
                    $('#kk_modal_new_service_submit').removeAttr('disabled')

                }
          });

        })
    </script>
@endpush
