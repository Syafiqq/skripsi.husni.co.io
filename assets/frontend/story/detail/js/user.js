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

        $('input#generate-rating').rating({
            displayOnly: false,
            size: 'xs',
            stars: 10,
            showCaption: false,
            showClear: false,
            max: 10,
            animate: true
        }).on("rating.change", function (event, value, caption)
        {
            var form = $('input#generate-rating');
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: {value: value},
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
                        message: 'Error'
                    }, {
                        type: 'danger'
                    });
                });
        });

        $('form#mark_story').on("submit", function (event)
        {
            event.preventDefault();
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
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
                        if (data.hasOwnProperty('code'))
                        {
                            if (data['code'] == 200)
                            {
                                setTimeout(function ()
                                {
                                    location.reload();
                                }, 2000);
                            }
                        }
                    }
                })
                .fail(function ()
                {
                    $.notify({
                        message: 'Error'
                    }, {
                        type: 'danger'
                    });
                });
        });

        $('form#share_story').on("submit", function (event)
        {
            event.preventDefault();
            var form = $(this);
            var data_sent = form.serializeObject();
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
                        if (data.hasOwnProperty('code'))
                        {
                            if (data['code'] == 200)
                            {
                                if (data.hasOwnProperty('redirect'))
                                {
                                    setTimeout(function ()
                                    {
                                        location.href = data['redirect'];
                                    }, 2000);
                                }
                            }
                        }
                    }
                })
                .fail(function ()
                {
                    $.notify({
                        message: 'Error'
                    }, {
                        type: 'danger'
                    });
                });
        });

        $("form#form_chat").on('click', function (event)
        {
            event.preventDefault();
            var form = $(this);
            var data_sent = form.serializeObject();
            if (data_sent['message'].length > 0)
            {
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
                                retrieveData(storyID);
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
            }
        });

        function retrieveData(storyID)
        {
            $.ajax({
                type: 'POST',
                url: window.location.protocol + '//' + window.location.host + '/chat/gets?id=' + storyID,
                dataType: 'json',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8; X-Requested-With: XMLHttpRequest'
            })
                .done(function (data)
                {
                    if (data.hasOwnProperty('chat'))
                    {
                        populateChat(data['chat']);
                    }
                })
                .fail(function ()
                {
                    console.log('ERROR');
                });
        }

        setInterval(function ()
        {
            retrieveData(storyID);
        }, 5000);
        retrieveData(storyID);
        function populateChat(data)
        {
            var container = $('div#chat_container');
            container.empty();
            for (var _i = -1, _is = data.length; ++_i < _is;)
            {
                var chat = data[_i];
                if (chat['assign']['isuser'])
                {
                    //right
                    container.append('' +
                        '<div class="direct-chat-msg right">' +
                        '<div class="direct-chat-info clearfix">' +
                        '<span class="direct-chat-name pull-right">' + (chat['assign']['role'] === 'counselor' ? '<strong>[Counselor]</strong>' : "") + '&nbsp;&nbsp;<abbr title="' + chat['assign']['email'] + '">' + chat['assign']['username'] + '</abbr></span>' +
                        '<span class="direct-chat-timestamp pull-left">' + chat['create_at'] + '</span>' +
                        '</div>' +
                        '<img class="direct-chat-img" src="' + chat['assign']['avatar'] + '" alt="Message User Image" width="96px">' +
                        '<div class="direct-chat-text">'
                        + chat['text'] +
                        '</div>' +
                        '</div>'
                    );
                }
                else
                {
                    container.append('' +
                        '<div class="direct-chat-msg left">' +
                        '<div class="direct-chat-info clearfix">' +
                        '<span class="direct-chat-name pull-left"><abbr title="' + chat['assign']['email'] + '">' + chat['assign']['username'] + '</abbr>&nbsp;&nbsp;' + (chat['assign']['role'] === 'counselor' ? '<strong>[Counselor]</strong>' : "") + '</span>' +
                        '<span class="direct-chat-timestamp pull-right">' + chat['create_at'] + '</span>' +
                        '</div>' +
                        '<img class="direct-chat-img" src="' + chat['assign']['avatar'] + '" alt="Message User Image" width="96px">' +
                        '<div class="direct-chat-text">'
                        + chat['text'] +
                        '</div>' +
                        '</div>'
                    );
                }
            }
        }
    });

    /*
     * Run right away
     * */
})(jQuery);