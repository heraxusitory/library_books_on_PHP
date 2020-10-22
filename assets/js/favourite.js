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
})


