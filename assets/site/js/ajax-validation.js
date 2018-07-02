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
