<?php
/*
 * @Date         : 2022-03-02 14:49:25
 * @LastEditors  : Jack Zhou <jack@ks-it.co>
 * @LastEditTime : 2022-03-02 17:22:16
 * @Description  : 
 * @FilePath     : /recruitment-php-code-test/tests/App/DemoTest.php
 */

namespace Test\App;

use App\App\Demo;
use App\Service\AppLogger;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase {

   /* public function test_foo() {

    }*/

    public function test_get_user_info() {
        $httpRequest = new HttpRequest();
        $log = new AppLogger();
        $demo = new Demo($log, $httpRequest);
        $result = $demo->get_user_info();
        var_dump($result);
    }
}