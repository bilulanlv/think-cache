## 说明
由于[think-cache](https://github.com/top-think/think-cache)官方放弃了更新，且不支持php 8及以上，当使用ThinkORM做缓存时，如果使用webman的Cache类，tag功能无法使用。

故本项目提取自ThinkPHP 8最新的Cache模块，完美适配ThinkORM的缓存操作，以及字段缓存，tag和其他所有方法。

详细情况请查看[ThinkPHP8官方缓存文档](https://doc.thinkphp.cn/v8_0/caches.html)。
## 安装
```shell
composer require bilulanlv/think-cache
```

## 配置文件
配置文件自动安装路径在 config/plugin/bilulanlv/think-cache/app.php
```php
// 如果ThinkORM需要使用缓存，请取消注释，或者在其他合适的地方引入
//\think\facade\Db::setCache(new \Bilulanlv\ThinkCache\CacheManager());

return [
    // 默认缓存驱动
    'default' => 'redis',
    // 缓存连接方式配置
    'stores'  => [
        // redis缓存
        'redis' => [
            // 驱动方式
            'type' => 'redis',
            // 服务器地址
            'host' => '127.0.0.1',
            // 缓存前缀
            'prefix' => 'cache',
            // 默认缓存有效期 0表示永久缓存
            'expire'     => 0,
            // think-cache官方没有这个参数，由于生成的tag键默认不过期，如果tag键数量很大，避免长时间占用内存，可以设置一个超过其他缓存的过期时间，0为不设置
            'tag_expire' => 86400 * 7,
            // 缓存标签前缀
            'tag_prefix' => 'tag:',
        ],
        // 文件缓存
        'file' => [
            // 驱动方式
            'type' => 'file',
            // 设置不同的缓存保存目录
            'path' => runtime_path() . '/file/',
        ],
    ],
];
```
## 使用说明
```php
use Bilulanlv\ThinkCache\facade\ThinkCache;

ThinkCache::set('name', $value, 3600);
ThinkCache::remember('start_time', time());
ThinkCache::tag('tag')->set('name1','value1');
ThinkCache::tag('tag')->clear();

UserModel::where('id', 1)->cache($cache['key'], $cache['expire'], $cache['tag'])->find();
```