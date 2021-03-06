<?

use Bitrix\Main\EventManager;
use Bitrix\Main\ModuleManager,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (class_exists("onizamov_comments")) {
    return;
}

class onizamov_comments extends CModule
{

    function __construct()
    {
        $arModuleVersion = include(dirname(__FILE__) . "/version.php");
        $this->MODULE_ID = $arModuleVersion["MODULE_ID"];
        $this->MODULE_NAME = $arModuleVersion["MODULE_NAME"];
        $this->MODULE_DESCRIPTION = $arModuleVersion["MODULE_DESCR"];
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->PARTNER_NAME = $arModuleVersion["PARTNER_NAME"];
        $this->PARTNER_URI = $arModuleVersion["PARTNER_URI"];
    }

    public function DoInstall()
    {
        global $APPLICATION;

        if (!CheckVersion(ModuleManager::getVersion('main'), '14.0.0')) {
            $APPLICATION->ThrowException('Ваша система не поддерживает D7');
        } else {
            ModuleManager::RegisterModule($this->MODULE_ID);
        }

        $APPLICATION->IncludeAdminFile(
            "Установка модуля" . $this->MODULE_ID,
            dirname(__FILE__) . "/step.php"
        );
    }

    public function DoUninstall()
    {
        global $APPLICATION;
        ModuleManager::UnRegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile(
            "Деинсталляция модуля " . $this->MODULE_ID,
            dirname(__FILE__) . "/unstep.php"
        );
    }
}
