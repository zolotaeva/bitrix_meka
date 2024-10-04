<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->createFrame()->begin("Загрузка навигации");
?>

<?if($arResult["NavPageCount"] > 1):?>

    <?if ($arResult["NavPageNomer"]+1 <= $arResult["nEndPage"]):?>
        <?
            $plus = $arResult["NavPageNomer"]+1;
            $url = $arResult["sUrlPathParams"] . "PAGEN_".$arResult["NavNum"]."=".$plus;

        ?>
						<div class="news-item__btn">
							<a href="#" class="btn btn-primary load_more" data-url="<?=$url?>">Показать еще</a>
						</div>
        

    <?else:?>
						<!--<div class="news-item__btn">
							<a href="#" class="btn btn-primary load_more" disabled data-url="<?//=$url?>">Загружено все</a>
						</div>-->
  

    <?endif?>

<?endif?>