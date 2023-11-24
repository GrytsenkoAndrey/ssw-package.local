<?php

namespace SmartSellWeb\SswPackage\Commands;

use Illuminate\Console\Command;

class SswPackageCommand extends Command
{
    public $signature = 'ssw-package';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
