<?php
namespace OCA\Appointments\Settings;

use OCP\IL10N;
use OCP\IURLGenerator;
use OCP\Settings\IIconSection;

class Section implements IIconSection {

	/** @var string */
	protected $appName;

        /** @var IL10N */
        private $l;

        /** @var IURLGenerator */
        private $urlGenerator;

        public function __construct(string $appName, IL10N $l, IURLGenerator $urlGenerator) {
		$this->appName = $appName;
                $this->l = $l;
                $this->urlGenerator = $urlGenerator;
        }

        /**
         * returns the ID of the section. It is supposed to be a lower case string
         *
         * @returns string
         */
        public function getID() {
		return $this->appName;
        }

        /**
         * returns the translated name as it should be displayed, e.g. 'LDAP / AD
         * integration'. Use the L10N service to translate it.
         *
         * @return string
         */
        public function getName() {
                return $this->l->t('Appointments');
        }

        /**
         * @return int whether the form should be rather on the top or bottom of
         * the settings navigation. The sections are arranged in ascending order of
         * the priority values. It is required to return a value between 0 and 99.
         */
        public function getPriority() {
                return 10;
        }

        /**
         * @return The relative path to a an icon describing the section
         */
        public function getIcon() {
		return $this->url->imagePath($this->appName, 'app-dark.svg');
        }

}