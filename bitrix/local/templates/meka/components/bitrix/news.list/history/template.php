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

<div class="section history">
	<div class="history__top">
		<div class="container">
			<div class="history__row row">
				<div class="col-lg-6">
					<div class="history__title title">История компании</div>
				</div>
				<div class="col-lg-6">
					<div class="history__nav nav nav-tabs" id="history-nav">
						<a href="#" class="nav-prev btn-prev history__nav-prev" id="nav-prev"></a>
						<div class="tabs-container" id="tabs-container">

						<?foreach($arResult["ITEMS"] as $key => $arItem):
							 
							$active = '';

							if($key == 0){
								$active = ' active';
							}?>
							<a href="#year<?=$arItem['NAME']?>" class="history__nav-link nav-link<?=$active?>">
								<?=$arItem['NAME']?>
							</a>
					
						<?endforeach;?>
						
						</div>
						<a href="#" class="nav-next btn-next history__nav-next" id="nav-next"></a>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="history__content tab-content" id="history-tabContent">
		<div class="container-fluid">

			<?foreach($arResult["ITEMS"] as $key => $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

				$active = '';

				if($key == 0){
					$active = ' active';
				}
				?>





				<div class="history__content-item<?=$active?>" id="year<?=$arItem['NAME']?>" >
					<div class="history__content-row row" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="history__col-info col-lg-6">
							<div class="history__content-info">
								<div class="history__content-title"><?=$arItem['NAME']?></div>
								<div class="history__content-text"><?=$arItem['PREVIEW_TEXT']?></div>
							</div>
						</div>
						<div class="history__col-slider col-lg-auto">
							<div class="history__content-slider history__slider history__slider-<?=$key?> swiper">
								<div class="swiper-wrapper">
								<?foreach($arItem['PROPERTIES']['GALLERY']['VALUE'] as $item):
									$img = CFile::ResizeImageGet($item, array('width'=>680, 'height'=>383), BX_RESIZE_IMAGE_EXACT, true);?>

									<div class="swiper-slide">
										<div class="history__img">
											<img src="<?=$img['src']?>" alt="">
											<span><?=$arItem['NAME']?></span>
										</div>
									</div>

								<?endforeach;?>
				
								</div>
								<div class="history__scrollbar swiper-scrollbar"></div>
							</div>
						</div>
					</div>
				</div>


			<?endforeach;?>
		</div>
	</div>
</div>