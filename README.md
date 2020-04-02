# Boardgame-reviews
- Laravel 6.10.1
- PHP 7.4.1
- MySQL
- Vue.js(vuex,vue router)

## ERD
![color:ff69b4](https://github.com/Kobatai/boardgame-reviews/blob/master/boardgame-reviews/doc/er.svg)

## Infrastructure
![color:ff69b4](https://github.com/Kobatai/boardgame-reviews/blob/master/boardgame-reviews/doc/AWS.svg)

## 機能一覧

 * ボードゲームカフェの一覧を表示する
<a href="https://gyazo.com/48730684f51b8e072dc79106d3959b27"><img src="https://i.gyazo.com/48730684f51b8e072dc79106d3959b27.gif" alt="Image from Gyazo" width="1000"/></a>

 * ボードゲームカフェのサジェスト検索をする
<a href="https://gyazo.com/1a8768dcbb36af919783829df6a20edf"><img src="https://i.gyazo.com/1a8768dcbb36af919783829df6a20edf.gif" alt="Image from Gyazo" width="1000"/></a>
 
一覧で表示するときに取ってきた全てのボードゲームカフェの情報から、
名前だけサジェスト用に別の配列で持っておいて検索できるようにしています。

 * 東京23区ごとのボードゲームカフェの一覧を表示する
 
<a href="https://gyazo.com/f4f2be20faf560832c30026562f6079f"><img src="https://i.gyazo.com/f4f2be20faf560832c30026562f6079f.gif" alt="Image from Gyazo" width="1000"/></a>

23区のidをルートパラメータから受け取り、それを元に絞り込みをしています

 * ボードゲームカフェを条件によってソートと絞り込みをする
<a href="https://gyazo.com/6e4482e68c3c7fc9306cc63c6a716855"><img src="https://i.gyazo.com/6e4482e68c3c7fc9306cc63c6a716855.gif" alt="Image from Gyazo" width="1000"/></a>
ソートと条件のoptionを算出プロパティで監視し、
変更があればlaravelのAPIを呼びそのパターンのSQLを発行し検索するようにしています
 * ボードゲームカフェをお気に入りに登録する（ログイン後のみ）
<a href="https://gyazo.com/3c2cebc9a7fdb6f5090f74a2bd9f0d29"><img src="https://i.gyazo.com/3c2cebc9a7fdb6f5090f74a2bd9f0d29.gif" alt="Image from Gyazo" width="1000"/></a>

お気に入りボタンを押すことでlikesテーブルにshop_idとuser_idの組み合わせで保存し、
その数を表示しています。

またお気に入りしたカフェはプロフィールのところから一覧で見ることができるようにしています
<img width="1147" alt="スクリーンショット 2020-04-02 17.28.15.png" src="https://qiita-image-store.s3.ap-northeast-1.amazonaws.com/0/362153/19167794-78cf-813d-5bb5-b822d744cc0c.png">


 * ボードゲームカフェにレビューをする（ログイン後のみ）
<a href="https://gyazo.com/48a4f89f6e4307b7acfa31f215db453b"><img src="https://i.gyazo.com/48a4f89f6e4307b7acfa31f215db453b.gif" alt="Image from Gyazo" width="1000"/></a>
レビューはログインしないとできないようにしています
またレビューの一覧はvue elementでスクロールするたびに読み込むようにしています。

 * 会員登録する
<img width="1184" alt="スクリーンショット 2020-03-31 21.45.59.png" src="https://qiita-image-store.s3.ap-northeast-1.amazonaws.com/0/362153/f840d745-c217-9fbb-835f-cd8b8b97b7a4.png">
 

 * 会員情報を編集する（ログイン後のみ）
 <a href="https://gyazo.com/00e32c0fe9123e90d1d4721659f7bf2e"><img src="https://i.gyazo.com/00e32c0fe9123e90d1d4721659f7bf2e.gif" alt="Image from Gyazo" width="1000"/></a>
 
プロフィール画像と認証情報を編集できるようにしています
プロフィール画像はS3のアイコン画像用のディレクトリにuser_idで保存し、変更があればupdateするようにしています

 * 退会をする
<a href="https://gyazo.com/d7bceaf443420e7412311c3e78877d71"><img src="https://i.gyazo.com/d7bceaf443420e7412311c3e78877d71.gif" alt="Image from Gyazo" width="1000"/></a>
認証情報のパスワードを入力することで退会できるようにしています（できればして欲しくないですが:cry:)

 * ログインする
 <a href="https://gyazo.com/a743de743d95b6757a07afbd7cf72aeb"><img src="https://i.gyazo.com/a743de743d95b6757a07afbd7cf72aeb.gif" alt="Image from Gyazo" width="1000"/></a>

 * ログアウトする（ログイン後のみ）
 <a href="https://gyazo.com/dd8afc730ffa04befa3fbf51895e7ed4"><img src="https://i.gyazo.com/dd8afc730ffa04befa3fbf51895e7ed4.gif" alt="Image from Gyazo" width="1000"/></a>
