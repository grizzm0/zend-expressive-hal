<?php
/**
 * @see       https://github.com/zendframework/zend-expressive-hal for the canonical source repository
 * @copyright Copyright (c) 2017 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-expressive-hal/blob/master/LICENSE.md New BSD License
 */

namespace Zend\Expressive\Hal\Exception;

use RuntimeException;

class UnknownMetadataTypeException extends RuntimeException implements Exception
{
    public static function forMetadata(Metadata\AbstractMetadata $metadata) : self
    {
        return new self(sprintf(
            'Encountered unknown metadata type %s; no strategy available for creating resource from this metadata',
            get_class($metadata)
        ));
    }

    public static function forInvalidMetadataClass(string $metadata) : self
    {
        return new self(sprintf(
            'Invalid metadata type "%s"; does not exist, or does not extend %s',
            $metadata,
            Metadata\AbstractMetadata::class
        ));
    }
}
