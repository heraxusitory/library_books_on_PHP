$(document). ready(function(){
	$('button.add-favourite').on('click', function() {
		var bookId = $('input.book_id').val();
		console.log(bookId);

		$.ajax({
 		method: "POST",
  		url: "/app/handlers/handler.php",
 		// data: { name: bookId }
 		data: form.serialize(),
		dataType: 'json',
		})

  		.done(function() {
  		});
	})
})


