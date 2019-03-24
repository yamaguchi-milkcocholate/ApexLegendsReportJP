<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\Chrome\ChromeOptions;

class ReportController extends Controller
{
    public function Report()
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless',
            '--window-size=1920,1080',
            '--no-sandbox'
        ]);
        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $options);
        $driver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
        // 画面サイズをMAXに
        $driver->manage()->window()->maximize();
        // 指定URLへ遷移 (Google)
        $driver->get('https://www.google.co.jp/');
        // 検索Box
        $element = $driver->findElement(WebDriverBy::name('q'));
        // 検索Boxにキーワードを入力して
        $element->sendKeys('セレニウムで自動操作');
        // 検索実行
        $element->submit();

        // 検索結果画面のタイトルが 'セレニウムで自動操作 - Google 検索' になるまで10秒間待機する
        // 指定したタイトルにならずに10秒以上経ったら
        // 'Facebook\WebDriver\Exception\TimeOutException' がthrowされる
        $driver->wait(10)->until(
            WebDriverExpectedCondition::titleIs('セレニウムで自動操作 - Google 検索')
        );

        // キャプチャ
        $file = __DIR__ . '/' . __METHOD__ . "_chrome.png";
        $driver->takeScreenshot($file);

        // ブラウザを閉じる
        $driver->close();
    }
}
