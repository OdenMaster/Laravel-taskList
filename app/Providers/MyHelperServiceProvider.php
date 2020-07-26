<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        // MyHelpersディレクトリ＋正規表現で全てのPHPファイルを指定
        $preg_path = sprintf('%s/MyHelpers/*.php', app_path());
        // glob関数でMyHelpersディレクトリ内のすべてのPHPファイルのフルパスを取得する
        $helper_files= glob($preg_path);
        // ループさせてMyHelpersディレクトリ内のすべてのPHPファイルを読み込む
        foreach ($helper_files as $helper_file){
            require_once($helper_file);
        }

        // foreach (glob(sprintf('%s/MyHelpers/*.php', app_path())) as $helper_file){
        //     require_once($helper_file);
        // }

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
