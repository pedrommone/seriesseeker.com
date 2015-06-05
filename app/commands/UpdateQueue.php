<?php

use Tmdb\Laravel\Facades\Tmdb;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpdateQueue extends Command {

	protected $name = 'update:queue';
	protected $description = 'Add some items to update in queue.';

	public function sweepMoviesChanges($page = 1)
	{

		// Get the first page of changes in the requisition (movies)
		$last_changes = TMDB::getChangesApi()->getMovieChanges([

				'page'		 => $page,
    			'start_date' => Carbon::now()->subDay()->format('Y-m-d'),
    			'end_date'   => Carbon::now()->format('Y-m-d')
		]);

		if( ! empty($last_changes['results']) )
		{

			foreach ($last_changes['results'] as $changes)
			{
				
				$item = ItemsToUpdate::where('target', $changes['id'])->first();

				if ( is_null($item) )
					$item = new ItemsToUpdate;

				$item->target 	 = $changes['id'];
				$item->type 	 = 'M'; //stands for 'Movie'
				$item->save();

				$this->info('added ' . $changes['id']);
			}
		}

		if ( $last_changes['total_pages'] > $last_changes['page'] )
		{

			sleep(1);

			$this->sweepMoviesChanges( $last_changes['page'] + 1 );
		} 
	}

	public function sweepShowsChanges($page = 1)
	{

		// Get the first page of changes in the requisition (shows)
		$last_changes = TMDB::getChangesApi()->getTvChanges([

				'page'		 => $page,
    			'start_date' => Carbon::now()->subDay()->format('Y-m-d'),
    			'end_date'   => Carbon::now()->format('Y-m-d')
		]);

		if( ! empty($last_changes['results']) )
		{

			foreach ($last_changes['results'] as $changes)
			{
				
				$item = ItemsToUpdate::where('target', $changes['id'])->first();

				if ( is_null($item) )
					$item = new ItemsToUpdate;

				$item->target 	 = $changes['id'];
				$item->type 	 = 'S'; //stands for 'Shows'
				$item->save();

				$this->info('added ' . $changes['id']);
			}
		}

		if ( $last_changes['total_pages'] > $last_changes['page'] )
		{

			sleep(1);
			
			$this->sweepShowsChanges( $last_changes['page'] + 1 );
		}	
	}

	public function fire()
	{	

		$this->sweepMoviesChanges();
		$this->sweepShowsChanges();
	}
}
