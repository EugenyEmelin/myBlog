window.onload = function() {
	let topics = document.querySelectorAll(".topic_item"),
		result = document.querySelector(".articles_wrap")
		console.log(topics)
	topics.forEach(function(topic) {
		topic.addEventListener("click", function(e) {
			e.preventDefault()
			let request = $.ajax({
				method: "GET",
				url: "includes/articles.php"
			}).done(function() {
				result.innerHTML = request.responseText
			})
		})
	})
}