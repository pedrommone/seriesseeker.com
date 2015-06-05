<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpdateShows extends Command {

	protected $name = 'update:shows';
	protected $description = 'Process the shows to update in queue.';

	public function fire()
	{
		// Get the first 20 shows
		$show_changes = ItemsToUpdate::where('type', 'S')->get()->take(20);

		if (!$show_changes)
			return;
	}

}
