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
                $arDate = explode(".", $_POST["date"]);
                $year = (int) $arDate[2];
                $month = (int) $arDate[1];
                $day = (int) $arDate[0];
                $year -= 2020;
                $days = 365 * $year + intval($year/4) + 1;
                switch ($month) {
                    case 1: $days += $day;
                        break;
                    case 2: $days += $day + 31;
                        break;
                    case 3: $days += $day + 31 + 28;
                        break;
                    case 4: $days += $day + 31 + 28 + 31;
                        break;
                    case 5: $days += $day + 31 + 28 + 31 + 30;
                        break;
                    case 6: $days += $day + 31 + 28 + 31 + 30 + 31;
                        break;
                    case 7: $days += $day + 31 + 28 + 31 + 30 + 31 + 30;
                        break;
                    case 8: $days += $day + 31 + 28 + 31 + 30 + 31 + 30 + 31;
                        break;
                    case 9: $days += $day + 31 + 28 + 31 + 30 + 31 + 30 + 31 + 31;
                        break;
                    case 10: $days += $day + 31 + 28 + 31 + 30 + 31 + 30 + 31 + 31 + 30;
                        break;
                    case 11: $days += $day + 31 + 28 + 31 + 30 + 31 + 30 + 31 + 31 + 30 + 31;
                        break;
                    case 12: $days += $day + 31 + 28 + 31 + 30 + 31 + 30 + 31 + 31 + 30 + 31 + 30;
                        break;
                }
                $days = $days % 7;
                if ($days == 4 || $days == 5) {
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