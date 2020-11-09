function backReloadPage(evt) {
	console.log('click');
	evt.preventDefault();
	history.go(-1);
	// console.log(history.go(-1))
	let queryString = window.location.search;
	// console.log(queryString);
	loadPage();

}

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
		case 'favourites':
			data.page = 'favourites';
		break;
		case 'profile':
			data.page = 'profile';
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
	console.log(queryString)
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
		case 'favourites':
			data.page = 'favourites';
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

	helpers.getPage(data);
	
}



$(document).ready(function() {
	loadPage();

	// console.log("Загрузка страницы завершилась")
	$('.target').on('click', reloadPage);
	// $('.back').on('click', backReloadPage);
	// $('.step-back').on('click', backReloadPage);
});
