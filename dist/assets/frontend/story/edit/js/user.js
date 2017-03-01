'use strict';

/**
 * This <emosi.ekspresif> project created by :
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
            }).done(function (data)
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
                            location.href = window.location.protocol + '//' + window.location.host;
                        }, 2000);
                    }
                }
            }).fail(function ()
            {
                $.notify({
                    message: 'Error', url: window.location.protocol + '//' + window.location.host
                }, {
                    // settings
                    type: 'danger'
                });
            });
        });

        CKEDITOR.replace('story_main');
        CKEDITOR.replace('story_main2');
        CKEDITOR.replace('story_main3');
        CKEDITOR.replace('story_main4');
        CKEDITOR.replace('story_main5');
        CKEDITOR.replace('story_main6');

        $('input#generate-rating').rating({
            displayOnly: false,
            size: 'xs',
            stars: 10,
            showCaption: false,
            showClear: false,
            max: 10,
            min: 1,
            animate: true
        }).on("rating.change", function (event, value, caption)
        {
            return;
            var form = $('input#generate-rating');
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: {value: value},
                dataType: 'json',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8; X-Requested-With: XMLHttpRequest'
            }).done(function (data)
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
            }).fail(function ()
            {
                $.notify({
                    message: 'Error'
                }, {
                    type: 'danger'
                });
            });
        });

        $("form#edit_story").on('submit', function (event)
        {
            event.preventDefault();
            var form = $(this);
            var data_sent = form.serializeObject();
            data_sent['main'] = CKEDITOR.instances.story_main.getData();
            data_sent['main2'] = CKEDITOR.instances.story_main2.getData();
            data_sent['main3'] = CKEDITOR.instances.story_main3.getData();
            data_sent['main4'] = CKEDITOR.instances.story_main4.getData();
            data_sent['main5'] = CKEDITOR.instances.story_main5.getData();
            data_sent['main6'] = CKEDITOR.instances.story_main6.getData();
            //console.log(data_sent);
            if (data_sent['main'].length < 1)
            {
                alert("Data ... masih kosong !");
            } else if (data_sent['main2'].length < 1)
            {
                alert("Data ... masih kosong !");
            } else if (data_sent['main3'].length < 1)
            {
                alert("Data ... masih kosong !");
            } else if (data_sent['main4'].length < 1)
            {
                alert("Data ... masih kosong !");
            } else if (data_sent['main5'].length < 1)
            {
                alert("Data ... masih kosong !");
            } else if (data_sent['main6'].length < 1)
            {
                alert("Data ... masih kosong !");
            } else
            {
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: data_sent,
                    dataType: 'json',
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8; X-Requested-With: XMLHttpRequest'
                }).done(function (data)
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
                                } else
                                {
                                    location.href = window.location.protocol + '//' + window.location.host + '/emosi.ekspresif/dashboard';
                                }
                            }, 2000);
                        }
                    }
                }).fail(function ()
                {
                    $.notify({
                        message: 'Error'
                    }, {
                        // settings
                        type: 'danger'
                    });
                });
            }
        });

        $('button#story_cancel').on('click', function ()
        {
            window.location.href = window.location.protocol + '//' + window.location.host + '/emosi.ekspresif/dashboard';
        });
    });

    /*
     * Run right away
     * */
})(jQuery);
//# sourceMappingURL=user.js.map