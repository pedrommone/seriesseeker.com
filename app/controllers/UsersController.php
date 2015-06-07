<?php

class UsersController extends BaseController {

	public function getIndex()
	{

		return View::make('users.index');
	}

	public function postPathPassword() {

		$validator = Validator::make(Input::all(), [

			'password' => 'required|max:10'
		]);

		if ($validator->fails())
		{

			return Redirect::back()
				->withInput()
				->withErrors($validator);
		}
		else
		{

			try
			{

				$user = User::findOrFail(Auth::user()->id);
				$user->password = Hash::make(Input::get('password'));
				$user->save();

				$bag = new \Illuminate\Support\MessageBag;	
				$bag->add('success', 'Senha alterada com sucesso');

				return Redirect::to('my-account')
					->with('success', $bag);
			}
			catch (Exception $e)
			{

				$bag = new \Illuminate\Support\MessageBag;
				$bag->add('error', 'Erro interno: ' . $e->getMessage());

				return Redirect::to('/')
					->withErrors($bag);
			}
		}
	}

	public function postAuth()
	{
		
		$validator = Validator::make(Input::all(), [
			'email' => 'required|max:200|email',
			'password' => 'required|max:10'
		]);

		if ($validator->fails())
		{

			return Redirect::back()
				->withInput()
				->withErrors($validator);
		}
		else
		{

			try
			{

				if ( Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]) )
				{

					$bag = new \Illuminate\Support\MessageBag;	
					$bag->add('success', 'Bem vindo ' . Auth::user()->name . '!');

					return Redirect::to('my-account')
						->with('success', $bag);
				}
				else
				{

					$bag = new \Illuminate\Support\MessageBag;
					$bag->add('error', 'Credenciais inválidas.');

					return Redirect::back()
						->withErrors($bag);
				}				
			}
			catch (Exception $e)
			{

				$bag = new \Illuminate\Support\MessageBag;
				$bag->add('error', 'Erro interno: ' . $e->getMessage());

				return Redirect::to('/')
					->withErrors($bag);
			}
		}
	}

	public function getLogout()
	{

		try
		{

			Auth::logout();

			$bag = new \Illuminate\Support\MessageBag;	
			$bag->add('success', 'Deslogado com sucesso.');

			return Redirect::to('/')
				->with('success', $bag);
		}
		catch (Exception $e)
		{

			$bag = new \Illuminate\Support\MessageBag;
			$bag->add('error', 'Erro interno: ' . $e->getMessage());

			return Redirect::to('/')
				->withErrors($bag);
		}
	}

	public function getValidate($hash)
	{

		$user_id = (int) (new Hashids())->decode($hash);
		$user = User::findOrFail($user_id);

		try
		{

			if ( ! $user->verified_at)
			{

				$user->verified_at = Carbon::now();
				$user->save();

				$bag = new \Illuminate\Support\MessageBag;	
				$bag->add('success', 'Conta verificada com sucesso.');

				return Redirect::to('/')
					->with('success', $bag);
			}
			else
			{

				$bag = new \Illuminate\Support\MessageBag;
				$bag->add('error', 'Conta já verificada!');

				return Redirect::to('/')
					->withErrors($bag);
			}
		}
		catch (Exception $e)
		{

			$bag = new \Illuminate\Support\MessageBag;
			$bag->add('error', 'Erro interno: ' . $e->getMessage());

			return Redirect::to('/')
				->withErrors($bag);
		}
	}

	public function postStore()
	{
		
		$validator = Validator::make(Input::all(), [

			'name' => 'required|max:100',
			'email' => 'required|unique:users,email',
			'password' => 'required|max:10',
			'timezone' => 'required|timezone'
		]);

		if ($validator->fails())
		{

			return Redirect::to('/users')
				->withInput()
				->withErrors($validator);
		}
		else
		{

			try
			{

				$user = new User;

				$user->name = Input::get('name');
				$user->email = Input::get('email');
				$user->password = Hash::make(Input::get('password'));
				$user->timezone = Input::get('timezone');
				$user->is_administrator = 'N';
				$user->save();

				$email_aux = $user->email;

				Mail::send('emails.new-account', [
					'name' => $user->name,
					'hash' => (new Hashids())->encode((int) $user->id)
				], function($message) use ($email_aux) {

					$message
						->to($email_aux)
						->subject('Nova conta no SeriesSeeker');
				});

				$bag = new \Illuminate\Support\MessageBag;	
				$bag->add('success', 'Sua conta foi criada com sucesso. Um email foi enviado para validarmos sua conta.');

				return Redirect::to('/users')
					->with('success', $bag);
			}
			catch (Exception $e)
			{

				$bag = new \Illuminate\Support\MessageBag;
				$bag->add('error', 'Erro interno: ' . $e->getMessage());

				return Redirect::to('/users')
					->withErrors($bag);
			}
		}
	}

	public function getRecoveryPassword()
	{

		return View::make('users.recovery-password');
	}

	public function postRecoveryPassword() {

		$validator = Validator::make(Input::all(), [

			'email' => 'required|email|exists:users,email'
		]);

		if ($validator->fails())
		{

			return Redirect::back()
				->withInput()
				->withErrors($validator);
		}
		else
		{

			try
			{

				$new_password = str_random(6);

				$user = User::whereEmail(Input::get('email'))
					->firstOrFail();

				$user->password = Hash::make($new_password);
				$user->save();

				$email_aux = $user->email;

				Mail::send('emails.new-password', [

					'name' => $user->name,
					'new_password' => $new_password
				], function($message) use ($email_aux) {

					$message
						->to($email_aux)
						->subject('Nova senha no SeriesSeeker');
				});

				$bag = new \Illuminate\Support\MessageBag;	
				$bag->add('success', 'Senha alterada com sucesso, um email foi enviado com a nova senha');

				return Redirect::to('users')
					->with('success', $bag);
			}
			catch (Exception $e)
			{

				$bag = new \Illuminate\Support\MessageBag;
				$bag->add('error', 'Erro interno: ' . $e->getMessage());

				return Redirect::to('/')
					->withErrors($bag);
			}
		}
	}
}
