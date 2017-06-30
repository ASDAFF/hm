<?
namespace WM;

/**
 * Class Handlers Обработчики событий
 * @package Local\Utils
 */
class Handlers
{
	/**
	 * Добавление обработчиков
	 */
	public static function addEventHandlers() {
		static $added = false;
		if (!$added) {
			$added = true;
			AddEventHandler('iblock', 'OnIBlockPropertyBuildList',
				array(__NAMESPACE__ . '\Handlers', 'addYesNo'));
		}
	}

	/**
	 * Добавление пользовательских свойств
	 * @return array
	 */
	public static function addYesNo() {
		return UserTypeNYesNo::GetUserTypeDescription();
	}

}