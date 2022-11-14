<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {die();}

use Bitrix\Main\Diag\Debug;

class WorkingDays extends CBitrixComponent
{
    public function executeComponent()
    {
        if (!empty($_POST["date"])) {
            $datesObj = CIBlockElement::GetList(["SORT" => "ASC"], ["IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
                "PROPERTY_DATE" => $_POST["date"]],
                false,false, ["PROPERTY_DATE"]);
            if ($arDate = $datesObj->Fetch()) {
                $this->arResult["HOLIDAY_DATE"] = $_POST["date"];
            } else {
                $time = strtotime($_POST["date"]);
                $dayOfWeek = date('w', $time);
                if ($dayOfWeek == 6 || $dayOfWeek == 0) {
                    $this->arResult["HOLIDAY_DATE"] = $_POST["date"];
                    $this->arResult["HOLIDAY_DATE"] = $_POST["date"];
                } else {
                    $this->arResult["WORKING_DATE"] = $_POST["date"];
                }
            }
        }

        $this->includeComponentTemplate();
    }
}