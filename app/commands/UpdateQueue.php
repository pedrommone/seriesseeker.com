<?php

use Tmdb\Laravel\Facades\Tmdb;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpdateQueue extends Command {

	protected $name = 'update:queue';
	protected $description = 'Add some items to update in queue.';

	public function fire()
	{
		
	}
}
