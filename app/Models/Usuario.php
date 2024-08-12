<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuario';
    protected $primaryKey = 'cd_usuario';

    public static function Login($email, $senha) {
        $sql = <<<SQL
            SELECT * 
              FROM usuario u
             WHERE u.email = '{$email}'
               AND u.senha = '{$senha}'
SQL;
        return DB::select($sql);
    }

    public static function obtemTodos() {
        $sql = <<<SQL
            SELECT * 
              FROM usuario u
SQL;
        return DB::select($sql);
    }
}
