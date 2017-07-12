<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
	const MIN_KEY_LENGTH = 4;
	const MAX_KEY_LENGTH = 10;

	protected $table = 'channels';
	protected $primaryKey = 'id_channel';
    public $timestamps = false;
    public $incrementing = false;

    public static function newId()
    {
    	return bin2hex(openssl_random_pseudo_bytes(mt_rand(self::MIN_KEY_LENGTH/2, self::MAX_KEY_LENGTH/2)));
    }

    public function users()
    {
		return $this->belongsToMany('User', 'user_channels', 'id_channel', 'id_user');
    }
}
