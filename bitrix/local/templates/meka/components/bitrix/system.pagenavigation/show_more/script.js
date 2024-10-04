document.addEventListener('DOMContentLoaded', function() {

	document.addEventListener('click', function (event) {
		
		if (event.target.classList.contains('load_more')) {
			event.preventDefault();
					var targetContainer = document.querySelector('.news-list__row'); // Контейнер, в котором хранятся элементы
					var url = event.target.getAttribute('data-url'); // URL, из которого будем брать элементы

				if (url !== undefined) {


							fetch(url)
									.then(response => response.text())
									.then(data => {
											// Удаляем старую навигацию
											event.target.remove();

											var tempDiv = document.createElement('div');
											tempDiv.innerHTML = data;

											var elements = tempDiv.querySelectorAll('.news-list__col'); // Ищем элементы
											var pagination = tempDiv.querySelector('.news-item__btn');  // Ищем навигацию

											elements.forEach(element => targetContainer.appendChild(element)); // Добавляем посты в конец контейнера
											if (pagination) {
													targetContainer.appendChild(pagination); // добавляем навигацию следом
											}
	
									});
					}
			}
	});

});