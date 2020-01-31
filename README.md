# セットアップ

## 1. 準備

* [Docker](https://www.docker.com/docker-mac)をインストールする。(インストール済みの場合はスキップ)
  * Dockerは非常に軽量なコンテナ型のアプリケーション実行環境です。<br>
    この研修で詳しい説明は省きますが興味があれば調べてみてください。

* Githubでアカウントを作成し、新規リポジトリを作成する。<br>
  右上の"+"マークの"New repository"から作成できる。

  * Githubで作成したリポジトリの Settings->Collaborators から研修担当者のGithubアカウントを追加する。

* Gitの初期設定
```base
$ git config --global user.name "<name>"
$ git config --global user.email "<email>"
```
`<name>、<email>` は便宜自分の物に書き換える。

## 2. 研修アプリの取得と作業用リポジトリへプッシュ

ここからCLIでの作業になるのでMacの`ターミナル`などを利用する。

研修アプリを取得した後、自分の作業用リポジトリへプッシュを行う。

```bash
# 研修用リポジトリをローカルにshopというディレクトリ名でクローン
git clone https://github.com/nakama-t/shop-template shop

# shopへ移動
cd shop

# originの変更
# [URL] にGithubで作成したリポジトリのURLを指定する
# (例 https://github.com/tanaka-t/laravel.git)
git remote set-url origin [URL]

# Githubにローカルリポジトリをプッシュ 
git push origin master
```

## 3. Laradockのセットアップ

Laradockを利用してDockerにLaravel開発環境を構築する。

```bash
# laradockをローカルにクローン
git submodule init
git submodule update

# laradockの設定ファイルの書き換え
./init.sh
```

## 4. Dockerコンテナの起動

```bash
cd laradock

docker-compose up -d nginx mysql mailhog
```

※初回起動はしばらく時間がかかります

## 5. Laravelのセットアップ

```bash
# 依存関係のインストール
docker-compose exec workspace composer install

# データベースのマイグレート&シードデータ投入
docker-compose exec workspace php artisan migrate --seed

# ストレージをリンク
docker-compose exec workspace php artisan storage:link

# 依存関係のインストール
docker-compose exec workspace yarn && yarn run dev
```

## 6. 動作確認

[http://localhost](http://localhost) にアクセスする。


# 研修アプリケーションの構成

```
~/shop
├── laradock     # Laradockディレクトリ(docker~系のコマンドはここで実行)
├── .laradock    # データディレクトリ(MySQLのデータベースはここに保存)
└── application  # プロジェクトディレクトリ(機能追加はここに対して行う)
```

## サービス起動/停止

```bash
# 起動
docker-compose up -d nginx mysql mailhog

# 停止
docker-compose down
```

## composer~ / php artisan~コマンドを実行する場合


```bash
# コンテナにbashでログインする
docker-compose exec workspace bash

# 任意のコードを実行
php artisan migrate

# コンテナからログアウト
exit
```

以下の書き方でもOK

```bash
# コンテナで`php artisan migrate`を実行
docker-compose exec workspace php artisan migrate
```

## MySQL

```bash
docker-compose exec mysql mysql -u default -p
```

コマンド実行後パスワードを聞かれるので "secret" と入力する。


# 課題

* フロントサイド、管理サイドのURL分離
  * http://localhost
  * http://localhost/admin

* 管理側のログイン、ログアウト
  * メールアドレス admin@a.com
  * パスワード pass

上記の機能は実装済みなのでその他機能について[設計書](https://drive.google.com/drive/folders/1VFdG8qzfwZx5flaXMUbYZU_Xnvp7yPm5?usp=sharing)を参考に実装をすすめる。

適度にブランチをきって開発しGithubでプルリクエストを作成。

研修担当者にレビューしてもらってください。

インターネットでドキュメント検索の際はバージョンに注意してください。
* Laravel 6.13 (Laravel 6系)
* Bootstrap 4.4 (Bootstrap 4系)
