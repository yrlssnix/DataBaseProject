<?php

require "C:\Smarty\libs\Smarty.class.php";
require "database/Database.php";
require "dao/MedicineDAO.php";
require "classes/Medicine.php";

if(empty($_SESSION['username']))
    header('Location: home.php');

$smarty = new Smarty;
$smarty->assign("respPersonName",$_SESSION["name"]);
$table_cont = "table_content";
$input_val = "input_val";

if(isset($_POST['submit_btn'])){
    $prefix = $_POST['prefix'];
    $sql = "SELECT medicines.idMedicine, medName, producer, medDescript, unitType, unitAmount, storageTemp, usabilityTerm, SUM(storageUnitAmount) AS amount
FROM medicines INNER JOIN medicinegroups ON medicines.idMedicine = medicinegroups.idMedicine
WHERE (lower(medName) LIKE '".$prefix."%')
GROUP BY medicines.idMedicine";
    MedicineDAO::eagerInit($sql);
    $medicine = MedicineDAO::getMedicines();

    $smarty->assign($input_val,$prefix);
    $smarty->assign($table_cont,$medicine);
}
else{
    $sql = "SELECT medicines.idMedicine, medName, producer, medDescript, unitType, unitAmount, storageTemp, usabilityTerm, SUM(storageUnitAmount) AS amount
FROM medicines INNER JOIN medicinegroups ON medicines.idMedicine = medicinegroups.idMedicine
GROUP BY medicines.idMedicine;";
    MedicineDAO::eagerInit($sql);
    $medicine = MedicineDAO::getMedicines();

    $smarty->assign($input_val,"");
    $smarty->assign($table_cont,$medicine);
}

$smarty->display("../../frontend/html/respPersonPage.tpl");