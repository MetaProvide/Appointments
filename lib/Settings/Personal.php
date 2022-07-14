<?php

namespace OCA\Appointments\Settings;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\BackgroundJob\IJobList;
use OCP\IConfig;
use OCP\IDateTimeFormatter;
use OCP\IL10N;
use OCP\Settings\ISettings;

class Personal implements ISettings
{
	/** @var string */
	protected $appName;

	/** @var IConfig */
	private $config;

	/** @var IL10N */
	private $l;

	/** @var IDateTimeFormatter */
	private $dateTimeFormatter;

	/** @var IJobList */
	private $jobList;

	/**
	 * Admin constructor.
	 *
	 * @param Collector $collector
	 * @param IConfig $config
	 * @param IL10N $l
	 * @param IDateTimeFormatter $dateTimeFormatter
	 * @param IJobList $jobList
	 */
	public function __construct(
		$appName,
		IConfig $config,
		IL10N $l,
		IDateTimeFormatter $dateTimeFormatter,
		IJobList $jobList
	) {
		$this->appName = $appName;
		$this->config = $config;
		$this->l = $l;
		$this->dateTimeFormatter = $dateTimeFormatter;
		$this->jobList = $jobList;
	}

	/**
	 * @return TemplateResponse
	 */
	public function getForm()
	{

		return new TemplateResponse($this->appName, 'personal-settings', [], '');
	}

	/**
	 * @return string the section ID, e.g. 'sharing'
	 */
	public function getSection()
	{
		return $this->appName;
	}

	/**
	 * @return int whether the form should be rather on the top or bottom of
	 * the admin section. The forms are arranged in ascending order of the
	 * priority values. It is required to return a value between 0 and 100.
	 */
	public function getPriority()
	{
		return 5;
	}
}
