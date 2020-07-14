# Laravel First App --TaskList--
<time>2020-07-14</time>

## アプリ概要

## 作成メモ

### 作成環境
- CentOS 6.8 (Vagrant)
- PHP 7.3.20
- Laravel Framework 7.19.1
- ~~mysql  Ver 14.14 Distrib 5.6.49, for Linux (x86_64) using  EditLine wrapper~~
- mysql  Ver 15.1 Distrib 10.3.23-MariaDB, for Linux (x86_64) using readline 5.1

### サーバー要件確認
<a href=https://laravel.com/docs/7.x>laravel.com</a>
<details>
<summary>Homestead を使うのおすすめ</summary>
<pre>
<code>
Laravelフレームワークにはいくつかのシステム要件があります。これらの要件はすべてLaravel Homestead仮想マシンによって満たされるため、ローカルのLaravel開発環境としてHomesteadを使用することを強くお勧めします。

ただし、Homesteadを使用していない場合は、サーバーが次の要件を満たしていることを確認する必要があります。

PHP> = 7.2.5
BCMath PHP拡張
Ctype PHP拡張
Fileinfo PHP拡張
JSON PHP拡張
Mbstring PHP拡張
OpenSSL PHP拡張
PDO PHP拡張
Tokenizer PHP拡張
XML PHP拡張
</code>
</pre>
</details>

今回は、学習のため使用しない。

`php -m`

`yum install php-[extension]`



### pj作成
`laravel new taskList`


### DB準備
`mysql -u root`  
`create database laravel_task`  

- [project_root]/.env  
<code>
    DB_DATABASE=laravel_task  
    DB_USERNAME=root  
    DB_PASSWORD=[password]  
</code>

omake  
`show databases`  
`drop databases [dbname]`
`status`

### local IP で実行
- ip と port を指定して実行  
<code>php artisan serve --host 192.168.33.11 --port 8080</code>

### MariaDB用設定(追加)

<div style="font-size:12px; background-color: #333; display: inline;">
    [pjname]\app\Providers\AppServiceProvider.php
</div>

``` php
use Illuminate\Support\Facades\Schema;      // for MariaDB
```

### マイグレーション
| 操作| 操作| 補足 |
| :---: | :--- | :--- |
|作成  | `php artisan make:migration create_task_table --create=task` | __オプション__<br> `--create=[table_name]` |
|実行  | `php artisan migrate` | |
|追加  | `php artisan migrate:refresh` | |
|バージョン確認<br>(おまけ)  | `php artisan --vestion` | |


[トラブル:マイグレーション実行時のエラー](#マイグレーション実行時のエラー)

- 成功画面
    ``` Console
    [vagrant@localhost taskList]$ php artisan migrate
    Migration table created successfully.
    Migrating: 2014_10_12_000000_create_users_table
    Migrated:  2014_10_12_000000_create_users_table (0.03 seconds)
    Migrating: 2014_10_12_100000_create_password_resets_table
    Migrated:  2014_10_12_100000_create_password_resets_table (0.03 seconds)
    Migrating: 2019_08_19_000000_create_failed_jobs_table
    Migrated:  2019_08_19_000000_create_failed_jobs_table (0.01 seconds)
    Migrating: 2020_07_14_000911_create_task_table
    Migrated:  2020_07_14_000911_create_task_table (0.01 seconds)
    ```


## トラブル

### マイグレーション実行時のエラー

DBのバージョンが古かった
→ Laravel5.4からutf8mb4(絵文字)サポートしたことで、古いmariaDB、MySQLでエラーが発生する。


<div style="font-size:12px; background-color: #333; display: inline;">
    2014_10_12_000000_create_users_table.php
</div>

`20: $table->timestamp('email_verified_at')->nullable();`

<div style="font-size:12px; background-color: #333; display: inline;">
    error message
</div>

<code>SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table `users` add unique `users_email_unique`(`email`))</code>

https://qiita.com/beer_geek/items/6e4264db142745ea666f
<br>
<br>
<br>

旧verのDBで続行するならば、AppServiceProvider.phpに設定追加することで解決できる模様  
./app/Providers/AppServiceProvider.php

``` php
use Illuminate\Support\Facades\Schema;
public function boot()
{
    Schema::defaultStringLength(191);
}
```

### MySQL → MariaDB(未整理)

yumのデフォルト設定では署名の検証ができないRPMパッケージはインストールできない。また、署名がされているRPMパッケージでも、それに対応する公開鍵がローカルにインストールされていない場合はインストールができない。署名がされているRPMパッケージをインストールしたい場合、署名に使用した鍵の公開鍵を以下のようにしてインポートしておく必要がある。


`sudo rpm --import https://yum.mariadb.org/RPM-GPG-KEY-MariaDB`

`vi /etc/yum.repos.d/mariadb.repo`  
[mariadb]
name=MariaDB
baseurl=http://yum.mariadb.org/10.3/centos/6.8/x86_64/
gpgkey=https://yum.mariadb.org/RPM-GPG-KEY-MariaDB
gpgcheck=1


