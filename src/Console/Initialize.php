<?php

namespace Nanuc\ReadySetGo\Console;

use Illuminate\Console\Command;
use Nanuc\ReadySetGo\Presets\TallPreset;

class Initialize extends Command
{
    protected $signature = 'rsg:initialize';

    protected $description = 'Initialize Ready-Set-Go';

    public function handle()
    {
        TallPreset::install();
        $this->info('Please run "npm install && npm run dev" to compile your new assets.');
    }
}