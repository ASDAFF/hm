<?if($APPLICATION->GetCurPage(false)  != '/blog/'):?>
    <?include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/webkmv_main/inc/forma.php";?>
<?endif;?>
</main><!-- .content -->
<?

if($APPLICATION->GetCurPage(false)  == '/team/') {
    echo "<br />";
}
?>
<footer class="footer">
    <div class="iner-foot">
        <span class="foot-icon"></span>
        <span class="copy">2008-2014 «Вебмастер КМВ»</span>
        <span class="foot-address">г. Пятигорск, пр. Кирова, 61 а</span>
        <ul class="sot-set">
            <li><a class="sot-f" href="https://www.facebook.com/webkmv"></a></li>
            <li><a class="sot-p" href="http://webkmv.livejournal.com"></a></li>
            <li><a class="sot-v" href="https://vk.com/wbkmv"></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</footer><!-- .footer -->