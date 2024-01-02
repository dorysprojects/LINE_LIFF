<?php

$SQL = new kSQL('SuperRatio');
$rows = $SQL->SetAction('select')
        ->SetWhere("tablename='SuperRatio'")
        ->SetWhere("next='myself'")
        ->BuildQuery();
$TPL->assign('rows', $rows);