#使用swoole开发简单框架

## 使用composer 的类自动引入, 可以使用componser init 根据提示步骤创建composer.json
```
{
    "name": "yangliu618/swoole-app",
    "description": "use composer to generate a swoole app",
    "type": "library",
    "authors": [
        {
            "name": "yangliu618",
            "email": "yangliu618@sina.com"
        }
    ],
    "minimum-stability": "dev",
    "autoload": {
        "psr-4": {
            "App\\": "application",
            "framework\\":"framework/core"
        },
        "files": []
    },
    "require": {
        "php": ">=7.2",
        "ext-swoole": ">=4.4"
    },
    "license": "proprietary"
}

```

## 需要php7 swoole4以上
