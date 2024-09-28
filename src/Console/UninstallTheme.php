<?php

namespace Insyht\LittleLovey\Console;

use Illuminate\Console\Command;

class UninstallTheme extends Command
{
    protected $hidden = true;
    protected $signature = 'insyht-little-lovey:uninstall';
    protected $description = 'Uninstall the Little Lovey theme';

    public function handle()
    {
        $this->info('Uninstalling Little Lovey theme...');

        $this->info('Uninstalled Little Lovey theme');
    }
}
