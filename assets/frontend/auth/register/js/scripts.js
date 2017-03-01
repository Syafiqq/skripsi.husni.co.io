(function ($)
{
    /*
     Fullscreen background
     */
    //$.backstretch("../assets/frontend/test/authentication/assets/img/backgrounds/1.jpg");
    $.backstretch("../assets/frontend/auth/register/img/backgrounds/register.jpg");

    $(function ()
    {
        /*
         Login form validation
         */
        $('.registration-form input[type="text"], input[type="password"], .registration-form textarea').on('focus', function ()
        {
            $(this).removeClass('input-error');
        });

        $("select#form-select_role").on('change', function ()
        {
            switch ($(this).val())
            {
                case 'student' :
                {
                    $.ajax({
                        type: 'POST',
                        url: window.location.protocol + "//" + window.location.host + '/auth/get_counselor_data',
                        dataType: 'json',
                        contentType: 'application/x-www-form-urlencoded; charset=UTF-8; X-Requested-With: XMLHttpRequest'
                    })
                        .done(function (data)
                        {
                            $('select#form-select_choosen_counselor > option').not(':eq(0)').remove();
                            $("select#form-select_choosen_counselor").append($.map(data, function (o)
                            {
                                return $('<option/>', {
                                    value: o.id,
                                    text: o.username + ' (' + o.email + ')'
                                });
                            }));
                            $('div#choosen_counselor').show('fast');
                            $('div#class_layout').show('fast');
                        })
                        .fail(function ()
                        {
                            $.notify({
                                message: 'Error : Silahkan Refresh Page Anda',
                                url: window.location.protocol + "//" + window.location.host + '/auth/register'
                            }, {
                                // settings
                                type: 'danger'
                            });
                        });
                }
                    break;
                case 'counselor' :
                {
                    $('div#choosen_counselor').hide('fast');
                    $('div#class_layout').hide('fast');
                }
                    break;
                default :
                {
                    $('div#choosen_counselor').hide('fast');
                    $('div#class_layout').hide('fast');
                }
            }
        });

        $("form#register").on('submit', function (event)
        {
            var form = $(this);
            var gate = true;
            event.preventDefault();
            form.find('input[type="text"], input[type="password"], textarea, select').each(function ()
            {
                if ($(this).val() == "")
                {
                    if (!((($(this).attr('name') === 'choosen_counselor')
                        || ($(this).attr('name') === 'kelas')) && ($('select#form-select_role').val() === 'counselor')))
                    {
                        gate = false;
                        $(this).addClass('input-error');
                    }
                }
                else
                {
                    $(this).removeClass('input-error');
                }
            }).promise().done(function ()
            {
                if (gate)
                {
                    $.ajax({
                        type: form.attr('method'),
                        url: form.attr('action'),
                        data: form.serializeObject(),
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
                                        if (data.hasOwnProperty('redirect'))
                                        {
                                            location.href = data['redirect'];
                                        }
                                    }, 2000);
                                }
                            }
                        })
                        .fail(function ()
                        {
                            $.notify({
                                message: 'Error', url: window.location.protocol + "//" + window.location.host
                            }, {
                                // settings
                                type: 'danger'
                            });
                        })
                }
            });
        });


    });
    /*
     * Run right away
     * */
})(jQuery);