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
	// 			url: "includes/test.php",
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
	// 		url: "includes/articles.php",
	// 	}).done(function() {
	// 		result.innerHTML = request.responseText
	// 	})
	// })

	//Отправка комментариев
		$(".comment_guest_submit").on("click", function() {
			let formData = $("#comment_guest_form").serialize()
			let req = $.ajax({
				url: "includes/guest_comment.php",
				method: 'POST',
				data: formData
			}).done(function() {
				let name = $("#guest_name").val()+" (Гость)",
					email = $("#guest_email").val(),
					text = $("#comment_text").val(),
					img = "elliot.jpg",
					date = 'Только что'
				$(".article_comments").prepend("<div class=\"comment\"><a class=\"avatar\"><img src=\"img/"+img+"\"></a><div class=\"content\"><a class=\"author\">"+name+"</a><div class=\"metadata\"><span class=\"date\">"+date+"</span></div><div class=\"text\">"+text+"</div><div class=\"actions\"><a class=\"reply\">Reply</a></div></div></div>")
				$("#guest_name").val("") 
				$("#guest_email").val("") 
				$("#comment_text").val("")
			})
		})

		$(".comment_user_submit").on("click", function() {
			let formData = $("#comment_user_form").serialize()
			let req = $.ajax({
				url: "includes/user_comment.php",
				method: 'POST',
				data: formData
			}).done(function() {
				let text = $("#comment_text").val()

			})
		})


}