<?php
if (!defined('B_PROLOG_INCLUDED')||B_PROLOG_INCLUDED !== true)
    die();

?>

<div class="catalogsorter" id="composite_sorter"<?php if (isset($arParams['AJAXPAGESID']) && $arParams['AJAXPAGESID'] != ''): ?> data-ajaxpagesid="<?=$arParams['AJAXPAGESID']?>"<?php endif; ?>>

    <?php
	$frame = $this->createFrame('composite_sorter', false)->begin();
	$frame->setBrowserStorage(true);
    ?>
    
	<?php if ($arParams['ALFA_CHOSE_TEMPLATES_SHOW'] == 'Y' && is_array($arResult['CTEMPLATE']) && count($arResult['CTEMPLATE']) > 1): ?>
		<div class="template clearfix">
			<?php foreach ($arResult['CTEMPLATE'] as $template): ?>
				<a<?php if ($template['USING'] == 'Y'): ?> class="selected"<?php endif;
                    ?> href="<?=$template['URL']?>" data-fvalue="<?=CUtil::JSEscape($template['VALUE'])?>" title="<?=($template['NAME_LANG'] != '' ? $template['NAME_LANG'] : $template['VALUE']);
                    ?>"><i class="<?=$template['VALUE']?> icon pngicons"></i><span><?=($template['NAME_LANG'] != '' ? $template['NAME_LANG'] : $template['VALUE'])?></span></a>
			<?php endforeach; ?>
		</div>
	<?php endif;?>
    
	<?php if ($arParams['ALFA_SORT_BY_SHOW'] == 'Y' && is_array($arResult['CSORTING']) && count($arResult['CSORTING']) > 1): ?>
        <div class="sortaou clearfix">
            <div class="<?if($arParams['ALFA_SHORT_SORTER']=='Y'):?>shortsort<?else:?>sort<?endif;?> clearfix">
                <span class="cool">
                    <div class="title"><?=GetMessage('MSG_SORT')?></div>
                    <?php if ($arParams['ALFA_SHORT_SORTER'] == 'Y'): ?>
                        <?php
                        $arrUsed = array();
                        ?>
                        <?php foreach ($arResult['CSORTING'] as $sort): ?>
                            <?php 
                            if( '' == $sort['GROUP'] || in_array($sort['GROUP'], $arrUsed) || $sort['VALUE'] == $arResult['USING']['CSORTING']['ARRAY']['VALUE']){
                                continue;
                            }
                            ?>
                            <span class="drop clearfix"></span>
                            <?php if ($arResult['USING']['CSORTING']['ARRAY']['GROUP'] == $sort['GROUP']): ?>
                                <a class="selected" href="<?=$sort['URL']?>" data-url1="<?=$sort['URL']?>" data-url2="<?=$sort['URL2']?>"><span class="nowrap"><?=GetMessage('CSORTING_'.$arResult['USING']['CSORTING']['ARRAY']['GROUP']);?><i class="<?=$arResult['USING']['CSORTING']['ARRAY']['DIRECTION'];?> icon pngicons"></i></span></a>
                            <?php else: ?>
                                <a href="<?=$sort['URL']?>" data-url1="<?=$sort['URL']?>" data-url2="<?=$sort['URL2']?>"><span class="nowrap"><?=GetMessage('CSORTING_'.$sort['GROUP']); ?><i class="<?=$sort['DIRECTION'];?> icon pngicons"></i></span></a>
                            <?php endif;?>
                            <?php
                            $arrUsed[] = $sort['GROUP'];
                            ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="dropdown">
                            <a class="select" href="#"><span class="nowrap"><?=GetMessage('CSORTING_'.$arResult['USING']['CSORTING']['ARRAY']['GROUP']);?><i class="<?=$arResult['USING']['CSORTING']['ARRAY']['DIRECTION'];?> icon pngicons"></i></span></a>
                            <div class="dropdownin">
                                <?php foreach ($arResult['CSORTING'] as $sort): ?>
                                    <a<?if($sort['USING']=='Y'):?> class="selected"<?endif;?> href="<?=$sort['URL']?>"><span class="nowrap"><?=GetMessage('CSORTING_'.$sort['GROUP'])?><i class="<?=$sort['DIRECTION'];?> icon pngicons"></i></span></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif;?>
                </span>
            </div>
        </div>
    <?php endif;?>
        
    <?php $this->SetViewTarget('catalog_sorter_output_of_show'); ?>
    <div class="catalogsorter" id="composite_sorter"<?if(isset($arParams['AJAXPAGESID']) && $arParams['AJAXPAGESID']!=''):?> data-ajaxpagesid="<?=$arParams['AJAXPAGESID']?>"<?endif;?>>
        <div class="sortaou clearfix">
            <?php if ($arParams['ALFA_OUTPUT_OF_SHOW'] == 'Y' && is_array($arResult['COUTPUT']) && count($arResult['COUTPUT']) > 1): ?>
                <div class="output clearfix">
                    <span class="cool">
                        <div class="title"><?=GetMessage('MSG_OUTPUT')?></div>
                        <div class="dropdown">
                            <a class="select" href="#">
                            <?=$arResult['USING']['COUTPUT']['ARRAY']['NAME_LANG']?><i class="icon pngicons"></i></a>
                            <div class="dropdownin">
                                <?php foreach ($arResult['COUTPUT'] as $output): ?>
                                    <a<?if($output['USING']=='Y'):?> class="selected"<?endif;?> href="<?=$output['URL']?>"><?=($output['NAME_LANG']!=''?$output['NAME_LANG']:$output['VALUE'])?><i class="icon pngicons"></i></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </span>
                </div>
            <?php endif;?>
        </div>
    </div>
    <?php $this->EndViewTarget(); ?>
    
	<div class="clear"></div>
    
	<?php $frame->end(); ?>
    
</div>
