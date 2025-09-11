<?php

use Drupal\webform\Entity\Webform;

// Load all webforms.
foreach (Webform::loadMultiple() as $id => $webform) {
  echo "=============================\n";
  echo "Webform ID: $id\n";
  echo "Title: " . $webform->label() . "\n";
  echo "=============================\n\n";

  // RAW YAML schema (kung ano nasa config).
  echo "RAW YAML (as stored in config):\n";
  echo $webform->get('elements') . "\n\n";

  // Decoded schema (PHP array).
  echo "DECODED ELEMENTS (array):\n";
  print_r($webform->getElementsDecoded());
  echo "\n";

  // Handlers (email, custom, etc.)
  echo "HANDLERS:\n";
  foreach ($webform->getHandlers() as $handler) {
    echo "- Handler ID: " . $handler->id() . "\n";
    echo "  Label: " . $handler->label() . "\n";
    echo "  Type: " . $handler->getPluginId() . "\n";
  }
  echo "\n";

  // Validators (kung meron naka-configure).
  echo "VALIDATORS:\n";
  $validators = $webform->get('validators');
  if (!empty($validators)) {
    print_r($validators);
  }
  else {
    echo "- No custom validators found.\n";
  }

  echo "\n------------------------------------\n\n";
}
