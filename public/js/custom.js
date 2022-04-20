//Dependable Category Section

jQuery(function () {
    // Get Category 
    $('#main_category').on('change', function () {
        var mainCategoryID = $(this).val();
        if (mainCategoryID) {
            $.ajax({
                url: '/admin/get-category/' + mainCategoryID,
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('#category').empty();
                        $('#category').append('<option value="">Choose...</option>');
                        $.each(data, function (key, category) {
                            $('select[name="category"]').append(
                                '<option value="' + category
                                .id + '">' + category
                                .name + '</option>');
                        });
                    } else {
                        $('#category').empty();
                    }
                }
            });
        } else {
            $('#category').empty();
        }
    });

    // Get Sub Category
    $('#category').on('change', function () {
        var categoryID = $(this).val();
        if (categoryID) {
            $.ajax({
                url: '/admin/get-sub-category/' + categoryID,
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('#sub_category').empty();
                        $('#sub_category').append('<option value="">Choose...</option>');
                        $.each(data, function (key, sub_category) {
                            $('select[name="sub_category"]').append(
                                '<option value="' + sub_category.id + '">' + sub_category.name + '</option>');
                        });
                    }
                        else {
                        $('#sub_category').empty(); 
                    }
                }
            });
        } else {
            $('#sub_category').empty();
        }
    });

    // Get Subject
    $('#sub_category').on('change', function () {
        var subCategoryID = $(this).val();
        if (subCategoryID) {
            $.ajax({
                url: '/admin/get-subject/' + subCategoryID,
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('#subject').empty();
                        $('#subject').append('<option value="">Choose...</option>');
                        $.each(data, function (key, subject) {
                            if(subject.sub_category){
                                $('select[name="subject"]').append(
                                '<option value="' + subject.id + '">' + subject.name   + ' - ' + subject.sub_category.name +'</option>');
                            }else{
                                $('select[name="subject"]').append(
                                '<option value="' + subject.id + '">' + subject.name   + ' - '+ subject.main_category.name + '</option>');
                            }
                            
                        });
                    }
                        else {
                        $('#subject').empty(); 
                    }
                }
            });
        } else {
            $('#subject').empty();
        }
    });

    // Get parent
    $('#sub_category').on('change', function () {
        var subCategoryID = $(this).val();
        if (subCategoryID) {
            $.ajax({
                url: '/admin/get-subject/' + subCategoryID,
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $('#parent').empty();
                        $('#parent').append('<option value="">Choose...</option>');
                        $('#parent').append('<option value="none">No parent</option>');
                        $.each(data, function (key, parent_subject) {
                            if(parent_subject.sub_category){
                                $('select[name="parent"]').append(
                                '<option value="' + parent_subject.id + '">' + parent_subject.name   + ' - ' + parent_subject.sub_category.name +'</option>');
                            }else{
                                $('select[name="parent"]').append(
                                '<option value="' + parent_subject.id + '">' + parent_subject.name   + ' - '+ parent_subject.main_category.name + '</option>');
                            }
                        });
                    }
                        else {
                        $('#parent_subject').empty(); 
                    }
                }
            });
        } else {
            $('#parent_subject').empty();
        }
    });

    // Get Question
        $('#subject').on('change', function () {
            var subjectID = $(this).val();
            if (subjectID) {
                $.ajax({
                    url: '/admin/get-question/' + subjectID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            // $('#question').empty();
                            // $('#question').append('<option hidden>Choose...</option>');
                            // $.each(data, function (key, question) {
                            //     $('select[name="question"]').append(
                            //         '<option value="' + question.id + '">' + question.question + '</option>');
                            // });
                            $('#question').html(data.html)
                        }
                         else {
                            $('#question').html(data.html) 
                        }
                    }
                });
            } else {
                $('#question').empty();
            }
        });

});


//datatable page-script

//  $(function () {
//     $("#example1").DataTable();
//     $('#example2').DataTable({
//       "paging": true,
//       "lengthChange": true,
//       "searching": true,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false,
//     });
//  });
  
//select2 input
jQuery(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
