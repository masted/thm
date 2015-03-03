<?php

class DdoFour extends Ddo {

  protected function itemElements(array $item) {
    return new DdoItemElementsFour($this, $item);
  }

}
