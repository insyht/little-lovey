<?php

use Illuminate\Database\Migrations\Migration;
use Insyht\Larvelous\Models\Theme;

class InstallTheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Theme::where('path', 'insyht/little-lovey/resources/views')->exists()) {
            Theme::create([
                'name' => 'Little Lovey',
                'path' => 'insyht/little-lovey/resources/views',
                'namespace' => 'Insyht\LittleLovey',
                'blade_prefix' => 'insyht-little-lovey',
                'github_url' => 'https://github.com/insyht/little-lovey',
                'image' => 'images/larvelous-theme.png',
                'active' => false,
                'author' => 'insyht',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Theme::where('path', 'insyht/little-lovey/resources/views')->delete();
    }
}
