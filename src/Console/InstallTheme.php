<?php

namespace Insyht\LittleLovey\Console;

use Illuminate\Console\Command;

class InstallTheme extends Command
{
    protected $hidden = true;
    protected $signature = 'insyht-little-lovey:install';
    protected $description = 'Install the Little Lovey Theme';

    public function handle()
    {
        $this->info('Installing Little Lovey theme...');

        $this->info('Publishing configuration...');
        $this->publishConfiguration(true);
        // todo also execute the other stuff from the LittleLoveyServiceProvider like migrations. Don't forget to add them to the unit test!

        $this->info('Installed Little Lovey Theme');
    }

    protected function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Insyht\LittleLovey\LittleLoveyServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
