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
		console.log(formData)
		let req = $.ajax({
			url: "includes/guest_comment.php",
			method: 'POST',
			data: formData
		}).done(function() {
			let name = $("#guest_name").val(),
				email = $("#guest_email").val(),
				text = $("#comment_text").val()
			$(".article_comments").prepend("<div class=\"comment\"><a class=\"avatar\"><img src=\"img/elliot.jpg\"></a><div class=\"content\"><a class=\"author\">"+name+"</a><div class=\"metadata\"><span class=\"date\"></span></div><div class=\"text\">"+text+"</div><div class=\"actions\"><a class=\"reply\">Reply</a></div></div></div>")
			$("#guest_name").val("") 
			$("#guest_email").val("") 
			$("#comment_text").val("")
		})
	})

}