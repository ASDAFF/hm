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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

if (0 < $arResult["SECTIONS_COUNT"]){
	?>

	<table class="sect_table" cellpadding="0" cellspacing="0" >
	<tr>

	<?

			$intCurrentDepth = 0;
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				if($arSection['RELATIVE_DEPTH_LEVEL'] == 1){
					if ($arSection['RELATIVE_DEPTH_LEVEL'] < $intCurrentDepth){
						echo('</div>');
					}
					if ($arSection['RELATIVE_DEPTH_LEVEL'] <= $intCurrentDepth){
						echo('</td>');
					}
					?>
					<td>
						<a id="<?=$this->GetEditAreaId($arSection['ID']);?>" href="<?=$arSection["SECTION_PAGE_URL"]?>">
							<img src="<?=$arSection['PICTURE']['SRC']?>"/>
							<span><?=$arSection["NAME"]?><sup><?=$arSection["ELEMENT_CNT"]?></sup></span>
						</a>
					<?
				}

				if($arSection['RELATIVE_DEPTH_LEVEL'] > 1){
					if ($arSection['RELATIVE_DEPTH_LEVEL'] > $intCurrentDepth){
						echo('<div>');
					}
					?>
						<a id="<?=$this->GetEditAreaId($arSection['ID']);?>" href="<?=$arSection["SECTION_PAGE_URL"]?>">
							<?=$arSection["NAME"]?><sup><?=$arSection["ELEMENT_CNT"]?></sup>
						</a>
					<?
				}

				$intCurrentDepth = $arSection['RELATIVE_DEPTH_LEVEL'];
				unset($arSection);


			}


?>
	</tr>
	</table>
<?
}
