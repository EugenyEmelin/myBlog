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
	$(".topic_item").click(function(e) {
		e.preventDefault()
		$(".topic_item").removeClass("active")
		$(this).addClass ("active")
		let request = $.ajax({
			method: "GET",
			url: "includes/articles.php",
		}).done(function() {
			result.innerHTML = request.responseText
		})
	})
}