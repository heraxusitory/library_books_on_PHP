const helpers = {
	setLoader: function(containerToAppend) {
		containerToAppend.html(`
			<div class="loader">
				<img class="img-loader" src="/assets/ajax-loader.gif">
			</div>`
		)
	},
	getPage: function(data) {
		$.ajax({
			method: "GET",
			url: "/app/handlers/showPage.php",
			data: data,
			dataType: 'json',
			beforeSend: function() {
				let content = $('#content');
				helpers.setLoader(content);
			},
			success: function(data) {
				let content = $('#content');
				content.html(data.html);
				content.find('.form_favourite_add').submit(addToFavouriteBook);
				content.find('.form_favourite_remove').submit(removeToFavouriteBook);
				content.find('#form_auth').submit(authRequest);
				content.find('.target').on('click', reloadPage);
				content.find('.back').on('click', backReloadPage);
				// console.log('Аякс запрос завершился')
			},
			error: function(error) {
				console.log(error);
			}

		})
	},
}
