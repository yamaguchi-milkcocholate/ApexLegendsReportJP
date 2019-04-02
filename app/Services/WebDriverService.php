<?php

namespace App\Services;

use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class WebDriverService
{
    /**
     * @var int
     */
    private $waitFor = 5;

    /**
     * @var int
     */
    private $waitPer = 1000;

    /**
     * @var ChromeDriverService
     */
    private $driver;

    /**
     * WebDriverService constructor.
     * @param ChromeDriverService $driverService
     */
    public function __construct(ChromeDriverService $driverService)
    {
        $this->driver = $driverService->Driver();
    }

    /**
     * @param $playerId
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $message
     * @return bool
     * @throws \Facebook\WebDriver\Exception\NoSuchElementException
     * @throws \Facebook\WebDriver\Exception\TimeOutException
     */
    public function Submit($playerId, $firstName, $lastName, $email, $message)
    {
        $this->driver->get('https://www.easy.ac/en-us/support/apexlegends/contact/report/');
        $this->driver->findElement(WebDriverBy::id("player_id"))->sendKeys($playerId);
        $this->driver->findElement(WebDriverBy::id("first_name"))->sendKeys($firstName);
        $this->driver->findElement(WebDriverBy::id("last_name"))->sendKeys($lastName);
        $this->driver->findElement(WebDriverBy::id("email"))->sendKeys($email);
        $this->driver->findElement(WebDriverBy::id("message"))->sendKeys($message);
        $this->driver->findElement(WebDriverBy::cssSelector(
            '#submit-support-request-button-wrapper > input[type="submit"]'))->click();

        $this->driver->wait($this->waitFor, $this->waitPer)->until(
            WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::id('formSuccess'))
        );
        $element = $this->driver->findElement(WebDriverBy::id('formSuccess'));
        $css = $element->getCssValue('display');
        $this->driver->close();
        if ('block' == $css)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
