<?php

namespace App\Repositories;

use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class FormRepository
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
     * @param $driver
     * @param $playerId
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $message
     * @return bool
     */
    public function Submit($driver, $playerId, $firstName, $lastName, $email, $message)
    {
        $driver->get('https://www.easy.ac/en-us/support/apexlegends/contact/report/');
        $driver->findElement(WebDriverBy::id("player_id"))->sendKeys($playerId);
        $driver->findElement(WebDriverBy::id("first_name"))->sendKeys($firstName);
        $driver->findElement(WebDriverBy::id("last_name"))->sendKeys($lastName);
        $driver->findElement(WebDriverBy::id("email"))->sendKeys($email);
        $driver->findElement(WebDriverBy::id("message"))->sendKeys($message);
        $driver->findElement(WebDriverBy::cssSelector(
            '#submit-support-request-button-wrapper > input[type="submit"]'))->click();

        $driver->wait($this->waitFor, $this->waitPer)->until(
            WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::id('formSuccess'))
        );
        $element = $driver->findElement(WebDriverBy::id('formSuccess'));
        $css = $element->getCssValue('display');
        $driver->close();
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
