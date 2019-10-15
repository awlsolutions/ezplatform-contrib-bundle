<?php

/**
 * @copyright Copyright (C) Andrew W. Longosz.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace AWLSolutions\EzPlatformContribBundle\FieldType\RichText;

use eZ\Publish\Core\Persistence\Legacy\Content\FieldValue\Converter;
use eZ\Publish\Core\Persistence\Legacy\Content\StorageFieldDefinition;
use eZ\Publish\Core\Persistence\Legacy\Content\StorageFieldValue;
use eZ\Publish\SPI\Persistence\Content\FieldValue;
use eZ\Publish\SPI\Persistence\Content\Type\FieldDefinition;
use EzSystems\EzPlatformRichText\eZ\FieldType\RichText\Value;

/**
 * Decorator of \EzSystems\EzPlatformRichText\eZ\Persistence\Legacy\RichTextFieldValueConverter
 * with the ability to store default field value.
 */
final class FieldValueConverterDecorator implements Converter
{
    /** @var \eZ\Publish\Core\Persistence\Legacy\Content\FieldValue\Converter */
    private $richTextFieldValueConverter;

    public function __construct(
        Converter $richTextFieldValueConverter
    ) {
        $this->richTextFieldValueConverter = $richTextFieldValueConverter;
    }

    public function toStorageValue(FieldValue $value, StorageFieldValue $storageFieldValue)
    {
        $this->richTextFieldValueConverter->toStorageValue($value, $storageFieldValue);
    }

    public function toFieldValue(StorageFieldValue $value, FieldValue $fieldValue)
    {
        $this->richTextFieldValueConverter->toFieldValue($value, $fieldValue);
    }

    public function toStorageFieldDefinition(
        FieldDefinition $fieldDefinition,
        StorageFieldDefinition $storageFieldDefinition
    ) {
        $storageFieldDefinition->dataText5 = !empty($fieldDefinition->defaultValue->data)
            ? $fieldDefinition->defaultValue->data
            : null;
    }

    public function toFieldDefinition(
        StorageFieldDefinition $storageFieldDefinition,
        FieldDefinition $fieldDefinition
    ) {
        $fieldDefinition->defaultValue->data = !empty($storageFieldDefinition->dataText5)
            ? $storageFieldDefinition->dataText5
            : Value::EMPTY_VALUE;
    }

    public function getIndexColumn()
    {
        return $this->richTextFieldValueConverter->getIndexColumn();
    }
}
