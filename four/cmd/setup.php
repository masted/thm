<?php

foreach (ThmFourModule::$names as $fourModule) {
  $file = NGN_ENV_PATH.'/thm-four-modules/'.$fourModule.'/structures.php';
  if (!file_exists($file)) continue;
  $structures = require $file;
  foreach ($structures as $strName => $fields) {
    try {
      DdStructureCore::create($strName, $fields);
      print Cli::colored("Structure '$strName' created\n", 'lightCyan');
    } catch (AlreadyExistsException $e) {
      print "Structure '$strName' exists\n";
    }
  }
}
