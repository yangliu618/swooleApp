<?php
namespace framework;

use App\controller\DbController;
use App\controller\IndexController;

class App
{
    public static function run()
    {
        $http = new \Swoole\Http\Server('0.0.0.0', 9501);

        // todo 遍历所有控制器加载时实例化
        $container['IndexController'] = new IndexController();
        $container['DbController'] = new DbController();

        $http->on('request', function ($request, $response) use ($container) {
            //var_dump($request);
            //var_dump($response);

            // todo 路由处理
            $arr = explode('/', $request->server['request_uri']);
            $controller = ucfirst(!empty($arr[1]) ? $arr[1] : 'Index') . 'Controller';
            $action = $arr[2] ?? 'index';
            //var_dump($container);
            //var_dump($arr, memory_get_usage());
            $handler = array($container[$controller], $action);
            $params = array(1,2,3,4);

            if ( is_callable($handler) ) {
                $ret = call_user_func($handler , $params);
            } else {
                $ret = 'Can not callable !!!';
            }


            $response->header("Content-Type", "text/html; charset=utf-8");
            $response->end("<h1>Hello Swoole. #".rand(1000, 9999). '<hr>'. var_export($ret,true)."</h1>");
        });

        $http->start();
    }
}