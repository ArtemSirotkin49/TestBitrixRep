<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {die();} ?>

<form action="" method="POST">
  <label for="date">Введите дату:</label>
  <input id="date" type="text" name="date">
  <input type="submit" value="OK">
</form>
<?php if (!empty($arResult["HOLIDAY_DATE"])) { ?>
    <div>
        <?= $arResult["HOLIDAY_DATE"] ?> выходной день
    </div>
<?php } ?>
<?php if (!empty($arResult["WORKING_DATE"])) { ?>
    <div>
        <?= $arResult["WORKING_DATE"] ?> рабочий день
    </div>
<?php } ?>
