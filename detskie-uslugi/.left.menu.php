<?
$aMenuLinks = Array();

CModule::IncludeModule("iblock");
$items = GetIBlockSectionList(12, false);
while($arItem = $items->GetNext()){
	$aMenuLinks[] = Array($arItem['NAME'],$arItem['SECTION_PAGE_URL'],Array(),Array(),"");
}

?>