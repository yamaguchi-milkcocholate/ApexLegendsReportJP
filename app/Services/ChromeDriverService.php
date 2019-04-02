<?php

namespace App\Services;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

/**
 * Class ChromeDriverService
 * @package App\Services
 */
class ChromeDriverService
{
    /**
     * @var string
     */
    private $seleniumServerUrl;

    /**
     * @var ChromeOptions
     */
    private $options;

    public function __construct()
    {
        $this->seleniumServerUrl = 'http://localhost:4444/wd/hub';
        $this->options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless',
            '--window-size=1920,1080',
            '--no-sandbox',
            '--disable-setuid-sandbox'
        ]);
    }

    /**
     * @return RemoteWebDriver
     */
    public function Driver()
    {
        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $this->options);
        $driver = RemoteWebDriver::create($this->seleniumServerUrl, $capabilities);
        return $driver;
    }
}
