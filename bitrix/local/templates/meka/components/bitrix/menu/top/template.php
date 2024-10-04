<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

	<nav class="header__nav navbar navbar-expand-md">
		<button class="header__burger btn btn-burger js-toggle-menu">
			<span></span>
		</button>
		<div class="header__menu" id="header_menu">

			<ul class="header__nav-list">

				<? foreach($arResult as $arItem):
						if( $arItem["DEPTH_LEVEL"] > 1) 
							continue;
						?>
						<li class="header__nav-item nav-item <?=$arItem["CLASS"]?><?=$arItem["PARENT"]?>">
							<a class="header__nav-link nav-link" href="<?=$arItem["LINK"]?>">
								<?=$arItem["TEXT"]?>
							</a>
							<?if($arItem["CHILD_KEYS"]):?>
								<ul class="drop-menu">
									<?foreach($arItem["CHILD_KEYS"] as $cKey):?>
									<?$subItem = $arResult[$cKey];?>
									<li class="header__nav-item nav-item <?=$subItem["CLASS"]?>">
										<a class="header__nav-link nav-link" href="<?=$subItem["LINK"]?>">
											<?=$subItem["TEXT"]?>
										</a>
									</li>
									<?endforeach?>
								</ul>
							<?endif?>
						</li>
					<?endforeach?>

				</ul>
		</div>
	</nav>

<?endif?>