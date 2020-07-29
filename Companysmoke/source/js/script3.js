const phoneSize = 480;

// Функция для исправления отображения флекс-бокса
function flexFix() {
	if ($(window).width() > phoneSize)
		var n = 3;
	else
		var n = 2;

	// Если количество элементов не кратно n, то дополняется до кратности n
	if ($('ul.categories').children().length % n) {
		// Перед запуском удаляются лишние фикс-элементы
		$('.category.hidden').remove();
		while ($('ul.categories').children().length % n)
			$('ul.categories').append('<li class="category hidden"></li>');
	}
}

// Деактивация активных элементов при наличии таковых
function hideAllActive() {
	$('.active').removeClass('active').find('.sub-menu').css('display', 'none');
}

// Переключение меню
function menuToggle(item) {
	hideAllActive();
	if ($(item).css('display') === 'flex') {
		$(item).removeAttr('style');
	} else {
		$(item).css('display', 'flex');
	}
}

// Скрытие сайдбара при просмотре Mobile на внутренних страницах
function sidebarHide() {
	if ($(window).width() <= phoneSize) {
		if ($(document).find('.header-nav-item__link_current').is('.header-nav-item__link_current')) {
			if ($('.header-nav-item__link_current').text() != "Главная") {
				$('.sidebar').css('display', 'none');
			}
		}
	}
}

// Функция валидации поля
function validate(item) {
	if ($(item).val() === "") {
		// Если пусто, то показываем сообщение об ошибке, делаем границы поля красными
		$(item).next('.error-emptyness').removeClass('invisible');
		$(item).addClass('incorrect-input-style');
		return 1;
	} else {
		// Иначе скрываем сообщение, возвращаем цвета границ
		$(item).next('.error-emptyness').addClass('invisible');
		$(item).removeClass('incorrect-input-style');
		return 0;
	}
}

// Назначение элементам событий после загрузки документа
$(function () {
	{ // Общие настройки для всего сайта
		// Переключатель основного меню
		$('.menu-toggler').on('click', function () {
			if ($(window).width() <= phoneSize) {
				menuToggle('.menu-togglable');
			}
		});

		// Переключатель под-меню
		$('.header-nav-item').on('click', function () {
			if ($(window).width() <= phoneSize) {
				if ($(this).hasClass('active')) {
					// Деактивация задействованного элемента
					hideAllActive();
				} else {
					// Деактивация других активных элементов при наличии таковых
					hideAllActive();
					// Активация задействованного элемента
					//menuToggle('.sub-menu');
					if ($(this).find('.sub-menu').is('ul')) {
						menuToggle('.sub-menu');
						$(this).addClass('active');
						return false;
					}
				}
			}
		});

		// Заливка непустых полей ввода
		$('.user-info__input').on('change', function () {
			if ($(this).val() === "")
				$(this).removeClass('user-info__input_filled-white')
			else
				$(this).addClass('user-info__input_filled-white')
		})

		// Настройка отображения при изменении размеров экрана
		$(window).resize(function () {
			if ($(window).width() > phoneSize) {
				// Закрывашка меню при смене области просмотра Mobile -> Desktop
				if ($('.menu-togglable').css('display') === 'flex') {
					menuToggle('.menu-togglable');
				}

				// Возобновление отображения сайдбара при переходе Mobile -> Desktop
				if ($('.sidebar').css('display') === 'none') {
					$('.sidebar').removeAttr('style');
				}
			}
			sidebarHide();
		});

		// Скрытие сайдбара при просмотре Mobile на внутренних страницах
		sidebarHide();
	}

	{ // Группа специфических настроек
		// Очистка полей при нажатии соответствующей кнопки
		$('form[name="contats-page__feedback-form"] .clear-inputs').on('click', function () {
			// Удаление значений всех полей, кроме кнопок и сабмитов
			// И возвращение изначального цвета границ полей
			$('form[name="contats-page__feedback-form"]').find('input[type != "submit"][type != "button"], textarea').each(function (i, item) {
				$(item).val("");
				$(item).removeClass('incorrect-input-style');
			});
			// А так же скрытие всех сообщений об ошибках
			// Мы же не хотим пугать пользователя ещё до ввода информации
			$('.error-emptyness').addClass('invisible');
		});

		// Действие кнопки уменьшения количества товара параллельно с валидацией
		$('.amount-tumbler__button_left').on('click', function () {
			var a = $(this).siblings('.products-amount__input')
			if (!(a.val() >= 1) || a.val() % 1 != 0)
				a.val(1);

			if (a.val() > 1)
				a.val(+a.val() - 1);
		});

		// Действие кнопки увеличения количества товара параллельно с валидацией
		$('.amount-tumbler__button_right').on('click', function () {
			var a = $(this).siblings('.products-amount__input')
			if (!(parseInt(a.val()) >= 1) || a.val() % 1 != 0)
				a.val(1);

			a.val(+a.val() + 1);
		});

		// Починка флекс-отображения категорий при загрузке страницы
		flexFix();
    }
});