window.onload = function() {
    // let topics = document.querySelectorAll(".topic_item"),
    result = document.querySelector(".articles_wrap")
    // 	console.log(topics)
    // topics.forEach(function(topic) {
    // 	topic.addEventListener("click", function(e) {
    // 		e.preventDefault()
    // 		console.log(location)
    // 		topicName = this.innerHTML
    // 		let request = $.ajax({
    // 			type: "GET",
    // 			url: "test.php",
    // 			data: topicName
    // 		}).done(function() {
    // 			result.innerHTML = request.responseText
    // 		})
    // 	})
    // })

    // let articleLink = document.querySelector(".header")
    // $(".topic_item").click(function(e) {
    // 	e.preventDefault()
    // 	$(".topic_item").removeClass("active")
    // 	$(this).addClass ("active")
    // 	let request = $.ajax({
    // 		method: "GET",
    // 		url: "articles.php",
    // 	}).done(function() {
    // 		result.innerHTML = request.responseText
    // 	})
    // })

    // $.fn.api.settings.api = {
    // 	'add guest comment': 'guest_comment.php'
    // }

    // //Отправка комментариев
    // var validationRules = {
    //     guest_name: {
    //         identifier: 'guest_name',
    //         rules: [{
    //                 type: 'empty',
    //                 prompt: 'Введите Ваше имя'
    //             },
    //             {
    //                 type: 'minLength[2]',
    //                 prompt: 'Имя должно состоять минимум из 2 букв'
    //             }
    //         ]
    //     }
    // }

    // $("#comment_guest_form").form({
    //     on: 'blur',
    //     fields: validationRules
    // })

    $(".comment_guest_submit").on("click", function() {
       
        let formData = $("#comment_guest_form").serialize()
        let req = $.ajax({
            url: "guest_comment.php",
            method: 'POST',
            data: formData
        }).done(function() {
            let name = $("#guest_name").val() + " (Гость)",
                email = $("#guest_email").val(),
                text = $("#comment_text").val(),
                img = "default.png",
                date = 'Только что'
            $(".article_comments").prepend("<div class=\"comment\"><a class=\"avatar\"><img src=\"img/" + img + "\"></a><div class=\"content\"><a class=\"author\">" + name + "</a><div class=\"metadata\"><span class=\"date\">" + date + "</span></div><div class=\"text\">" + text + "</div><div class=\"actions\"><a class=\"reply\">Reply</a></div></div></div>")
            $("#guest_name").val("")
            $("#guest_email").val("")
            $("#comment_text").val("")
        })
    })
    $(".comment_user_submit").on("click", function() {
    	that = this
    	var text = $("#comment_text").val()
        // let formData = $("#comment_user_form").serialize()
        let req = $.ajax({
            url: "user_comments.php",
            method: "POST",
            data: {
            	id: that.dataset.userid,
            	text: text,
            	articleid: that.dataset.articleid
            }
        }).done(data => {
            let text = $("#comment_text").val()
        	if (text != '') {
            	$(".article_comments").prepend(data)
        	}
        	$("#comment_text").val('')
            console.log(that.dataset.articleid)
            console.log(data)
        })
    })
    //modals
    if ($('*').is($('#login_button'))) {
    	$('#login_modal').modal('attach events', '#login_button', 'show')
    }
    if ($('*').is($('#reg_button'))) {
    	$('#reg_modal').modal('attach events', '#reg_button', 'show')
    }

    $('#login').on("click", function() {
        let formData = $("#login_form").serialize()
        let req = $.ajax({
            url: "login.php",
            method: "POST",
            data: formData
        }).done(function(data) {
            $('#login_form input').val("")
            $('#login_modal').modal('hide')
            console.log(data)
        })
    })

    $(document).on('mouseup', (e) => {
    	let card = $('.mini-profile')
    	if (!card.is(e.target) && card.has(e.target).length == 0) {
    		card.hide()
    	}
    })
    $('#user-item').on('click', () => {
    	// document.querySelector('.mini-profile').classList.toggle('active')
    	$('.mini-profile').toggle()
    })
    $('#registration_form').form({
    	inline: true,
    	on: 'blur',
    	fields: {
    		user_fname: {
    			identifier: 'user_fname',
    			rules: [
    				{
    					type: 'empty',
    					prompt: 'Введите имя'
    				},
    				{
    					type: 'maxLength[18]',
    					prompt: 'Имя не должно превышать 18 символов'
    				}
    			]
    		},
    		user_lname: {
    			identifier: 'user_lname',
    			rules: [
    				{
    					type: 'empty',
    					prompt: 'Введите фамилию'
    				}
    			]
    		},
    		user_email: {
    			identifier: 'user_email',
    			rules: [
    				{
    					type: 'empty',
    					prompt: 'Введите email'
    				},
    				{
    					// type: 'regExp[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/]',
    					type: 'regExp[/^[a-z0-9_]+([\._-]?[a-z0-9_-]+)*@[a-z0-9_-]+([\._-]?[a-z0-9_]+)*(\.[a-z0-9]{2,4})+$/]',
    					prompt: 'Неверный формат email'

    				}
    			]
    		},
    		user_password: {
    			identifier: 'user_password',
    			rules: [
    				{
    					type: 'empty',
    					prompt: 'Введите пароль'
    				},
    				{
    					type: 'minLength[6]',
    					prompt: 'Минимум 6 символов'
    				}
    			]
    		},
    		re_user_password: {
    			identifier: 're_user_password',
    			rules: [
    				{
    					type: 'empty',
    					prompt: 'Повторите пароль'
    				},
    				{
    					type: 'match[user_password]',
    					prompt: 'Пароли не совпадают'
    				}
    			]
    		}

    	}
    })
    $('#registration').on("click", function() {
        let formData = $("#registration_form").serialize()
        let req = $.ajax({
            url: "registration.php",
            method: "POST",
            data: formData
        }).done(function(data) {
            $('#registration_form input').val("")
            // $('#reg_modal').modal('hide')
            console.log(data)
        })
    })   

}