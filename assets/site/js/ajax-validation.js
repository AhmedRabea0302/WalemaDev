$('#warna').addClass('hidden');

$('.register-forma').on('submit' ,function (e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        method: 'POST',
        dataType: 'json',
        data: form.serialize(),
        url: url,
        success: function (response) {
            if (response.status == 'success') {
                $('#warna').html(response.data)[0].className = 'alert alert-success';
            } else {
                $('#warna').html(response.data)[0].className = 'alert alert-danger';
            }
        }
    });

    form.get([0]).reset();

    $('#warna').removeClass('hidden');

});

$('.sub').on('submit' ,function (e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        method: 'POST',
        dataType: 'json',
        data: form.serialize(),
        url: url,
        success: function (response) {
            if (response.status == 'success') {
                $('#subscribe').html(response.data)[0].className = 'alert alert-success';
            } else {
                $('#subscribe').html(response.data)[0].className = 'alert alert-danger';
            }
        }
    });

    form.get([0]).reset();

    $('#warna').removeClass('hidden');

});

$('.formAddImage').on('submit' ,function (e) {
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
//
// $('.editTypeBTN').on('click' ,function (e) {
//     alert('ahmed');
//     e.preventDefault();
//
//     var url = $(this).data('url');
//     var link = $(this).parents('tr').find('.social_link').val();
//     var icon = $(this).parents('tr').find('.social_icon').val();
//
//     console.log(link);
//     console.log(icon);
//
//     $.ajax({
//         url: url,
//         dataType: 'json',
//         method: 'POST',
//         data : {link: link ,icon: icon ,_token: $(this).data('token')},
//         success: function (response) {
//             if (response.status == 'success') {
//                 swal({title: "تم بنجاح", text: response.data, type: "success"}, function () {
//                     location.reload(true);
//                 });
//             } else {
//                 swal('خطا', response.data, 'error');
//             }
//         }
//     });
//
// });

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
