<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends MotbitModel
{
    protected $table='comment';
    public static function showComment($arr_cmt,$parent_id = 0){
        if(count($arr_cmt)>0){
            foreach ($arr_cmt as $key => $item)
            {
                $c1="";
                $reply="";
                $p_id="";
                if ($item->parent_id == $parent_id)
                {
                    if($parent_id==0){
                        $c1="beautypress-single-replay";
                        $p_id = $item->id;
                    }else{
                        $c1="beautypress-single-replay beautypress-replay";
                        $p_id = $parent_id;
                    }
                    if($item->reply_name!=''){
                        $reply=$item->reply_name;
                    }
                    if($parent_id==0){
                        echo '<div class="comment'.$item->id.'">';
                    }
                    echo '<div class="'.$c1.'">';
                    echo '<div class="beautypress-replayer-img"><img src="'.asset_theme('img/default.jpg').'" alt="" >         </div>';
                    echo '<div class="beautypress-replay-text"><div class="beautypress-spilit-container"><div class="beautypress-replay-name"><h5>'.$item->name.' '.$reply.'</h5></div><div class="beautypress-replay-time"><h6>'.date("d/m/Y",strtotime($item->created_at)).'</h6></div></div>';
                    echo '<p>'.$item->content;
                    if($parent_id==0){
                        echo '<a data-id="'.$item->id.'" data-name="'.$item->name.'" data-parent="'.$p_id.'" class="color-purple reply_comment" href="javascript:void(0)">Trả lời</a>';
                    }
                    echo '</p>';
                    echo '</div></div>';   
                    unset($arr_cmt[$key]);
                    Comment::showComment($arr_cmt,$item->id);
                    if($parent_id==0){
                        echo '</div>';
                    }
                }
            }
        }
        
    }
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
