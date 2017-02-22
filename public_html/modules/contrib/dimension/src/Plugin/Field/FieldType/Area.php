<?php

/**
 * @file
 * Contains \Drupal\dimension\Plugin\Field\FieldType\Area
 */

namespace Drupal\dimension\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\dimension\Plugin\Field\AreaTrait;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Field\Annotation\FieldType;

/**
 * Plugin implementation of the 'area_field_type' field type.
 *
 * @FieldType(
 *   id = "area_field_type",
 *   label = @Translation("Dimension: Area"),
 *   description = @Translation("Define width and height"),
 *   default_widget = "area_field_widget",
 *   default_formatter = "area_field_formatter"
 * )
 */
class Area extends Dimension {

  use AreaTrait;

  /**
   * {@inheritdoc}
   */
  public static function defaultStorageSettings() {
    return parent::_defaultStorageSettings(self::fields());
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    return self::_defaultFieldSettings(self::fields());
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    return parent::_propertyDefinitions($field_definition, self::fields());
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return parent::_schema($field_definition, self::fields());
  }

}