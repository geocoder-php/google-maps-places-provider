<?php

declare(strict_types=1);

/*
 * This file is part of the Geocoder package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT License
 */

namespace Geocoder\Provider\GoogleMapsPlaces\Model;

/**
 * @author atymic <atymicq@gmail.com>
 */
class Photo
{
    /**
     * @var string
     */
    private $photoReference;

    /**
     * @var int
     */
    private $height;

    /**
     * @var int
     */
    private $width;

    /**
     * @var string[]
     */
    private $htmlAttributions = [];

    /**
     * @param string[] $htmlAttributions
     */
    public function __construct(string $photoReference, int $height, int $width, array $htmlAttributions)
    {
        $this->photoReference = $photoReference;
        $this->height = $height;
        $this->width = $width;
        $this->htmlAttributions = $htmlAttributions;
    }

    public function getPhotoReference(): string
    {
        return $this->photoReference;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return string[]
     */
    public function getHtmlAttributions(): array
    {
        return $this->htmlAttributions;
    }

    /**
     * @param \stdClass[] $photos
     *
     * @return self[]
     */
    public static function getPhotosFromResult(array $photos): array
    {
        return array_map(function ($photo) {
            return new self(
                $photo->photo_reference,
                $photo->height,
                $photo->width,
                $photo->html_attributions
            );
        }, $photos);
    }
}
