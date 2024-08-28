<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
/**
 * @var CMain $APPLICATION
 */

$APPLICATION->SetTitle('Демострация ORM у списков');

\Bitrix\Main\Loader::includeModule('iblock');

$doctorsCollection = \Bitrix\Iblock\Elements\ElementdoctorsTable::getList([
    'select' => [
        'NAME',
        'ID',
        'PROCEDURES',
    ]
])->fetchCollection();

$doctors = [];
foreach ($doctorsCollection as $doctor) {
    $procedures = [];
    if ($doctor->get('PROCEDURES')) {
        foreach ($doctor->get('PROCEDURES') as $procedure) {
            $procedures[] = $procedure->getValue();
        }
}
    $doctors[] = [
        'NAME' => $doctor->get('NAME'),
        'ID' => $doctor->get('ID'),
        'PROCEDURES' => $procedures,
    ];
//    var_dump($doctor->get('PROCEDURES')->getValue());
//    var_dump($doctor->get('NAME'));
//    var_dump($doctor->get('ID'));
};
var_dump($doctors);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
