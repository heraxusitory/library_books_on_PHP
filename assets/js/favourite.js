$(document).ready(function() {

	// Получаем форму и записываем ее в переменную
	let formAddToFavourite = $('.form_favourite_add');
	let formRemoveFromFavourite = $('.form_favourite_remove');
	let actionInput = $("input[name='action']");
	let button = $(".add-favourite");
	// Вешаем на форму обработчик события
	formAddToFavourite.submit(function() {
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
				if (data.action == 'add') {
					if(!(form.hasClass('form_favourite_remove'))) {
						form.removeClass('form_favourite_add');
						form.addClass('form_favourite_remove');
						actionInput.val(data.removeAction);
						button.text(data.text);
						console.log('Успешно добавлено!');
					}
				}

				if (data.action == 'remove') {
					if(!(form.hasClass('form_favourite_add'))) {
						form.removeClass('form_favourite_remove');
						form.addClass('form_favourite_add');
						actionInput.val(data.removeAction);
						button.text(data.text);
						console.log('Успешно удалено!');
					}
					
				}

				// 	messageBox.text(data.message);
				// 	messageBox.show();
				// }
				
			},
			// 5) Коллбэк-функция в случае если произошли ошибки при 
			// попытке отправить запрос (неверный урл, неправильно собран запрос итд)
			error: function () { 
				console.log('error');
			}
		});
		// Чтобы странница не обновлялась - 
		// прерываем базовый процесс отправки формы (тк вручную отправили уже AJAX'ом)
		return false;
	});
});

