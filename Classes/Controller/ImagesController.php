<?php
namespace WebSE\Freewall\Controller;


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
 * ImagesController
 */
class ImagesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * imagesRepository
	 *
	 * @var \WebSE\Freewall\Domain\Repository\ImagesRepository
	 * @inject
	 */
	protected $imagesRepository = NULL;

    /*
     * get a settings parameter
     * @param string
     * @return string
     */
    protected function getExtSettings($setting){
        $_extConfig = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][freewall]);
        $param = $_extConfig[$setting];
        return $param;
    }


        /**
	 * action list - einfach so
	 *
	 * @return void
	 */
	public function listAction() {
		$contentObject = $this->configurationManager->getContentObject();
		$contentElement = $contentObject->data;
		$contentuid = $contentElement['uid'];

		$this->view->assign('gallery', $this->imagesRepository->findByContentUid($contentuid));
        $this->view->assign('popupimgclass', $this->getExtSettings('imagePopupCssClass')); // CSS Class for PopUp Image
		$this->view->render();

	}

	/**
	 * action show
	 *
	 * @return void
	 */
	public function showAction() {
		$this->view->assign('show-action', 'Das ist nur eine Show Action');
		$this->view->render();
	}

	/**
	 * action new
	 *
	 * @param \WebSE\Freewall\Domain\Model\Images $newImages
	 * @ignorevalidation $newImages
	 * @return void
	 */
	public function newAction(\WebSE\Freewall\Domain\Model\Images $newImages = NULL) {
		$this->view->assign('newImages', $newImages);
	}

	/**
	 * action create
	 *
	 * @param \WebSE\Freewall\Domain\Model\Images $newImages
	 * @return void
	 */
	public function createAction(\WebSE\Freewall\Domain\Model\Images $newImages) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->imagesRepository->add($newImages);
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \WebSE\Freewall\Domain\Model\Images $images
	 * @ignorevalidation $images
	 * @return void
	 */
	public function editAction(\WebSE\Freewall\Domain\Model\Images $images) {
		$this->view->assign('images', $images);
	}

	/**
	 * action update
	 *
	 * @param \WebSE\Freewall\Domain\Model\Images $images
	 * @return void
	 */
	public function updateAction(\WebSE\Freewall\Domain\Model\Images $images) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->imagesRepository->update($images);
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \WebSE\Freewall\Domain\Model\Images $images
	 * @return void
	 */
	public function deleteAction(\WebSE\Freewall\Domain\Model\Images $images) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->imagesRepository->remove($images);
		$this->redirect('list');
	}

}
