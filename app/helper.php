<?php

use App\Follow;

if( !function_exists('check_follower_or_not') ){
    function check_follower_or_not($follower_id, $followed_id){

        $follow = Follow::where(function ($query) use ($follower_id, $followed_id) {
            $query->where('user_id', $follower_id)
                ->where('follower_id', $followed_id);
        })->orWhere(function ($query) use ($follower_id, $followed_id) {
            $query->where('user_id', $followed_id)
                ->where('follower_id', $follower_id);
        })->first();

        return $follow;
    }
}