baseurl http://yum.mariadb.org/ から探す
gpgkey rpm --importしたurlを設定
gpgcheck 0で署名の検証を省略する。署名なしRPMパッケージを無制限にインストールできてしまうことになる。

yum install MariaDB-devel MariaDB-client MariaDB-server

トランザクションの確認エラーの対処法  

<del>

    `yum install MariaDB-devel MariaDB-client MariaDB-server`

    MariaDBを導入しよう以上のコマンドを入力したら、
    トランザクションの確認エラーと表示されました。
    エラーの意味を調べてみると古いレポジトリと新しいレポジトリが衝突しているということがわかりました。

    ※レポジトリ
    ファイルやプログラム、設定情報などの貯蔵庫のこと
    
    エラー対応
    $sudo yum clean all
    すべてのキャッシュ(rpmファイルなど）を削除しました。
    
    $sudo yum update
    次に、yumのアップデートをして最新のものを入手しました。
</del>

解決しないので、*をつけて再度mysqlの削除をする  
`yum remove mysql*`  
`yum install MariaDB-devel MariaDB-client MariaDB-server`

OK！

- まずは、mariadbを立ち上げる  
    `/etc/init.d/mysql start`

        systemctl enable mariadb.service
        systemctl start mariadb.service

- 最低限のセキュリティ設定を行う  
    - rootパスの設定
    - 匿名ユーザーあり(パスは要別途設定)
    - localhost以外からのrootアクセスを拒否しない(暫定)

    `SET PASSWORD FOR ''@'localhost' = PASSWORD('newpwd');`

    `mysql_secure_installation`  
    https://www.ipentec.com/document/software-mariadb-mysql-secure-installation

- 動作確認と文字コード設定
    ``` Console
    mysql -u root -p
    Enter password:
    MariaDB [(none)]>

    MariaDB [(none)]> status
    Server characterset: latin1
    Db     characterset: latin1
    ```

    設定を追記 `vi /etc/my.cnf.d/server.cnf`

        [mysqld]
        character-set-server=utf8

        [client]
        default-character-set=utf8


    ``` Console
    /etc/init.d/mysql restart
    mysql -u root -p
    Enter password:
    MariaDB [(none)]>

    MariaDB [(none)]> status
    Server characterset:    utf8
    Db     characterset:    utf8
    Client characterset:    utf8
    Conn.  characterset:    utf8
    ```

    `[pjname]\config\database.php`

    ``` php
    'mysql' => [
        'charset' => 'utf8mb4',
        ↓
        'charset' => 'utf8',
    ],
    ```

    文字コードの設定は以上
    <br>
    <br>

- 文字セットutf8mb4に対応する

    スマホの絵文字などは、普通に使用されるので対応しておくほうが良いと思われる。  
    運用後に変更する場合は、トラブルの元なので最初からutf8mb4に対応しておく。


    `[pjname]\config\database.php` はデフォルトのまま、変更していた場合は`utf8mb4`に戻す

    ``` php
    'mysql' => [
        'charset' => 'utf8mb4',
    ],
    ```

    設定を追記 `vi /etc/my.cnf.d/server.cnf`

        [mysqld] (or [mariadb])
        character-set-server=utf8mb4

        [client] (or [client-mariadb])
        default-character-set=utf8mb4


    設定を確認
    ``` Console
    /etc/init.d/mysql restart
    mysql -u root -p
    MariaDB [(none)]> status
    Server characterset:    utf8mb4
    Db     characterset:    utf8mb4
    Client characterset:    utf8mb4
    Conn.  characterset:    utf8mb4

    もしくは、
    MariaDB [(none)]>  show variables like 'char%';
    +--------------------------+----------------------------+
    | Variable_name            | Value                      |
    +--------------------------+----------------------------+
    | character_set_client     | utf8mb4                    |
    | character_set_connection | utf8mb4                    |
    | character_set_database   | utf8mb4                    |
    | character_set_filesystem | binary                     |
    | character_set_results    | utf8mb4                    |
    | character_set_server     | utf8mb4                    |
    | character_set_system     | utf8                       |
    | character_sets_dir       | /usr/share/mysql/charsets/ |
    +--------------------------+----------------------------+
    8 rows in set (0.001 sec)
    ```

    - タイムゾーンの設定

    ```
    /usr/bin/mysql_tzinfo_to_sql /usr/share/zoneinfo > ~/timezone.sql
    mysql -u root -p -Dmysql < ~/timezone.sql
    ```

    設定を追記 `vi /etc/my.cnf`
    
        [mysqld]
        default-time-zone = 'Asia/Tokyo'


    設定を確認
    ```
    /etc/init.d/mysql restart
    mysql -u root -p
    MariaDB [(none)]> show variables like '%time_z%';
    +------------------+------------+
    | Variable_name    | Value      |
    +------------------+------------+
    | system_time_zone | JST        |
    | time_zone        | Asia/Tokyo |
    +------------------+------------+
    2 rows in set (0.001 sec)
    ```
