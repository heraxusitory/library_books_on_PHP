function reloadPage(evt) {
	console.log('клик');
	evt.preventDefault();
	history.pushState(null, null, $(this).attr('href'));
	// console.log(window.location.href);
	let queryString = window.location.search;
	// console.log(queryString);
	//внутри скобок queryString не нужен 
	const urlParams = new URLSearchParams(queryString);
	let data = {
		page: urlParams.get('page'),
		// page: $(this).attr('href').replace('?page=', ''),
		id: urlParams.get('id'),
	};
	switch (urlParams.get('page')) {
		case null :
			data.page = '/';
		break;
		case 'book':
			data.page = 'book';
		break;
		case 'authors':
			data.page = 'authors';
		break;
		case 'genres':
			data.page = 'genres';
		break;
		case 'genre':
			data.page = 'genre';
		break;
		case 'profile':
			data.page = 'profile';
		break;
		case 'auth':
			data.page = 'auth';
		break;
		case 'author':
			data.page = 'author';
		break;
		default:
			data.page = '404'; 
		break;
	}
	console.log(data.page);
	console.log(data.id);

	helpers.getPage(data);
}

function loadPage() {

	let queryString = window.location.search;
	//внутри скобок queryString не нужен 
	const urlParams = new URLSearchParams(queryString);
	let data = {
		//считаю что не нужно
		page: '/',
		id: urlParams.get('id'),
	};

	switch (urlParams.get('page')) {
		case null :
			data.page = '/';
		break;
		case 'book':
			data.page = 'book';
		break;
		case 'authors':
			data.page = 'authors';
		break;
		case 'genres':
			data.page = 'genres';
		break;
		case 'genre':
			data.page = 'genre';
		break;
		case 'profile':
			data.page = 'profile';
		break;
		case 'auth':
			data.page = 'auth';
		break;
		case 'author':
			data.page = 'author';
		break;
		default:
			data.page = '404'; 
		break;
	}
	console.log(data.page, data.id	)

	helpers.getPage(data);

}




$(document).ready(function() {

	loadPage();

	// console.log("Загрузка страницы завершилась")
	$('.target').on('click', reloadPage); 

});
