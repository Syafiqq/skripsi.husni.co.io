(function ($)
{
    /*
     Fullscreen background
     */
    //$.backstretch("../assets/frontend/test/authentication/assets/img/backgrounds/1.jpg");
    $.backstretch(window.location.protocol + "//" + window.location.host + "/assets/frontend/auth/register/img/backgrounds/register.jpg");

    $(function ()
    {
        /*
         Login form validation
         */
        $('.registration-form input[type="text"], input[type="password"], .registration-form textarea').on('focus', function ()
        {
            $(this).removeClass('input-error');
        });

        $("form#register").on('submit', function (event)
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