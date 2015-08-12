<?php

class ThmFourModule {

  static $names = [], $basePaths = [], $rootPath;

  static function init($name, $baseParam = null) {
    self::$names[$baseParam] = $name;
    self::$basePaths[$name] = $baseParam;
    Ngn::addBasePath(self::$rootPath.'/'.$name, 3);

  }

  // installer

  static $updated = false;

  static function update() {
    foreach (ThmFourModule::$names as $name) {
      ThmFourModule::install($name);
    }
    if (!self::$updated) output('No changes');
  }

  static function install($name) {
    $file = self::$rootPath.'/'.$name.'/structures.php';
    if (!file_exists($file)) return;
    $structures = require $file;
    foreach ($structures as $strName => $strFields) {
      try {
        DdStructureCore::create($strName, $strFields);
        output2("Structure '$strName' created");
        self::$updated = true;
      } catch (AlreadyExistsException $e) {
      }
      $fieldsManager = new DdFieldsManager($strName);
      foreach ($strFields as $strField) {
        if (($existingField = $fieldsManager->items->getItemByField('name', $strField['name']))) {
          $strFieldKeys = array_keys($strField);
          $existingFieldFiltered = Arr::filterByKeys($existingField, $strFieldKeys);
          if ($existingFieldFiltered != $strField) {
            self::$updated = true;
            output("Updating '{$existingField['name']}' field. (module: $name, str: $strName)");
            $fieldsManager->update($existingField['id'], $strField);
          }
        } else {
          self::$updated = true;
          output("Creating '{$strField['name']}' field. (module: $name, str: $strName)");
          $fieldsManager->create($strField);
        }
      }
    }
  }

}

ThmFourModule::$rootPath = NGN_ENV_PATH.'/thm-four-modules/modules';
