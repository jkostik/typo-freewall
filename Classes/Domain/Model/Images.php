<?php
namespace WebSE\Freewall\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Images
 */

class Images extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
    /**
     * title
     *
     * @var string
     */
    protected $title;

    /**
     * description
     *
     * @var string
     */
    protected $description;

    /**
     * Fal image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image;

    /**
     * textposition
     *
     * @var string
     * @validate NotEmpty
     */
    protected $textposition;

    /**
     * styleclass
     *
     * @var string
     * @validate NotEmpty
     */
    protected $styleclass;


    /**
     * link
     *
     * @var string
     */
    protected $link;

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     * @return void
     */
    public function setImage($image) {
        $this->image = $image;
    }


    /**
     * Returns the text position
     *
     * @return string $textposition
     */
    public function getTextposition() {
        return $this->textposition;
    }

    /**
     * Sets the text position
     *
     * @param string $textposition
     * @return void
     */
    public function setTextposition($textposition) {
        $this->textposition = $textposition;
    }


    /**
     * Returns the style class
     *
     * @return string $styleclass
     */
    public function getStyleclass() {
        return $this->styleclass;
    }

    /**
     * Sets the style class
     *
     * @param string $styleclass
     * @return void
     */
    public function setStyleclass($styleclass) {
        $this->styleclass = $styleclass;
    }


    /**
     * Returns the link
     *
     * @return string $link
     */
    public function getLink() {
        return $this->link;
    }

    /**
     * Sets the link
     *
     * @param string $link
     * @return void
     */
    public function setLink($link) {
        $this->link = $link;
    }
	
}