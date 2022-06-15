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
                                <option value="active" data-select2-id="select2-data-129-5n39">Active</option>
                                <option value="deactive" data-select2-id="select2-data-131-pohp">Deactive</option>

                            </select>
                            <!--end::Select2-->
                        </div>
                        <div>
                            <a href="{{ route('admin.exam.create') }}" class="btn btn-sm btn-primary">Create Exam</a>
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
                                        <th class="min-w-150px">Name</th>
                                        <th class="min-w-50px">Question</th>
                                        <th class="min-w-70px">Examinner</th>
                                        <th class="min-w-70px">Type</th>
                                        <th class="min-w-70px">Status</th>
                                        <th class="min-w-70px">Subject</th>
                                        <th class="min-w-70px">Actions</th>
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

<!--begin::Modal - Subject add-->
<div class="modal fade" id="kk_modal_add_subject" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-850px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kk_modal_new_add_subject_form" class="form" >
                    {{-- csrf token  --}}
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3 mt-3">Add Subject into exam</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Fill up the form and submit
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    
                    {{-- hidden field  --}}
                    <input type="hidden" name="total_question">
                    <input type="hidden" name="total">
                    <input type="hidden" name="exam_id" id="exam_id">

                    <div class="messages col-md-8 offset-2 mb-13"></div>
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Exam Name</label>
                            <input type="text" class="form-control form-control-solid" name="exam" id="exam_name" disabled>
                            
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Select subject</label>
                            <select class="form-select form-select-solid " data-control="select2"
                                data-hide-search="true" data-placeholder="Select subject" name="subject_id[]"
                                id="subject" required>
                                
                            </select>
                            <div class="help-block with-errors subject-error"></div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4  fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Number of Ques. in this subject</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid number_of_question"  placeholder="Number of Question" name="number_of_question[]" value="0"/>
                            <div class="help-block with-errors number_of_question-error"></div>
                        </div>
                        <!-- end: col-->
                        <!--begin::Col-->
                        <div class="col-md-1  fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required"></span>
                            </label>
                            <!--end::Label-->
                            <button class="btn btn-info btn-icon btn-sm addRow" type="button"><i class="fas fa-plus"></i></button> 
                        </div>
                        <!-- end: col-->
                        <!--begin::Col-->
                        <div class="col-md-3  fv-row" id=total_question>
                            
                        </div>
                        <!-- end: col-->
                        
                    </div>
                    <!--end::Input group-->
                    
                    <!-- append dynamic input field-->
                    <div  class="newRow"></div>
                    <!-- append dynamic input field -->
                    
                    <!--begin::Actions-->
                    <div class="text-center d-flex justify-content-end py-4 px-4" >
                        <button type="submit" id="kk_modal_new_service_submit" class="btn btn-primary" style="padding: 10px 70px">
                            <span class="indicator-label">Submit</span>
                        </button>
                    </div>
                    <!--end::Actions-->

                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Subject add-->

<!--begin::Modal - Edit Subject modal-->
<div class="modal fade" id="kk_exam_details_modal" tabindex="-1" aria-hidden="true">
<div id="exam_details"></div>
</div>
<!--end::Modal - Edit Subject  modal-->


@endsection


