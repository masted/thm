<?php

foreach (ThmFourModule::$names as $fourModule) {
  $file = NGN_ENV_PATH.'/thm-four-modules/'.$fourModule.'/structures.php';
  if (!file_exists($file)) continue;
  $structures = require $file;
  foreach ($structures as $strName => $fields) {
    try {
      DdStructureCore::create($strName, $fields);
      print "Structure '$strName' created\n";
    } catch (AlreadyExistsException $e) {
      print "Structure '$strName' exists\n";
    }
  }
}
