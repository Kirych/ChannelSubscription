<?php

	namespace Kirych\ChannelSubscription;

	trait ChannelSubscriptable {

		public function channels()
		{
			return $this->belongsToMany('\App\Channel', 'user_channels', 'id_user', 'id_channel');
		}

	}