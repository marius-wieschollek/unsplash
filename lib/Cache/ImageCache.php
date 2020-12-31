<?php
/**
 * This file is part of the Unsplash App
 * and licensed under the AGPL.
 */

namespace OCA\Unsplash\Cache;

/**
 * Class ImageCache
 *
 * @package OCA\Unsplash\Cache
 */
class ImageCache extends AbstractCache {

    const CACHE_NAME = 'images';

    /**
     * @param $key
     *
     * @return string
     */
    function getRealKey($key): string {
        return "$key.jpg";
    }
}