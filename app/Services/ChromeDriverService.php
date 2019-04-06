<?php

namespace App\Services;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Chrome\ChromeDriver;

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
        /*
        $this->seleniumServerUrl = 'http://0.0.0.0:4444/wd/hub';
        $this->options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless',
            '--window-size=1920,1080',
            '--no-sandbox',
            '--disable-setuid-sandbox'
        ]);
        */
        putenv('webdriver.chrome.driver=/app/.chromedriver/bin/chromedriver');
        $options = new ChromeOptions();
        $chromeBinary = getenv("GOOGLE_CHROME_SHIM");
        $options->setBinary($chromeBinary);
        $this->options = $options;
    }

    /**
     * @return RemoteWebDriver
     */
    public function Driver()
    {
        /*
        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $this->options);
        $driver = RemoteWebDriver::create($this->seleniumServerUrl, $capabilities);
        return $driver;
        */
        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $this->options);
        return ChromeDriver::start($capabilities);
    }
}
