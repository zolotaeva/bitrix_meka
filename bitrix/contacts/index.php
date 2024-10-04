<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");

CModule::IncludeModule("iblock");
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>4, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>5);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while($ob = $res->GetNextElement())
{
 $arPropsContacts = $ob->GetProperties();
}

?>
<div class="content contacts">
	<div class="container">
		<div class="contacts__row row">
			<div class="col-lg-6">
				<div class="contacts__info">
					<div class="contacts__top">
						<div class="contacts__title title pb-60"><?$APPLICATION->ShowTitle(false)?></div>
						<div class="row">

							
							<div class="col-md-5">
								<div class="contacts-item">
									<div class="contacts-item__title">E-mail</div>
									<div class="contacts-item__text">
										<?
										$email = $arPropsContacts['EMAIL']['~VALUE'];
										$address = $arPropsContacts['ADDRESS']['~VALUE'];
										?>
										<a href="mailto:<?=$email?>"><?=$email?></a>
									</div>
								</div>
							</div>
							<?/*
							<div class="col-md-5">
								<div class="contacts-item">
									<div class="contacts-item__title">Номер телефона</div>
									<div class="contacts-item__text">
										<?
										$phone = $arPropsContacts['PHONE']['~VALUE'];
										$phoneLink = preg_replace("/[\D]/", "", $phone);
										?>
										<a href="tel:<?=$phoneLink?>"><?=$phone?></a>
									</div>
								</div>
							</div>
							*/?>
							<div class="col-md-5"></div>
							<div class="col-md-5">
								<div class="contacts-item">
									<div class="contacts-item__title">Офис</div>
									<div class="contacts-item__text">
										<?
										$phone = $arPropsContacts['PHONE_OFFICE']['~VALUE'];
										$phoneLink = preg_replace("/[\D]/", "", $phone);
										?>
										<a href="tel:<?=$phoneLink?>"><?=$phone?></a>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="contacts-item">
									<div class="contacts-item__title">Отдел продаж</div>
									<div class="contacts-item__text">
										<?
										$phone = $arPropsContacts['PHONE_SALE']['~VALUE'];
										$phoneLink = preg_replace("/[\D]/", "", $phone);
										?>
										<a href="tel:<?=$phoneLink?>"><?=$phone?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="contacts-item">
							<div class="contacts-item__title">Адрес</div>
							<div class="contacts-item__text">
								<?=$address?>
							</div>
						</div>
					</div>
					<div class="contacts__social social">
						<div class="social__text">Давайте дружить</div>
						<div class="social__list">
							<?if($arPropsContacts['TELEGRAM']['VALUE']){?>
								<a href="<?=$arPropsContacts['TELEGRAM']['VALUE']?>" target="_blank" class="social__link social__link--tg"></a>
							<?}?>
							<?if($arPropsContacts['WHATSAPP']['VALUE']){?>
								<a href="<?=$arPropsContacts['WHATSAPP']['VALUE']?>" target="_blank" class="social__link social__link--wa"></a>
							<?}?>
							<?if($arPropsContacts['YOUTUBE']['VALUE']){?>
								<a href="<?=$arPropsContacts['YOUTUBE']['VALUE']?>" target="_blank" class="social__link social__link--yt"></a>
							<?}?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
			<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => SITE_TEMPLATE_PATH . "/inc/feedback_contacts.php",
				"EDIT_TEMPLATE" => "include_areas_template.php"
				), false
			);?>

			</div>
			
			<div class="col-lg-10">
				<div class="contacts__requisites requisites">
					<div class="requisites__top">
						<div class="requisites__title title">Реквизиты компании</div>
						<?/* временно скрываем кнопку 
						$file = CFile::GetPath($arPropsContacts['REQUISITES_DOC']['VALUE']);?>
						<a href="<?=$file?>" download class="btn requisites__btn white btn-download">Скачать реквизиты doc</a>
						*/?>
					</div>
					<?if($arPropsContacts['REQUISITES']['VALUE']){?>
						<div class="requisites__list">
						<div class="row">
							<? foreach ($arPropsContacts['REQUISITES']['VALUE'] as $key => $item) {?>

								<div class="col-sm-6 col-md-4">
									<div class="requisites__item">
										<div class="requisites__name">
											<?=$arPropsContacts['REQUISITES']['DESCRIPTION'][$key]?>
										</div>
										<div class="requisites__text"><?=$item?></div>
									</div>
								</div>
								
							<?}?>
						</div>
						</div>
						<?}?>

				</div>
			</div>
		</div>
		
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>