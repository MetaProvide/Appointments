<?php

namespace OCA\Appointments\Settings;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\IConfig;
use OCP\IURLGenerator;
use OCP\IL10N;
use OCP\Settings\ISettings;
use OCP\IUserSession;
use OCA\Appointments\Backend\BackendUtils;

class Personal implements ISettings
{
	/** @var string */
	protected $appName;

	/** @var string */
	private $userId;

	/** @var IConfig */
	private $config;

	/** @var IL10N */
	private $l;
	
	/** @var BackendUtils */
	private $appointmentsUtils;

	/** @var IURLGenerator */
	private $urlGenerator;

	/**
	 * Personal constructor.
	 *
	 * @param Collector $collector
	 * @param IConfig $config
	 * @param IL10N $l
	 */
	public function __construct(
		string $appName,
		IConfig $config,
		IL10N $l,
        IURLGenerator $urlGenerator,
		BackendUtils $appointmentsUtils,
		IUserSession $userSession
	) {
		$this->appName = $appName;
		$this->config = $config;
		$this->l = $l;
		$this->appointmentsUtils = $appointmentsUtils;
		$this->userId = $userSession->getUser()->getUID();
		$this->urlGenerator = $urlGenerator;
	}

	/**
	 * @return TemplateResponse
	 */
	public function getForm()
	{
		$formToken = $this->appointmentsUtils->getToken($this->userId);
		$settings = $this->appointmentsUtils->getUserSettings('org_info',$this->userId);
		$prepTime = $this->appointmentsUtils->getUserSettings('calendar_settings', $this->userId)['prepTime'];
		$publicPageUrl = $this->urlGenerator->getBaseUrl() . "/apps/appointments/pub/" . $formToken . "/form";
		$embedPageUrl = $this->urlGenerator->getBaseUrl() . "/apps/appointments/embed/" . $formToken . "/form";
		$timezone = $this->config->getUserValue($this->userId, $this->appName, "timezone", 'UTC');

		//$lastSentReportTime = $this->config->getAppValue($this->appName, 'org-name', 0);
		$parameters = [
			'public-page-url' => $publicPageUrl,
			'embed-url' => $embedPageUrl,
			'phone' => $settings['phone'],
			'email'=> $settings['email'],
			'name'=> $settings['organization'],
			'prepTime' => $prepTime,
			'timezone' => $timezone
		];
		return new TemplateResponse($this->appName, 'personal-settings', $parameters, '');
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
