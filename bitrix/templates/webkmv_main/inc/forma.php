<?if(ERROR_404 != 'Y'):?>
    <div class="bold-line"></div>
    <div id="email-us" class="inner-block email-us">
        <h2>напишите нам письмо</h2>
        <div class="sites-created">
            <p><span>В двух-трех предложениях опишите то, о чем мечтаете.</span>
                <span>Красивый сайт, эффективное продвижение ваших товаров или услуг.</span>
                <span>Можете просто написать - «Хочу миллион» и мы это сделаем.</span></p>
        </div>
        <div class="form_mainer">
            <div class="form-inp">
                <input type="text" class="text-name-n" value="Имя">
                <input type="text" class="text-name-p" value="Телефон">
            </div>
            <div class="form-block">
                <div class="white-block">
                    <textarea class="text-area"></textarea>
                    <div class="form-inp">
                        <?
                        $arResult["CAPTCHA_CODE"] = htmlspecialchars($GLOBALS["APPLICATION"]->CaptchaGetCode());
                        ?>
                        <div style="margin-bottom: 5px;">Введите код с картинки</div>
                        <input class="captcha_sid" type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
                        <img src="/bitrix/tools/captcha.php?captcha_code=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
                        <input style="vertical-align: top;height: 28px;" class="captcha_word" type="text" name="captcha_word" maxlength="50" value="" />
                    </div>
                    <div class="send-btn">

                        <a href="javascript:void(0);" class="btn submit_form"><span>Отправить</span></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="email-phone">
            <a href="mailto: zakaz@web-kmv.ru">zakaz@web-kmv.ru</a>
            <span class="phone-foot">8(962) <span>008-91-90</span></span>
        </div>


    </div>
<?endif;?>