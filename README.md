# docker-laravel-vue

## 導入手順

1.```git clone```する

2.```docker-compose.yml```のディレクトリでビルド
　
 ```docker-compose build```

3.コンテナ立ち上げ
　
 ```docker-compose up -d```

### ポートフォワーディング

* 8000→php
* 80→phpmyadmin
* 3306→MySql


### laravel

* docker-compose exec app bashで入ってcomposerを使って
　<br>```composer create-project --prefer-dist laravel/laravel my-laravel-app```
  <br>で作ってください


.envとvendorディレクトリは各laravelプロジェクトごとに異なるため、プロジェクトをpullしcomposer updateと.envsampleー＞.envに変更する

またlaravelプロジェクトをpullして取得する場合はapplication keyが作成されていないため、
```php artisan key:generate```
を実行する

同じくpullした場合はnode_modulesもローカルでインストールする必要がある
```npm run install```
