$('.btn-register').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('is-invalid');

    let error_text = $('.error-validation');
    error_text.addClass('d-none');

    let first_name = $('input[name="first_name"]').val(),
        last_name = $('input[name="last_name"]').val(),
        email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    $.ajax({
        url: '/registration.php',
        type: 'POST',
        dataType: 'json',
        data: {
            first_name: first_name,
            last_name: last_name,
            email: email,
            password: password,
            password_confirm: password_confirm,
        },
        success: function (data) {
            if (data.status) {
                $('#registrationForm').addClass('invisible');
                $('.notify-registration').removeClass('d-none');
                $('.h1-registration').html("Success Registration");
            } else {
                if (data.type === 1) {
                    error_text.removeClass('d-none').html(data.message);
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('is-invalid');
                    });

                }
            }
        },
        error: function () {
            alert('There was some error performing the AJAX call!');
        }
    })
});