## プロダクト作成手順

### 導入手順

1.```git clone```する

2.```docker-compose.yml```のディレクトリでビルド
　
 ```docker-compose build```

3.コンテナ立ち上げ
　
 ```docker-compose up -d```

#### ポートフォワーディング

* 8000→php
* 80→phpmyadmin
* 3306→MySql


#### laravelプロジェクト作成後の手順

* docker-compose exec app bashで入ってcomposerを使って
　<br>```composer create-project --prefer-dist laravel/laravel my-laravel-app```
  <br>を実行


* .envとvendorディレクトリは各laravelプロジェクトごとに異なるため、<br>
プロジェクトをpullしcomposer updateと.envsampleー＞.envに変更する

* またlaravelプロジェクトをpullして取得する場合はapplication keyが作成されていないため、
```php artisan key:generate```
を実行

* テスト用のDBを使う場合は.envとは別途、.env.testingを用意しphpunit.xmlにその環境を用いることを記述する

* 同じくpullした場合はnode_modulesもローカルでインストールする必要がある
```npm install```

#### ホットリロード
Dockerなのでホットリロードを開発環境で使う場合は

npm run watch-poll
