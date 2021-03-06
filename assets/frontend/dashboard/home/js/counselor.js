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

        $('input.generate-rating').rating({
            displayOnly: true,
            size: 'xxs',
            stars: 10,
            showCaption: false,
            showClear: false,
            max: 10,
            animate: false
        });
    });
    /*
     * Run right away
     * */
})(jQuery);