<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//table ta bole dite hobe ekhane
    protected $table='categories';
    // Now bole dite hobe je ekta categoryr onek post thakte pare. she jonno hasMany method use korbo.
    public function posts()//ekhane post just ekta function er name. jekuno name/variable dile e hobe,
    {
    	return $this->hasMany('App\Post');//Post model er path dekano hoise because post gula oikhan theke ashbe and ekta post er onk tags or category thakte pare.
    	//ekon post Model e jeye oi khane bole dite hobe je ekta post jekuno categories er under or belongsto hote parbe.
    	//tai akhon Post.php te jabo.
    }

}