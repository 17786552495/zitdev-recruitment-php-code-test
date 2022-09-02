<?php

namespace App\Service;

use think\facade\Log;
use think\LogManager;

class AppLogger
{
    protected $type = '';
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINKLOG = 'think-log';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        $this->type =  $type;
        if ($type == self::TYPE_LOG4PHP) {
            \Logger::configure('vendor/apache/log4php/config.xml');
            $this->logger = \Logger::getLogger('log4php');
        }elseif ($type == self::TYPE_THINKLOG){
            $this->logger = Log::instance();
            $this->logger->init([
                'default'  => 'file',
                'channels' => [
                    'file' => [
                        'type' => 'file',
                        'path' => './thinkLog/',
                    ],
                ],
            ]);
        }
    }

    public function changeUpper($message)
    {
        if ($this->type === self::TYPE_THINKLOG){
            $message = strtoupper($message);
        }
        return $message;
    }

    public function info($message = '')
    {
        $message = $this->changeUpper($message);
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $message = $this->changeUpper($message);
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $message = $this->changeUpper($message);
        $this->logger->error($message);
    }
}