@push('script')
    <script type="text/javascript">
        $(document).ready(function() {

            //get datatable data
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
                table.ajax.url( "{{ url('admin/exam?status=') }}"+this.value ).load();
            })

        })

    </script>

    <script type="text/javascript">
        //add subject
        function addSubject(id)
        {
            $.ajax({
                type:"GET",
                url: "{{ url('/admin/exam-details/get-subject')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    $('#exam_name').val(data.exam.name);
                    $('#exam_id').val(data.exam.id);
                    subjectSelectInput(data);
                    $("#kk_modal_add_subject").modal('show');
                }
          });
        }

        function subjectSelectInput(data)
        {
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
                //total number of question
                $('input[name="total_question"]').val(data.exam.number_of_question);
            
                var val = '<label class="d-flex align-items-center fs-6 fw-bold mb-2"><span class="required">Exam Total Question</span> </label>'
                val += '<span class="badge badge-primary badge-lg"><span id=result> 0  </span> / ' + data.exam.number_of_question + '</span>'
                        
                $('#total_question').html(val)
            } else {
                $('#subject').empty(); 
            }
        }

        //disabled submit button
        $('#kk_modal_new_service_submit').attr('disabled', true);

        //count input number of question value
        $(document).on('keyup', ".number_of_question",function () {
            var input_total = 0;
        
            $('.number_of_question').each(function(){
                input_total += parseFloat($(this).val());
            })  

            $("#result").html(input_total);

            var total_question = $('input[name="total_question"]').val();

            if(input_total == total_question) {

                $('#kk_modal_new_service_submit').attr('disabled' , false);
            }
        
            else{
                $('#kk_modal_new_service_submit').attr('disabled' , true);
            }

            if ( input_total > total_question){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Number of input question must be equal to Total Question.',
                    footer: '<a href="" disabled>Pls reduce Num of Ques?</a>'
                })
            }

        })

        //substruction
        function substructTotalQuestion(number_of_question)
        {
            let total_question = $('#result').text();
            let input_total = parseInt(total_question) - parseInt(number_of_question);
            
            $("#result").html(input_total);
        }

        //add new input field
        $(document).on('click', '.addRow', function(e) {
            e.preventDefault();

            //get exam id
            var id = $('#exam_id').val();
            //getting subject for this exam
            addSubject(id);

            var html = '';
            html += '<div class="row g-9 mb-8 dynamic-row">'
                
            html += '    <div class="col-md-4  fv-row">'
            html += '           <label class="required fs-6 fw-bold mb-2">Select subject</label>'
            html += '           <select class="form-select form-select-solid " data-control="select2" data-hide-search="true" data-placeholder="Select subject" name="subject_id[]" id="subject" required>'
            html += '           </select>'
            html += '           <div class="help-block with-errors subject-error"></div>'
            html += '     </div>'
            html += '     <div class="col-md-4  fv-row">'
            html += '         <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
            html += '               <span class="required">Number of Ques.</span>'
            html += '         </label>'
            html += '         <input type="text" class="form-control form-control-solid number_of_question" placeholder="Number of Question" name="number_of_question[]" value="0" />'
            html += '         <div class="help-block with-errors subject-error"></div>'
            html += '      </div>'
            html += '     <div class="col-md-1  fv-row">'
            html += '         <label class="d-flex align-items-center fs-6 fw-bold mb-2">'
            html += '               <span class="required"></span>'
            html += '         </label>'
            html += '          <button class="btn btn-danger btn-icon btn-sm removeRow" type="button"><i class="fas fa-minus"></i></button>'
            html += '      </div>'
            html += '</div>'
            
            $(this).closest('.newRow').append(html);
            $('.newRow').append(html);
        });

        // remove row
        $(document).on('click', '.removeRow', function() {
            $(this).closest('.dynamic-row').remove();
            let number_of_question = $(this).parent().prev().find('.number_of_question').val();
            //console.log(number_of_question);
            substructTotalQuestion(number_of_question);
            //$(this).remove();
        });

        //add subject
        $('#kk_modal_new_add_subject_form').on('submit',function(e){
            e.preventDefault()
            $('.with-errors').text('')

            var arr = $('input[name="number_of_question[]"]').map(function () {
                return this.value; // $(this).val()
            }).get();

            var total = 0;
            for (var i = 0; i < arr.length; i++) {
                total += arr[i] << 0;
            }
            //append total into form
            $('input[name="total"]').val(total);

            //append exam id into form
            var exam_id = $('#exam_id').val();
            $('#exam_id').val(exam_id);

           
            // console.log(total);
            // console.log(total_question);

            var total_question = $('input[name="total_question"]').val();

            if(total_question >= total){

                var formData = new FormData(this);

                $.ajax({
                    type:"POST",
                    url: "{{ route('admin.exam-details.store') }}",
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        //console.log(data);
                        if(data.error){
                            var alertBox = '<div class="alert alert-danger text-center" alert-dismissable">' + data.message + '</div>';
                            $('.messages').html(alertBox).show();
                            setTimeout(function() { 
                                $('.messages').html(alertBox).hide();
                            }, 5000);
                            
                        }else{
                        
                            $('#kk_modal_new_add_subject_form')[0].reset();
                            $("#kk_modal_add_subject").modal('hide');
                            $(".dynamic-row").remove();
                            $('.messages').html('');

                            Swal.fire({
                                text: data.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "{{__('Ok, got it!')}}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh 
                                $('#dataTable').DataTable().ajax.reload();
                            }))
                        }
                    }
                });
            }else{
                //alert('Number of question should be less than total question');
                var alertBox = '<div class="alert alert-danger text-center" alert-dismissable">Exam Total Question = '+total_question+'<br> Subject total Question = '+ total+  '<br> Subject total Question should be less or equal to Exam Total Question </div>';
                $('.messages').html(alertBox).show();
                setTimeout(function() { 
                    $('.messages').html(alertBox).hide();
                }, 7000);
                // toastr.error('Exam Total Question = '+total_question+'<br> Number of Question = '+ total+  '<br> Number of question should be less than or equal total exam Question');
            }
        
        })

        //edit subject
        function editSubject(id)
        {
            $.ajax({
                type:"GET",
                url: "{{ url('/admin/exam-details/get-exam-subject/')}}"+'/'+id,
                dataType: 'json',
                success:function(data){
                    $("#exam_details").html(data.html);
                    $("#kk_exam_details_modal").modal('show');
                }
            });
        }

    </script>
@endpush
