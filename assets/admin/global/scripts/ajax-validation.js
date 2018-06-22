$('#warna').addClass('hidden');
$('.AddForm').on('submit' ,function (e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    if (typeof tinymce !== "undefined" && tinymce.editors.length) {
        for (var i = 0; i < tinymce.editors.length; i++) {
            formData.append('desc' + (i + 1), tinymce.editors[i].getContent());
        }
    }

    $.ajax({
        method: 'POST',
        dataType: 'json',
        data: form.serialize(),
        url: url,
        success: function (response) {
            if (response.status == 'success'){
                if(response.id == 'warna') {
                    $('#warna').html(response.data)[0].className = 'alert alert-success';
                } else {
                    $('#update-lower').html(response.data)[0].className = 'alert alert-success';
                }
            }else{
                if(response.id == 'warna') {
                    $('#warna').html(response.data)[0].className = 'alert alert-danger';
                } else {
                    $('#update-lower').html(response.data)[0].className = 'alert alert-danger';
                }
            }
        }
    });

    form.get([0]).reset();

    $('#warna').removeClass('hidden');

});

$('.addFormWithImage').on('submit' ,function (e) {
    e.preventDefault();
    var form = $(this);
    var url  = form.attr('action');

    $.ajax({
        url: url,
        type: "POST",
        data: new FormData(form[0]),
        contentType: false,
        cache: false,
        processData:false,

        success: function (response) {
            if (response.status == 'success'){
                $('#warna').html(response.data)[0].className = 'alert alert-success';
            }else{
                $('#warna').html(response.data)[0].className = 'alert alert-danger';
            }
        }
    });

    $('#warna').removeClass('hidden');
});

// $('.admin_logout').on('click', function (e) {
//     $.ajax({
//         url: 'auth/logout',
//         method: 'POST',
//         dataType:'json',
//         success: function (response) {
//             window.location.replace('/login');
//         }
//     });
// });

$('.editTypeBTN').on('click' ,function (e) {
    e.preventDefault();

    var url = $(this).data('url');
    var link = $(this).parents('tr').find('.social_link').val();
    var icon = $(this).parents('tr').find('.social_icon').val();

    $.ajax({
        url: url,
        dataType: 'json',
        method: 'POST',
        data : {link: link ,icon: icon ,_token: $(this).data('token')},
        success: function (response) {
            if (response.status == 'success') {
                swal({title: "تم بنجاح", text: response.data, type: "success"}, function () {
                    location.reload(true);
                });
            } else {
                swal('خطا', response.data, 'error');
            }
        }
    });

});

$('.editDocTypeBTN').on('click' ,function (e) {
    e.preventDefault();

    var url  = $(this).data('url');
    var link = $(this).parents('tr').find('.doctor_social_link').val();
    var icon = $(this).parents('tr').find('.doctor_social_icon').val();

    $.ajax({
        url: url,
        dataType: 'json',
        method: 'POST',
        data : {edit_link: link,edit_icon: icon ,_token: $(this).data('token')},
        success: function (response) {
            if (response.status == 'success') {
                swal({title: "تم بنجاح", text: response.data, type: "success"}, function () {
                    location.reload(true);
                });
            } else {
                swal('خطا', response.data, 'error');
            }
        }
    });

});

$('.editCatBTN').on('click' ,function (e) {
    e.preventDefault();

    var url  = $(this).data('url');
    var cat_ar = $(this).parents('tr').find('.name_ar').val();
    var cat_en = $(this).parents('tr').find('.name_en').val();

    $.ajax({
        url: url,
        dataType: 'json',
        method: 'POST',
        data : {name_en: cat_en,name_ar: cat_ar ,_token: $(this).data('token')},
        success: function (response) {
            if (response.status == 'success') {
                swal({title: "تم بنجاح", text: response.data, type: "success"}, function () {
                    location.reload(true);
                });
            } else {
                swal('خطا', response.data, 'error');
            }
        }
    });

});


$('.editCatImageBTN').on('click' ,function (e) {
    e.preventDefault();

    var url  = $(this).data('url');
    var image = $(this).parents('tr').find('.cat_image').val();
    var cat = $(this).parents('tr').find('.categoryID').val();

    $.ajax({
        url: url,
        dataType: 'json',
        method: 'POST',
        data : {image_name: image, cate_id: cat ,_token: $(this).data('token')},
        success: function (response) {
            if (response.status == 'success') {
                swal({title: "تم بنجاح", text: response.data, type: "success"}, function () {
                    location.reload(true);
                });
            } else {
                swal('خطا', response.data, 'error');
            }
        }
    });

});

$('.updateUser').on('click' ,function (e) {
    e.preventDefault();

    var url  = $(this).data('url');
    var name = $(this).parents('tr').find('.user_name').val();
    var pass = $(this).parents('tr').find('.new_password').val();

    $.ajax({
        url: url,
        dataType: 'json',
        method: 'POST',
        data : {new_name: name, new_password: pass ,_token: $(this).data('token')},
        success: function (response) {
            if (response.status == 'success') {
                swal({title: "تم بنجاح", text: response.data, type: "success"}, function () {
                    location.reload(true);
                });
            } else {
                swal('خطا', response.data, 'error');
            }
        }
    });

});

