<?php

use Drupal\webform\Entity\Webform;

foreach (Webform::loadMultiple() as $id => $webform) {
  echo "Webform: $id\n";
  echo "Elements:\n";
  print_r(array_keys($webform->getElementsDecoded()));
  echo "---------------------\n\n";
}
