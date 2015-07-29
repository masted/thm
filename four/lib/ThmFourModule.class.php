<?php

class ThmFourModule {

  static $names = [], $basePaths = [];

  static function init($name, $baseParam = null) {
    self::$names[$baseParam] = $name;
    self::$basePaths[$name] = $baseParam;
    Ngn::addBasePath(NGN_ENV_PATH.'/thm-four-modules/modules/'.$name, 3);
  }

  static function install($name) {
    $structures = require NGN_ENV_PATH."/thm-four-modules/modules/$name/structures.php";
    foreach ($structures as $strName => $fields) {
      $fieldsManager = new DdFieldsManager($strName);
      foreach ($fields as $field) {
        if (($existingField = $fieldsManager->items->getItemByField('name', $field['name']))) {
          
          $f = Arr::filterByKeys($existingField, [
            'oid',
            'name',
            'title',
            'type',
            'required',
            'defaultDisallow',
            'notList',
            'editable',
            'virtual',
            'system',
            'filterable'
          ]);

          $fieldsManager->update($existingField['id'], $f);

        } else {
          $fieldsManager->create($field);
        }
      }
    }
  }

}