<script type="text/javascript">

    //test
    $(document).ready(function(){
        $('.option').on('click', function(){
            var id = $(this).data('id')
            var option_no = $(this).data('option')
            // console.log(id)
            // console.log(option_no)
            $(this).closest('.row').find('p').off('click').removeClass('cursor-pointer')
            $.ajax({
            type:"GET",
            url: "{{ url('question/answer-check') }}"+'/'+id+'/'+option_no,
            dataType: 'json',
            success:function(data){
                if(data.success == true){
                    toastr.success(data.message);
                    var val = $('#wright').html()
                    //console.log(val)
                    $('#wright').html(parseInt(val)+1)
                    
                }
                if(data.error == true){
                    toastr.error(data.message);

                    var val = $('#wrong').html()
                    //console.log(val)
                    $('#wrong').html(parseInt(val)+1)
                    
                }
            }
        })
        })
    })

    //view-specific answer
    $(document).ready(function(){
        $('.view-answer').on('click', function(){
            $(this).closest('.card-body').find('.reading').toggleClass('d-none');
            $(this).closest('.card-body').find('.test').toggleClass('d-none');
        })
    })

    //add comment
    $(document).ready(function(){
        $('.comment').on('click', function(){
            var id = $(this).data(id)
            var val = $(this).text()
            console.log(val)
            $(this).html(` <i class="fas fa-comment-alt"></i>`+(parseInt(val)+1))
            //console.log(id.id)
            $('input[name="question_id"]').val(id.id)
            $('.with-errors').text('')
            $('#kk_modal_new_comment_form')[0].reset();
            $('#kk_modal_new_comment').modal('show')
        })
    })

    //new comment save
    $('#kk_modal_new_comment_form').on('submit',function(e){
        e.preventDefault()
        $('.with-errors').text('')
        $('.indicator-label').hide()
        $('.indicator-progress').show()
        $('#kk_modal_new_comment_submit').attr('disabled','true')

        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url: "{{ url('question/comment/store')}}",
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
                    $('#kk_modal_new_comment_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_comment_form')[0].reset();
                    $("#kk_modal_new_comment").modal('hide');

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
                $('#kk_modal_new_comment_submit').removeAttr('disabled')

            }
        });

    })
        
    //edit Question
    $('.editQuestion').on('click', function() {
        var id = $(this).data(id)
        var ques_type = $(this).data('ques_type')
        console.log(ques_type)
        $.ajax({
            type:"GET",
            url: "{{ url('/question/edit-question')}}"+'/'+id.id+'/'+ques_type,
            dataType: 'json',
            success:function(data){
                $("#edited_question_view_modal").html(data.html);
                $("#kk_modal_show_question").modal('show');
            }
        });
    });

    //edit question cancel button
    $(document).on('click', '#kk_modal_new_service_cancel', function(){
        
        $("#kk_modal_show_question").modal('hide');
        
    })

    //update edited question
    $(document).on('submit', '#kk_modal_new_question_form', function(e){
        e.preventDefault()
        //console.log('here')
        $('.with-errors').text('')
        $('.indicator-label').hide()
        $('.indicator-progress').show()
        $('#kk_modal_new_service_submit').attr('disabled','true')

        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url: "{{ url('/question/edit-question/update')}}",
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
                    $('#kk_modal_new_question_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_question_form')[0].reset();
                    $("#kk_modal_show_question").modal('hide');

                    Swal.fire({
                        text: data.message,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "{{__('Ok, got it!')}}",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    })
                }

                $('.indicator-label').show()
                $('.indicator-progress').hide()
                $('#kk_modal_new_service_submit').removeAttr('disabled')

            }
        });
    })

    //add description
    $('.addDescription').on('click', function() {
        var id = $(this).data(id)
        //console.log(id.id)
        $('input[name="question_id"]').val(id.id)
        $('.with-errors').text('')
        $('#kk_modal_new_question_des_form')[0].reset();
        $('#kk_modal_new_question_des').modal('show')
    });

          
    //new description save
    $('#kk_modal_new_question_des_form').on('submit',function(e){
        e.preventDefault()
        $('.with-errors').text('')
        $('.indicator-label').hide()
        $('.indicator-progress').show()
        $('#kk_modal_new_service_submit').attr('disabled','true')

        var formData = new FormData(this);
        formData.append('description', myEditor.getData());
        $.ajax({
            type:"POST",
            url: "{{ url('description/question-description/store')}}",
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
                    $('#kk_modal_new_question_des_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_question_des_form')[0].reset();
                    $("#kk_modal_new_question_des").modal('hide');

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

    //cancel button
    $('.kk_modal_new_service_cancel').on('click', function(){
        $('.messages').empty();
       
        $('#kk_modal_new_bookmark_form')[0].reset();
        $("#kk_modal_new_bookmark").modal('hide');

        $('#kk_modal_new_question_des_form')[0].reset();
        $("#kk_modal_new_question_des").modal('hide');

        $('#kk_modal_new_comment_form')[0].reset();
        $("#kk_modal_new_comment").modal('hide');

        $('.indicator-label').show()
        $('.indicator-progress').hide()
        $('#kk_modal_new_service_submit').removeAttr('disabled')
    })
            
    //question vote/like
    $('.vote').on('click', function(){
        var id = $(this).data('id')
        var val = $(this).text()
        var click_element = $(this)
       
        //console.log(val)
        //alert(id)
        $.ajax({
            type:"GET",
            url: "{{ url('question/vote')}}"+'/'+id,
            dataType: 'json',
            success:function(data){
                if(data.success){
                    click_element.html(`<i class="fas fa-heart"></i>`+(parseInt(val)+1))
                    toastr.success(data.message);
                }else{
                    toastr.warning(data.message);
                }
                
            }
        })
    });

    //like description
    $('.like').on('click', function(){
        var id = $(this).data('id')
        var val = $(this).text()
        //console.log(id)
        var click_element = $(this)
        $.ajax({
            type:"GET",
            url: "{{ url('description/vote')}}"+'/'+id,
            dataType: 'json',
            success:function(data){

                if(data.success){
                    click_element.html(`<i class="fas fa-thumbs-up"></i>`+(parseInt(val)+1))
                    toastr.success(data.message)
                }else{
                    toastr.error(data.message)
                }
            }
        })
    });


    //view count
    $('.view').on('click', function(){
        var id = $(this).data('id')
        //alert(id)
        $.ajax({
            type:"GET",
            url: "{{ url('question/view-count')}}"+'/'+id,
            dataType: 'json',
            success:function(data){
                
            }
        })
    });

   

    //reading mode
    $(document).ready(function(){
        $('#readingMode').on('click', function(e){
            e.preventDefault();
            $('.test').addClass('d-none')
            $('.reading').removeClass('d-none')
            $(this).addClass('d-none')
            $('#testMode').removeClass('d-none')
    
        })
        $('#testMode').on('click', function(e){
            e.preventDefault();
            $('.test').removeClass('d-none')
            $('.reading').addClass('d-none')
            $('#readingMode').removeClass('d-none')
            $(this).addClass('d-none')
            
        })
    })

    //add bookmark
    $('.bookmark').on('click', function() {
        var id = $(this).data(id)
        var catid = $(this).data(catid)
        // console.log(id.id)
        // console.log(catid.catid)
        $(this).children().addClass('svg-icon-primary');
        $('input[name="question_id"]').val(id.id)
        $('input[name="catid"]').val(catid.catid)
        $('.with-errors').text('')
        $('#kk_modal_new_bookmark_form')[0].reset();
        $('#kk_modal_new_bookmark').modal('show')
    });

    //new bookmark save
    $('#kk_modal_new_bookmark_form').on('submit',function(e){
        e.preventDefault()
        $('.with-errors').text('')
        $('.indicator-label').hide()
        $('.indicator-progress').show()
        $('#kk_modal_new_service_submit').attr('disabled','true')

        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url: "{{ url('question/bookmark')}}",
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
                    $('#kk_modal_new_bookmark_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_new_bookmark_form')[0].reset();
                    $("#kk_modal_new_bookmark").modal('hide');

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

     //bookmarks -old procedure
    // $('.bookmark').on('click', function(){
    //     var id = $(this).data('id')
    //     var catid = $(this).data('catid')
        
    //     $(this).children().addClass('svg-icon-primary');
    //     //alert(id)
    //     $.ajax({
    //         type:"GET",
    //         url: "{{ url('question/bookmark')}}"+'/'+id+'/'+catid,
    //         dataType: 'json',
    //         success:function(data){
    //             if(data.success){
    //                 Swal.fire({
    //                 text: data.message,
    //                 icon: "success",
                    
    //             })
    //             }else{
    //                 Swal.fire({
    //                 text: data.message,
    //                 icon: "error",
                    
    //                 })
    //             }
                
                
    //         }
    //     })
    // });

    //swiper for subject
    const swiper = new Swiper('.swiper', {
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
            breakpoints: {
            // when window width is >= 320px
            320: {

            slidesPerView: 2,

            spaceBetween: 20

            },

            // when window width is >= 480px

            480: {

            slidesPerView: 3,

            spaceBetween: 30

            },

            // when window width is >= 640px

            640: {

            slidesPerView: 4,

            spaceBetween: 40

            }

            

        }

    });

</script>

{{-- for ckeditor  --}}
{{-- <script type="text/javascript">
    ClassicEditor
    .create(document.querySelector('#kt_docs_ckeditor_classic'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
</script> --}}