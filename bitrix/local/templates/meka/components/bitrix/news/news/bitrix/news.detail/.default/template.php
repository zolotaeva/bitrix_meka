<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="news-detail">
<?
$img = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>920, 'height'=>300), BX_RESIZE_IMAGE_EXACT, true);
?>
	<div class="news-detail__row row">
		<div class="col-lg-8">
			<div class="news-detail__content">
				<?if($arResult["DETAIL_PICTURE"]){?>
					<img class="news-detail__preview" src="<?=$img['src']?>" alt="<?=$arResult['NAME']?>">
				<?}?>
				<div class="news-detail__anons"><?echo $arResult["PREVIEW_TEXT"];?></div>
				<div class="news-detail__text">
					<?echo $arResult["DETAIL_TEXT"];?>
				</div>
				<div class="news-detail__btn">
					<a href="/news/" class="btn btn-primary btn-more">Вернуться к новостям</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<?php if (!empty($arResult["HEADERS_LIST"])): ?>
				<?= $arResult["HEADERS_LIST"] ?>
			<?php endif; ?>
		</div>


	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.aside__list a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
</script>

