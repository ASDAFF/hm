<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<span class="like_bl">
	<form method="post" action="<?=POST_FORM_ACTION_URI?>">
		<?echo bitrix_sessid_post();?>
		<input value="0" type="hidden" name="rating">
		<input type="hidden" name="back_page" value="<?=$arResult["BACK_PAGE_URL"]?>" />
		<input type="hidden" name="vote_id" value="<?=$arResult["ID"]?>" />
		<input type="submit" name="vote" value="<?=GetMessage("T_IBLOCK_VOTE_BUTTON")?>" />
	</form>
</span>

