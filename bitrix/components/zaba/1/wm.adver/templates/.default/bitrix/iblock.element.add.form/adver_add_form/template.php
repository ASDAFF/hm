<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<?if (strlen($arResult["MESSAGE"]) > 0){?>
	<div id="newadvermessage">
		<h2><?=$arResult["MESSAGE"]?></h2>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#newadvermessage').fancybox().click();
		});
	</script>
<?}?>

<form id="newadver" name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">


	<h2 id="newadver_h2">Оставьте своё объявление</h2> <!--/////////////////////JS-->
	<div class="inputed_form">

		<?if (!empty($arResult["ERRORS"])){?>
			<div class="adv_error_div">
			<?
				echo(implode("<br>", $arResult["ERRORS"]))
			?>
			</div>

			<script type="text/javascript">
				$(document).ready(function(){
					<? if($_POST['PROPERTY']['IBLOCK_SECTION'][0]>0){ ?>
						$('#newadver_btn').click();
					<?}else{?>
						$('#newadver_btn<?=$_POST['PROPERTY']['DETAIL_TEXT'][0]?>').click();
					<?}?>
					issystemopen = false;
				});
			</script>
		<?};?>
		<input id="newadver_si" type="hidden" value="<?=$arParams["SECTION_ID"]?>" name="PROPERTY[IBLOCK_SECTION][0]"/><!--/////////////////////JS-->
		<?=bitrix_sessid_post()?>
		<input name="PROPERTY[NAME][0]" placeholder="Имя" type="text"/>

		<textarea id="newadver_pt" name="PROPERTY[PREVIEW_TEXT][0]" placeholder="Краткое описание"></textarea><!--/////////////////////JS-->
		<textarea id="newadver_dt" name="PROPERTY[DETAIL_TEXT][0]" placeholder="Полное описание"></textarea><!--/////////////////////JS-->
		<div id="newadver_img">
			Добавьте фотографию:<!--/////////////////////JS-->
			<input name="PROPERTY[PREVIEW_PICTURE][0]" type="hidden">
			<input name="PROPERTY_FILE_PREVIEW_PICTURE_0" type="file">
		</div>
		<?if($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0):?>
			<div class="capcha_block">
				<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
				<br>
				<?=GetMessage("IBLOCK_FORM_CAPTCHA_PROMPT")?><span class="starrequired">*</span>:
				<input style="width: 200px; margin: 0" type="text" name="captcha_word" maxlength="50" value="">
			</div>
		<?endif?>

		<input name="iblock_submit" class="zaba_button zaba_button_red" type="submit" value="Отправить">
	</div>
</form>

