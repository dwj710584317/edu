<?php
/**
 * Created by PhpStorm.
 * User: Deng
 * Date: 2019/1/21 0021
 * Time: 15:36
 */
namespace fastphp;

define('CORE_PATH') or define('CORE_PATH',__DIR__);

class Fastphp{
    protected $config=[];

    public function __construct($config)
    {
        $this->config=$config;
    }

    public function run()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    // 自动加载类
    public function loadClass($className)
    {
        $classMap = $this->classMap();

        if (isset($classMap[$className])) {
            // 包含内核文件
            $file = $classMap[$className];
        } elseif (strpos($className, '\\') !== false) {
            // 包含应用（application目录）文件
            $file = APP_PATH . str_replace('\\', '/', $className) . '.php';
            if (!is_file($file)) {
                return;
            }
        } else {
            return;
        }

        include $file;

        // 这里可以加入判断，如果名为$className的类、接口或者性状不存在，则在调试模式下抛出错误
    }
}