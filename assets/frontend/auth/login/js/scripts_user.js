(function ($)
{
    /*
     Fullscreen background
     */
    //$.backstretch("../assets/frontend/test/authentication/assets/img/backgrounds/1.jpg");
    $.backstretch(window.location.protocol + "//" + window.location.host + "/assets/frontend/auth/login/img/backgrounds/user.jpeg");

    $(function ()
    {
        /*
         Login form validation
         */
        $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function ()
        {
            $(this).removeClass('input-error');
        });

        $("form#login_form").on('submit', function (event)
        {
            var form = $(this);
            var gate = true;
            event.preventDefault();
            form.find('input[type="text"], input[type="password"], textarea').each(function ()
            {
                if ($(this).val() == "")
                {
                    gate = false;
                    $(this).addClass('input-error');
                }
                else
                {
                    $(this).removeClass('input-error');
                }
            }).promise().done(function ()
            {
                if (gate)
                {
                    var data_sent = form.serializeObject();
                    data_sent['role'] = 'student';
                    $.ajax({
                        type: form.attr('method'),
                        url: form.attr('action'),
                        data: data_sent,
                        dataType: 'json',
                        contentType: 'application/x-www-form-urlencoded; charset=UTF-8; X-Requested-With: XMLHttpRequest'
                    })
                        .done(function (data)
                        {
                            if (data.hasOwnProperty('data'))
                            {
                                if (data['data'].hasOwnProperty('notify'))
                                {
                                    var notify = data['data']['notify'];
                                    for (var i = -1; ++i < notify.length;)
                                    {
                                        $.notify({message: notify[i][0]}, {type: notify[i][1]});
                                    }
                                }
                            }
                            if (data.hasOwnProperty('code'))
                            {
                                if (data['code'] == 200)
                                {
                                    setTimeout(function ()
                                    {
                                        location.href = window.location.protocol + '//' + window.location.host + '/dashboard'
                                    }, 2000);
                                }
                            }

                        })
                        .fail(function ()
                        {
                            $.notify({
                                message: 'Error', url: window.location.protocol + '//' + window.location.host
                            }, {
                                // settings
                                type: 'danger'
                            });
                        });
                }
            });
        });


    });
    /*
     * Run right away
     * */
})(jQuery);