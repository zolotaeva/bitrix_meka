<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<nav class="footer__menu">
		<a href="/catalog/" class="footer__subtitle">КАТАЛОГ</a>
		<?
		foreach($arResult as $arItem):
			if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
				continue;
		?>
			<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
			
		<?endforeach?>
	</nav>
<?endif?>