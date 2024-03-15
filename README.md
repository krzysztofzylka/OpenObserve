# OpenObserve library

## Configure
```php
\Krzysztofzylka\OpenObserve\OpenObserve::$USERNAME = '';
\Krzysztofzylka\OpenObserve\OpenObserve::$PASSWORD = '';
\Krzysztofzylka\OpenObserve\OpenObserve::$HOST = 'http://127.0.0.1:5080';
\Krzysztofzylka\OpenObserve\OpenObserve::$STREAM = 'default';
\Krzysztofzylka\OpenObserve\OpenObserve::$ORGANIZATION = 'default';
\Krzysztofzylka\OpenObserve\OpenObserve::$SSLVERIFYPEER = false;
```

## Send log
```php
public static function send(
    string $message,
    string $level = 'INFO',
    array $data = []
)
```
Example
```php
\Krzysztofzylka\OpenObserve\OpenObserve::send(
    'message',
    'INFO',
    ['additional' => 'data']
)
```
Log:
```json
{"_timestamp":1710530478602382,"additional":"data","level":"INFO","message":"message"}
```