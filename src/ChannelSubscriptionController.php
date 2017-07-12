<?php

namespace Kirych\ChannelSubscription;

use Illuminate\Http\Request;

class ChannelSubscriptionController extends \App\Http\Controllers\Controller
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
        \Twig_Autoloader::register();
    }


	/**
	 * Render a subscription form
	 * 
	 * @return void
	 */
    public function form()
    {
    	$user = auth()->user();
    	$user->load('channels');

		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/views');
        $twig = new \Twig_Environment($loader, []);

		return
        	$twig->render('subscribe.twig', [
				'success' => session('success'),
				'error' => session('errors') ? implode('<br>', session('errors')->all()) : false,
				'token' => csrf_token(),
				'user' => auth()->user(),
				'action' => route('subscription.save'),
				'channels' => \App\Channel::all()->toArray(),
				'subscribed' => $user->channels->pluck('id_channel')->toArray(),
        	]);
    }

	/**
	 *	Save a subscription
	 *
	 * @return void
	 */
    public function save(Request $request)
    {
    	$this->validate($request, [
        	'id_channel' => 'array',
    	]);

    	auth()
    		->user()
    		->channels()
    		->sync(request('id_channel', []));

    	return redirect()
    		->back()
    		->with('success', 'Nice job!');
    }
}