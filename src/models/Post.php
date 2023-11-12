<?php
namespace Src\models;
use Illuminate\Database\Eloquent\Model;
use Src\models\User;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'text', 'img', 'id_user'];
    public $error = '';
//    public $author;
    public $timestamps = false;
//    protected $with = ['user'];

/*    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function user()
    {
        return $this->belongsTo('Src\models\User');
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }
*/
}
?>