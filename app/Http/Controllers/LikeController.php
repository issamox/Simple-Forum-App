<?php

namespace App\Http\Controllers;

use App\Like;
use App\Replay;
use Illuminate\Http\Request;

class LikeController extends Controller
{
  public function likeIt(Replay $replay){
      $replay->likes()->create(
          ['user_id'=>'1']
      );
  }
  public function unLikeit(Replay $replay){
      $replay->likes()->where('user_id',1)->first()->delete();
  }
}
