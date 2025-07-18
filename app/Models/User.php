<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Um usuário tem um perfil
    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }

    // Um usuário pode ter vários pontos (batidas de ponto)
    public function pontos()
    {
        return $this->hasMany(Pontos::class);
    }

    // Um usuário pode ter vários atestados
    public function atestados()
    {
        return $this->hasMany(Atestados::class);
    }

    // Um usuário do tipo RH pode analisar vários atestados
    public function atestadosAnalisados()
    {
        return $this->hasMany(Atestados::class, 'analisado_por');
    }


}
