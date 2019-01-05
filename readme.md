## Weather

PHP天气查询扩展组件

#### 安装

```
composer require hesunfly/weather
```

#### 使用

使用前需要在高德地图开放平台申请天气查询接口的key。

发布配置文件：

php artsian vendor:publish  --provider="Hesunfly\LaravelWeather\WeatherServiceProvider"

config会生成weather.php配置文件，在.env文件中添加 'WEATHER_KEY'配置型，值为高德开放平台天气查询接口的key。

##### 代码示例

基本使用：

1. 获取实时天气：

```
use Hesunfly\Weather\Weather;

$weather = new Weather('高德地图key');

$weather->currenct('城市名称');
```

2. 获取预告天气：

```
use Hesunfly\Weather\Weather;

$weather = new Weather('高德地图key');

$weather->forecast('城市名称');
```

3. 获取xml形式的数据：

```
use Hesunfly\Weather\Weather;

$weather = new Weather('高德地图key');

$weather->currenct('城市名称', 'xml');
```

## License

MIT