<?php
namespace Zero1\CronUpdateInProgressCheck\Plugin;

use Magento\Framework\App\Console\Response as ConsoleResponse;

class MagentoFrameworkAppCron
{
    const UPDATE_IN_PROGRESS_FLAG = '.update_in_progress.flag';

    protected $response;

    public function __construct(
        ConsoleResponse $response
    ){
        $this->response = $response;
    }

    public function aroundLaunch($obj, $callable)
    {
        if(!is_file(self::UPDATE_IN_PROGRESS_FLAG)){
            return $callable();
        }

        echo 'Found update in progress flag ('.self::UPDATE_IN_PROGRESS_FLAG.'), not running cron'.PHP_EOL;
    }
}