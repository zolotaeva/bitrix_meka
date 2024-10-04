<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
/*
 * Готовлю массив для удобного вывода в шаблоне
 * 
 */
foreach($arResult as $key => &$arItem){
  $nextKey = $key+1;
  $next = $arResult[$nextKey];
  $childKeys = array();
 
  /*
   *  Если, за элементом $arItem, идет следующий элемент $next
   *  с более глубокой вложенностью, добавляю его, и следующиее за ним
   *  элементы той же вложенности в массив дочерних элементов
   *
   */  
  while( $next['DEPTH_LEVEL'] > $arItem['DEPTH_LEVEL'] ){
    // Только те, что на 1 уровень глубже
    if($next['DEPTH_LEVEL'] == $arItem['DEPTH_LEVEL']+1 ){
      $childKeys []= $nextKey;
    }
    $nextKey++;
    $next = $arResult[$nextKey];
  }
 
  $arItem['CHILD_KEYS'] = $childKeys;
 
  // Проставляю классы, что бы не городить правила в шаблоне
  $arItem["CLASS"] = "";
  if ($arItem["SELECTED"])
    $arItem["CLASS"].=' active';

	if ($arItem["CHILD_KEYS"])
    $arItem["PARENT"].=' parent';
	}

	
?>