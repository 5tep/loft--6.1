<?php
namespace Src\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'password', 'email'];
    public $error = '';
    public $timestamps = false;
    
    
    public function isAdmin()
    {
        return in_array($this->id, ADMINS);
    }

}
?>