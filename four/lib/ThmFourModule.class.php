<?php

class ThmFourModule {

  static $names = [], $basePaths = [];

  static function init($name, $baseParam = null) {
    self::$names[$baseParam] = $name;
    self::$basePaths[$name] = $baseParam;
    Ngn::addBasePath(NGN_ENV_PATH.'/thm-four-modules/modules/'.$name, 3);
  }

  static function install($name) {
    $file = NGN_ENV_PATH.'/thm-four-modules/modules/'.$name.'/structures.php';
    if (!file_exists($file)) return;
    $structures = require $file;
    foreach ($structures as $strName => $strFields) {
      try {
        DdStructureCore::create($strName, $strFields);
        output2("Structure '$strName' created");
      } catch (AlreadyExistsException $e) {
        output("Structure '$strName' exists");
      }
      $fieldsManager = new DdFieldsManager($strName);
      foreach ($strFields as $strField) {
        if (($existingField = $fieldsManager->items->getItemByField('name', $strField['name']))) {
          $strFieldKeys = array_keys($strField);
          $existingFieldFiltered = Arr::filterByKeys($existingField, $strFieldKeys);
          if ($existingFieldFiltered != $strField) {
            output("Updating '{$existingField['name']}' field. (module: $name, str: $strName)");
            $fieldsManager->update($existingField['id'], $strField);
          }
        } else {
          $fieldsManager->create($strField);
        }
      }
    }
  }

}