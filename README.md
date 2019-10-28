# This is Meisha Education Server php SDK.

----
## Install:
### 1.Using private repositories, add repo type/path and package name into `composer.json`
```json
{
  "repositories": [
    {
      "type": "git",
      "url": "https://gitlab.meishakeji.com/meisha-common/education_php_sdk.git"
    }
  ],
  "require": {
    "meisha/education_php_sdk": "*"
  }
}
```
### 2.Update compose
```
composer require meisha/education_php_sdk
```

### 3.use

```
在app.php里面引入
EduServer::setEnv('prod');

然后在用的地方
use MeiSha\Education\EduServer;
$retData = EduServer::getClassByClassId('d67bec64ee04c4a8');
```
