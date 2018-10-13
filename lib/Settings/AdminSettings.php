<?php
/**
 * This file is part of the Unsplash App
 * and licensed under the AGPL.
 */

namespace OCA\Unsplash\Settings;

use OCA\Unsplash\ImageProvider\ImageProviderInterface;
use OCA\Unsplash\Services\AppSettingsService;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IURLGenerator;
use OCP\Settings\ISettings;

/**
 * Class AdminSettings
 *
 * @package OCA\Unsplash\Settings
 */
class AdminSettings implements ISettings {

    /**
     * @var IURLGenerator
     */
    protected $urlGenerator;

    /**
     * @var AppSettingsService
     */
    protected $settings;

    /**
     * @var ImageProviderInterface
     */
    protected $imageProvider;

    /**
     * AdminSection constructor.
     *
     * @param IURLGenerator          $urlGenerator
     * @param AppSettingsService     $settings
     * @param ImageProviderInterface $imageProvider
     */
    public function __construct(IURLGenerator $urlGenerator, AppSettingsService $settings, ImageProviderInterface $imageProvider) {
        $this->urlGenerator  = $urlGenerator;
        $this->settings      = $settings;
        $this->imageProvider = $imageProvider;
    }

    /**
     * @return TemplateResponse returns the instance with all parameters set, ready to be rendered
     */
    public function getForm(): TemplateResponse {
        return new TemplateResponse('unsplash', 'settings/admin', [
            'saveSettingsUrl' => $this->urlGenerator->linkToRouteAbsolute('unsplash.admin_settings.set'),
            'styleLogin'      => $this->settings->isLoginEnabled(),
            'styleHeader'     => $this->settings->isHeaderEnabled(),
            'keepImage'       => $this->settings->imagePersistenceEnabled(),
            'apiQuery'        => $this->settings->getImageSubject(),
            'apiKey'          => $this->settings->getApiKey(),
            'subjects'        => $this->imageProvider->getSubjects()
        ]);
    }

    /**
     * @return string the section ID, e.g. 'sharing'
     */
    public function getSection(): string {
        return 'theming';
    }

    /**
     * @return int whether the form should be rather on the top or bottom of
     * the admin section. The forms are arranged in ascending order of the
     * priority values. It is required to return a value between 0 and 100.
     */
    public function getPriority(): int {
        return 75;
    }
}