'use strict';

window.addEventListener('load', function () {
  const preloader = document.querySelector('.preload-wrapper');
  preloader.style.display = 'none';
});



document.addEventListener("DOMContentLoaded", () => {

  Fancybox.bind('[data-fancybox]', {
		on: {
			destroy: function (fancybox, event) {
				document.body.style.overflow = '';
			},
		},
		});
	
		const elementsMask = document.querySelectorAll('.mask');
		const maskOptions = {
			mask: '+{7}(000)000-00-00',

		};
	
	elementsMask.forEach(item => {
		const mask = IMask(item, maskOptions);
	});
			

	//Swiper start

	const promoSwiper = new Swiper(".promo__slider", {
		grabCursor: true,
		speed: 600,
		pagination: {
			el: ".promo__slider .swiper-pagination",
			type: 'custom',
			renderCustom: function (swiper, current, total) {
				return `
			<span class="current"> 0${current}</span>
			<span class="total">0${total}</span>`;
			}
		},
		navigation: {
			nextEl: ".promo .swiper-button-next",
			prevEl: ".promo .swiper-button-prev",
		},
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
	});

	const projectsSwiper = new Swiper(".projects__slider", {
		slidesPerView: 2.5,
		spaceBetween: 40,
		navigation: {
			nextEl: ".projects__slider .swiper-button-next",
			prevEl: ".projects__slider .swiper-button-prev",
		},
		breakpoints: {
			320: {
				slidesPerView: 1.24,
				spaceBetween: 25,
			},
			575: {
				slidesPerView: 1.5,
			},
			767: {
				slidesPerView: 2.5,
			},
					
		},
	});

	const blogSwiper = new Swiper(".blog__slider", {
		slidesPerView: 4,
		spaceBetween: 40,
		navigation: {
			nextEl: ".blog__next",
			prevEl: ".blog__prev",
		},
		breakpoints: {
			320: {
				slidesPerView: 1.25,
				spaceBetween: 20,
			},
			575: {
				slidesPerView: 2,
			},
			768: {
				slidesPerView: 3,
				spaceBetween: 30,
			},
			992: {
				slidesPerView: 4,
			},
					
		},
	});

	const historySwiper = document.querySelectorAll('.history__slider');

	historySwiper.forEach(item => {
		const historySwiperItem = new Swiper(item, {
			slidesPerView: 1.3,
			spaceBetween: 40,
			grabCursor: true,
			scrollbar: {
				el: '.history__scrollbar',
				draggable: true,
				//dragSize: dragSize
			},
			breakpoints: {
				320: {
					slidesPerView: 1,
				},
				575: {
					slidesPerView: 1,
				},
				767: {
					slidesPerView: 1.2,
				},
				1440: {
					slidesPerView: 1.3,
				},
						
			},
		});
	});

	const objectsSwiper = document.querySelectorAll('.objects__slider');
	objectsSwiper.forEach(item => {
		const parent = item.closest('.objects__item');
		const objectSwiper = new Swiper(item, {
			slidesPerView: 1,
			grabCursor: true,
			pagination: {
				el: item.querySelector('.objects__pagination'),
				type: 'bullets',
			},
			navigation: {
				nextEl: parent.querySelector('.objects__nav-next'),
				prevEl: parent.querySelector('.objects__nav-prev'),
			},
		});
	});

	const topSwiper = new Swiper(".top__slider", {
		slidesPerView: 1,
		speed: 600,
		navigation: {
			nextEl: ".top__nav-next",
			prevEl: ".top__nav-prev",
		}
	
	});


	const productSliderThumbs = new Swiper('.thumbs-slider', {
		spaceBetween: 20,
		freeMode: true,
		slidesPerView: 3,
		watchSlidesProgress: true,
		navigation: {
			nextEl: '.thumbs__slide-next',
			prevEl: '.thumbs__slide-prev',
		},
	});

	let productSliderTop;

	console.log(productSliderThumbs.slides.length);
	if (productSliderThumbs.slides.length != 0) {
	productSliderTop = new Swiper('.main-slider', {
		slidesPerView: 1,
		spaceBetween: 50,
		//effect: 'fade',
		//fadeEffect: {
		//	crossFade: true
		//},
		loop: false,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		thumbs: {
			swiper: productSliderThumbs,
		}
	});
	} else {
		productSliderTop = new Swiper('.main-slider', {
			slidesPerView: 1,
			spaceBetween: 50,
			loop: false,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
}

	const teamSwiper = new Swiper(".team__slider", {
		slidesPerView: 4,
		loop: true,
		spaceBetween: 40,
		navigation: {
			nextEl: ".team__next",
			prevEl: ".team__prev",
		},
		breakpoints: {
			320: {
				slidesPerView: 1.3,
				spaceBetween: 20,
			},
			575: {
				slidesPerView: 2,
			},
			768: {
				slidesPerView: 3,
				spaceBetween: 30,
			},
			992: {
				slidesPerView: 4,
			},
					
		},
	});

	//Swiper end

	const footer = document.querySelector('.footer'),
		copy = document.querySelector('.footer__copyright'),
		headerSearch = document.querySelector('.header__search'),
		headerMenu = document.querySelector('#header_menu'),
		menuBurger = document.querySelector('.js-toggle-menu'),
		policy = document.querySelector('.policy'),
		footerDownload = document.querySelector('.footer__links'),
		tabLinksHistory = document.querySelectorAll('.history__nav-link'),
		tabContetnHistory = document.querySelectorAll('.history__content-item');



	// выравнивание в верстке пагинации - слайдер на главной
	if (document.querySelector('.promo')) {
		setPaginationPositionPromoSlide();
		window.addEventListener("resize", setPaginationPositionPromoSlide);
	}

	// изменение положения блоков для мобильной верстки
	if (document.documentElement.clientWidth < 1200) {
		footer.querySelector('.container').append(copy);

	}

	if (document.documentElement.clientWidth < 992) {
		headerMenu.prepend(headerSearch);
	}

	if (document.documentElement.clientWidth < 992) {
		footerDownload.before(policy);
		if (document.querySelector('.aside__box')) {
			document.querySelector('.page__title').after(document.querySelector('.aside__box'));
		}
	
	}

	// табы в Истории компании
	tabLinksHistory.forEach(link => {
		link.addEventListener('click', function (event) {
			switchTab(event, tabLinksHistory, tabContetnHistory);
		});
	});

	// табы в карточке товара
	if (document.querySelector('.product-tabs__link')) {
		const tabLinksProduct = document.querySelectorAll('.product-tabs__link');
		const tabContetnProduct = document.querySelectorAll('.product-tabs__item');

		document.querySelector('.product-tabs__link').classList.add('active');
		document.querySelector('.product-tabs__item').classList.add('active');
		
		tabLinksProduct.forEach(link => {
			link.addEventListener('click', function (event) {
				switchTab(event, tabLinksProduct, tabContetnProduct);
			});
		});

		const btnOpenProps = document.querySelector('.product-props__btn');
		btnOpenProps.addEventListener('click', function (event) {
			switchTab(event, tabLinksProduct, tabContetnProduct);
		});
	}
	
	




	


	// прокрутка страницы вверх
	const btnTop = document.getElementById('js-top');

	window.addEventListener('scroll', scrollTop);
	btnTop.addEventListener('click', function () {
		window.scrollTo({ top: 0, behavior: 'smooth' });
	});


	if (document.querySelector('.aside__box')) {
		// Инициализируем прокрутку по ссылкам из Содержания
		initializeScrollLinks();
	}


	toggleMenuMobil();
	if (document.getElementById('tabs-container')) {
		scrollTabsNav();
	}

	if (document.querySelector('.filter')) {
		filterToggle();
	}

	if (document.querySelector('.products') || document.querySelector('.product-card')) {
		actionToggleActive();
	}

	if (document.documentElement.clientWidth < 768 && document.querySelector('.catalog__filter')) {
		const filterTitle = document.querySelector('.filter__title');
		const filterWrap = document.querySelector('.catalog__filter');

		filterTitle.addEventListener('click', () => {
			if (filterWrap.classList.contains('active')) {
				filterWrap.classList.remove('active');
			} else {
				filterWrap.classList.add('active');
			}
		})
	}
	if (document.documentElement.clientWidth < 768 && document.querySelector('.product-card__info')) {
		document.querySelector('.product-card__top').prepend(document.querySelector('.product-card__info .page__title'));
	}

	if (document.documentElement.clientWidth < 768) {
		document.querySelectorAll('.header__nav-item.nav-item.parent > .nav-link').forEach(link => {
			link.addEventListener('touchstart', (e) => {
				e.preventDefault();
				if (link.classList.contains('active')) {
					link.classList.remove('active');
				} else {
					link.classList.add('active');
				}
			
			})
		})
	}

	// functions

	// выравнивание в верстке пагинации - слайдер на главной
	function setPaginationPositionPromoSlide() {
		const promo = document.querySelector('.promo'),
			promoImageCoords = promo.querySelector('.promo__img').getBoundingClientRect(),
			promoPagination = promo.querySelector('.swiper-pagination'),
			promoNav = promo.querySelector('.promo__slider-nav');
		if (document.documentElement.clientWidth > 767) {
			promoPagination.style.left = promoImageCoords.left + 40 + "px";
			promoNav.style.left = promoImageCoords.left + promoImageCoords.width - 158 + "px";
		}
	}

	// мобильное меню
	function toggleMenuMobil() {
		menuBurger.addEventListener('click', (e) => {
			if (headerMenu.classList.contains('open')) {
				headerMenu.classList.remove('open');
				menuBurger.classList.remove('close');
				document.body.classList.remove('overlay');
			} else {
				headerMenu.classList.add('open');
				menuBurger.classList.add('close');
				document.body.classList.add('overlay');
			}
		});
	}




	// табы 
	function switchTab(event, links, content) {
		event.preventDefault();

		links.forEach(link => link.classList.remove('active'));
		content.forEach(content => content.classList.remove('active'));

		const targetId = event.target.getAttribute('href').substring(1);
		event.target.classList.add('active');

		if (event.target.classList.contains('product-props__btn')) {
			links.forEach(link => {
				if (link.getAttribute('href') == `#${targetId}`) {
					link.classList.add('active');
				};
			});
			document.querySelector('.product-card__tabs').scrollIntoView({ behavior: "smooth"});
		}


		document.getElementById(targetId).classList.add('active');
	}

	// прокрутка навигации табов в Истории компании
	function scrollTabsNav() {
		const tabsContainer = document.getElementById('tabs-container');
		const navPrev = document.getElementById('nav-prev');
		const navNext = document.getElementById('nav-next');
		const scrollAmount = 90;

		navPrev.addEventListener('click', function (event) {
			event.preventDefault();
			tabsContainer.scrollLeft -= scrollAmount;
		});

		navNext.addEventListener('click', function (event) {
			event.preventDefault();
			tabsContainer.scrollLeft += scrollAmount;
		});
	}

	//кнопка прокрутки страницы наверх
	function scrollTop() {
		const footerRect = footer.getBoundingClientRect();
		const btnTopRect = btnTop.getBoundingClientRect();

		if (window.scrollY > 300) {
			btnTop.style.display = 'block';
		} else {
			btnTop.style.display = 'none';
		}
		// не позволяем опусткаться кнопке ниже футера
		if (footerRect.top < window.innerHeight) {
			btnTop.style.bottom = `${window.innerHeight - footerRect.top + 20}px`;
			// 20px – это отступ от футера
		} else {
			btnTop.style.bottom = '80px';
		}
	
	}

	// якорение по содержанию новости
	function initializeScrollLinks() {
		// Создаем объект для хранения соответствия между ссылками и заголовками
		const linkToHeadingMap = new Map();

		// Находим все ссылки в боковом меню
		const asideBlogLinks = document.querySelectorAll('.aside__list a');
		// Находим все заголовки h2 и h3 в статье
		const allHeadings = document.querySelectorAll('.news-detail__content h2, .news-detail__content h3');

		// Заполняем карту соответствия
		asideBlogLinks.forEach(link => {
			const titleType = link.dataset.title;
			const headingIndex = Array.from(allHeadings).findIndex(heading => heading.tagName.toLowerCase() === titleType);
			if (headingIndex !== -1) {
				linkToHeadingMap.set(link, allHeadings[headingIndex]);
			}
		});

		// Добавляем обработчики кликов на ссылки
		asideBlogLinks.forEach(link => {
			link.addEventListener('click', (e) => {
				e.preventDefault();
				const targetHeading = linkToHeadingMap.get(link);
				if (targetHeading) {
					targetHeading.scrollIntoView({ behavior: 'smooth' });
				}
			});
		});
	}


	function filterToggle() {
		const filterItems = document.querySelectorAll('.filter-item__top');
	
		filterItems.forEach(item => {
			item.addEventListener('click', () => {
				if (item.classList.contains('filter-item__active')) {
					item.classList.remove('filter-item__active');
				} else {
					item.classList.add('filter-item__active');
				}
			})
		})
	}

	function actionToggleActive() {
		const productCompare = document.querySelectorAll('.js-compare'),
			productFavorite = document.querySelectorAll('.js-favorite');
	
		productCompare.forEach(item => {
			item.addEventListener('click', (e) => {
				e.preventDefault();
				let text = item.textContent;
				if (item.classList.contains('in-compare')) {
					item.classList.remove('in-compare');
					if (text != '') {
						item.textContent = 'Сравнить';
					}
				} else {
					item.classList.add('in-compare');
					if (text != '') {
						item.textContent = 'В сравнении';
					}
				}
			})
		})



		
	}


	//избранное
	document.querySelector('.favorite .modal__close').addEventListener('click', () => {
		closeFavorite();
	});
	document.querySelector('.favorite').addEventListener('click', (e) => {

		if (e.target.classList.contains("favorite")) {
			closeFavorite();
		}
	});

	document.querySelector('.header__favorite').addEventListener('click', () => {
		document.querySelector('.favorite').classList.add('show');
	})

	function closeFavorite() {
		document.querySelector('.favorite').classList.remove('show');
	}


	// Функция для получения куки
	function getCookie(name) {
		let matches = document.cookie.match(new RegExp(
				"(?:^|; )" + name.replace(/([.$?*|{}()[]\/+^])/g, '\\$1') + "=([^;]*)"
		));
		return matches ? decodeURIComponent(matches[1]) : undefined;
	}

	// Функция для установки куки
	function setCookie(name, value, options = {}) {
		options = {
				path: '/',
				...options
		};

		if (options.expires instanceof Date) {
				options.expires = options.expires.toUTCString();
		}

		let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

		for (let optionKey in options) {
				updatedCookie += "; " + optionKey;
				let optionValue = options[optionKey];
				if (optionValue !== true) {
						updatedCookie += "=" + optionValue;
				}
		}

		document.cookie = updatedCookie;
	}


	// Функция для обновления избранного
	function updateFavorites(productId, productImg, productName, productLink) {
		let favorites = JSON.parse(getCookie('favorites') || '[]');

		// Проверяем, если товар уже в избранном
		let index = favorites.findIndex(item => item.id === productId);
		if (index === -1) {
				// Добавляем товар в избранное
				favorites.push({
						id: productId,
						img: productImg,
						name: productName,
						link: productLink
				});
		} else {
				// Удаляем товар из избранного
				favorites.splice(index, 1);
		}

		setCookie('favorites', JSON.stringify(favorites), {expires: 365});
		renderFavoritesList();
	}

	// Функция для отображения избранного
	function renderFavoritesList() {
		let favorites = JSON.parse(getCookie('favorites') || '[]');
		let favoritesListContainer = document.querySelector('.favorites-list');
		
		// Очищаем контейнер
		favoritesListContainer.innerHTML = '';

		if (favorites.length > 0) {
			favoritesListContainer.innerHTML += '<button id="clear-favorites" class="btn btn-primary btn-clear">Очистить избранное</button>';
				favorites.forEach(item => {
						favoritesListContainer.innerHTML += `
								<div class="favorite-item" id="item-${item.id}">
									<div href="${item.link}" class="favorite-link">
										<button class="del-favorite" data-id="${item.id}"></button>
										<img src="${item.img}" alt="${item.name}">
									</div>
										<a href="${item.link}" class="favorite-name">${item.name}</a>
										<button class="btn btn-buy" data-bs-toggle="modal" data-bs-target="#order" data-name="${item.name}" data-link="https://meka.akticom-dev.ru${item.link}">Узнать о поступлении</button>
								</div>
						`;
				});
			  // Добавляем обработчик для кнопки удаления
        document.querySelectorAll('.del-favorite').forEach(button => {
					button.addEventListener('click', function () {
							let productId = this.getAttribute('data-id');
							removeFromFavorites(productId);
					});
				});
				document.querySelectorAll('.favorite-item .btn-buy').forEach(button => {
					button.addEventListener('click', function () {
							handleButtonClick(this);
					});
			});
				

				// Добавляем обработчик для кнопки очистки
				document.querySelector('#clear-favorites').addEventListener('click', function () {
						deleteCookie('favorites');
						renderFavoritesList(); // Перерисовываем список после очистки
				});


		} else {
				favoritesListContainer.innerHTML = '<p>Ваш список избранного пуст.</p>';
		}


	}
	function handleButtonClick(button) {
    let productName = button.getAttribute('data-name');
    let productLink = button.getAttribute('data-link');
    
    document.querySelector('.SIMPLE_QUESTION_183').value = productName;
    document.querySelector('.SIMPLE_QUESTION_406').value = productLink;
	}
	

['.favorite-item .btn-buy', '.btn-compare', '.btn-request'].forEach(selector => {
    document.querySelectorAll(selector).forEach(button => {
        button.addEventListener('click', function () {
            handleButtonClick(this);
        });
    });
});


	// Функция для удаления товара по id
	function removeFromFavorites(productId) {
		let favorites = JSON.parse(getCookie('favorites') || '[]');

		// Находим товар в избранном
		let index = favorites.findIndex(item => item.id === productId);
		if (index !== -1) {
				// Удаляем товар
				favorites.splice(index, 1);
				setCookie('favorites', JSON.stringify(favorites), {expires: 365});
				renderFavoritesList(); // Перерисовываем список после удаления
		}
	}
	function deleteCookie(name) {
    setCookie(name, "", {
        'max-age': -1
    });
	}
	

	// Инициализация работы с избранным при загрузке страницы
		// Рендерим избранное при загрузке
		renderFavoritesList();

	
	
	
		// Обработчик клика по кнопке избранного
	document.querySelectorAll('.js-favorite input').forEach((item) => {
		item.addEventListener('change', function () {
			let productId = this.getAttribute('data-id');
			let productImg = this.getAttribute('data-img');
			let productName = this.getAttribute('data-name');
			let productLink = this.getAttribute('data-link');
			
			if (this.checked) {
				item.parentElement.classList.add('in-favorite');
				updateFavorites(productId, productImg, productName, productLink);
			} else {
				item.parentElement.classList.remove('in-favorite');
				updateFavorites(productId, productImg, productName, productLink);
			}
			
		});
		
		});




});
//const projectsFirstColCoords = document.querySelector('.projects__col').getBoundingClientRect(),
//	projectsSlider = document.querySelector('.projects__slider'),
//	projectsFirstCol = document.querySelector('.projects__col');

//projectsSlider.style.marginLeft = projectsFirstColCoords.left + projectsFirstColCoords.width + 40 + "px";

//projectsSlider.style.width = `calc(100vw - (${projectsFirstColCoords.left} + ${projectsFirstColCoords.width} + 40px`;