window.onload = function() {
    $("#comment_user_form").form({
        on: 'blur',
        fields: {
            comment_text: {
                identifier: 'comment_text',
                rules: [{
                    type: 'empty',
                    prompt: 'Введите значение'
                }]
            }
        }
    })

    var validationRules = {
        guest_name: {
            identifier: 'guest_name',
            rules: [{
                    type: 'empty',
                    prompt: 'Введите Ваше имя'
                },
                {
                    type: 'minLength[2]',
                    prompt: 'Имя должно состоять минимум из 2 букв'
                }
            ]
        }
    }
    $("#comment_guest_form").form({
        inline: true,
        on: 'blur',
        fields: validationRules
    })

}