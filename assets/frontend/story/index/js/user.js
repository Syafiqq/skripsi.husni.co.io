/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 04 December 2016, 8:08 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
(function ($)
{
    /*
     Fullscreen background
     */
    $(function ()
    {
        $("a#sign-out").on('click', function (event)
        {
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: $(this).attr('href'),
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
                                location.href = window.location.protocol + '//' + window.location.host
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
                })


        });
        CKEDITOR.replace('story_main');

        $('input[type="text"], input[type="password"], textarea').on('focus', function ()
        {
            $(this).removeClass('input-error');
        });

        $("form#tell_story").on('submit', function (event)
        {
            event.preventDefault();
            var form = $(this);
            var gate = true;
            form.find('input[type="text"], textarea#story_information').each(function ()
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
                    data_sent['main'] = CKEDITOR.instances.story_main.getData();
                    console.log(data_sent);
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
                                message: 'Error'
                            }, {
                                // settings
                                type: 'danger'
                            });
                        })
                }
            });
        });

        $('button#story_cancel').on('click', function ()
        {
            window.location.href = window.location.protocol + '//' + window.location.host + '/dashboard';
        })
    });

    /*
     * Run right away
     * */
})(jQuery);