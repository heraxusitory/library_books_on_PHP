$(document).ready(function() {

	// Получаем форму и записываем ее в переменную
	let formAddToFavourite = $('.form_favourite_add');
	let formRemoveToFavourite = $('.form_favourite_remove');

	// Вешаем на форму обработчик события
	formAddToFavourite.submit(function(evt) {
		evt.preventDefault();
		// получаю текущую форму и записываю ее в переменную
		let form = $(this);
		/*
		Ключевое слово this тут используется как указатель на DOM - элемент,
		 с которым производилось какое то действие, тк мы находимся в обработчике событий - 
		 отправка формы, this тут выступает как сама форма
		*/
		$.ajax({
			// 1) метод запроса (GET/POST)
			method: form.attr('method'),
			// 2) URL - адрес обработчика, куда отправляем запрос
			url: form.attr('action'),
			// 3) Данные, которые отправляем вместе с запросом
			// .serialize() применим только к форме (JQUERY),
			// он собирает все инпуты с формы и объединяет их в объект
			data: form.serialize(),
			dataType: 'json',
			// 4) Коллбэк-функция в случае успешной отправки запроса
			success: function(data) {
				
			},
			// 5) Коллбэк-функция в случае если произошли ошибки при 
			// попытке отправить запрос (неверный урл, неправильно собран запрос итд)
			error: function (error) {
	
			}
		});
		// Чтобы странница не обновлялась - 
		// прерываем базовый процесс отправки формы (тк вручную отправили уже AJAX'ом)
		return false;
	});
  		// .done(function() {
  		// });
/** 
	$('.form_favourite').on('submit', function(evt) {
		evt.preventDefault();
		// По хорошему у формы убрать id фтрибут, тк id может быть только у одного элемента и jquery находит только первый попавшийся
		//var bookId = $('input.book_id').val(); // так делать неправильно, ибо вернет все инпуты с таким классом, которые сможет найти
		// Еще один момент, book_id был name а не класс, поэтому через .book_id его не найдешь, через . можно обращаться только к классам,
		//  через # к id - атрибуту. Аналогия как в CSS
		var bookId = $(this).find('input[name="book_id"]').val(); // ищем инпут у текущей формы, берем его значение
		
		console.log(bookId);
		// Создаем форму для получения данных
		var form = $(this); // тк событие работает на отправку формы, в данном случае this и есть вся форма, а обернута в $() потому что нам нужно привести ее к объекту jQuery

		$.ajax({
			method: "POST",
			url: "/app/handlers/handler.php",
			// data: { name: bookId }
			data: form.serialize(),
			dataType: 'json',
			success: function(data) {
				alert('Успешно!');
			},
			error: function (error) {
				console.log(error);
			}
		});
		  
		return false; // Чтобы стр не перезагрузилась прервем базовый процесс отправки формы
	})
	*/


});

