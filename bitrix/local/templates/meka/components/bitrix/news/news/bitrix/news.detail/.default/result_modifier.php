<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

function generateHeadersList($detailText) {
    // Регулярное выражение для поиска заголовков h2 и h3
    preg_match_all('/<h2>(.*?)<\/h2>|<h3>(.*?)<\/h3>/', $detailText, $matches, PREG_SET_ORDER);

		// Проверяем, есть ли вообще заголовки в контенте
    if (empty($matches)) {
			return [null, $detailText];
		}

    // Инициализация переменных
    $headersList = '<aside class="aside">
											<div class="aside__box">
												<div class="aside__title">Содержание</div>
												<ul class="aside__list">';
    $h3List = '';
    $h2Count = 0;
    $h3Count = 0;

    // Обработка найденных заголовков
    foreach ($matches as $match) {
        if (!empty($match[1])) {  // Это h2
            if ($h2Count > 0 && !empty($h3List)) {
                $headersList .= $h3List . '</ul></li>';
                $h3List = '';
            }
            $h2Count++;
            $h3Count = 0;
            $headersList .= '<li><a href="#h2-' . $h2Count . '">' . $match[1] . '</a>';
        } elseif (!empty($match[2])) {  // Это h3
            $h3Count++;
            if ($h3Count == 1) {
                $h3List .= '<ul>';
            }
            $h3List .= '<li><a href="#h3-' . $h2Count . '-' . $h3Count . '">' . $match[2] . '</a></li>';
        }
    }

    if (!empty($h3List)) {
        $headersList .= $h3List . '</ul></li>';
    }

    $headersList .= '</ul></div></aside>';


    
    // Добавляем якорные ссылки в исходный текст
    $h2Count = 0;
    $h3Count = 0;
    $updatedDetailText = preg_replace_callback(
        '/<h2>(.*?)<\/h2>|<h3>(.*?)<\/h3>/',
        function ($match) use (&$h2Count, &$h3Count) {
            if (!empty($match[1])) {
                $h2Count++;
                $h3Count = 0;
                return '<h2 id="h2-' . $h2Count . '">' . $match[1] . '</h2>';
            } elseif (!empty($match[2])) {
                $h3Count++;
                return '<h3 id="h3-' . $h2Count . '-' . $h3Count . '">' . $match[2] . '</h3>';
            }
        },
        $detailText
    );

    return [$headersList, $updatedDetailText];
}

if (!empty($arResult["DETAIL_TEXT"])) {
    list($headersList, $updatedDetailText) = generateHeadersList($arResult["DETAIL_TEXT"]);
    $arResult["HEADERS_LIST"] = $headersList;
    $arResult["DETAIL_TEXT"] = $updatedDetailText;
}
