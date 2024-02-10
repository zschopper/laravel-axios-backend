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
        'gender',
        'dob',
        'country',
        'city',
        'address1',
        'address2',
        'postcode',
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
        'dob' => 'date:Y-m-d',
        'password' => 'hashed',
    ];

    protected $dates = ['dob', 'created_at', 'updated_at', 'deleted_at'];

    public const GENDERS = ['unknown', 'female', 'male'];

    private const modelInfo = [
        "id" => [
            "type" => "number",
            "readonly" => true,
            "pattern" => "",
            "lang" => [
                "hu_HU" => ["displayText" => "#", "hint" => "Azonosító", "placeholder" => "Azonosító",],
                "en_US" => ["displayText" => "#", "hint" => "Id", "placeholder" => "Enter your Id",],
            ],
            "minlength" => 3,
            "displayOnList" => true,
        ],
        "name" => [
            "type" => "text",
            "required" => true,
            "pattern" => "",
            "lang" => [
                "hu_HU" => ["displayText" => "Név", "hint" => "Név", "placeholder" => "Név",],
                "en_US" => ["displayText" => "Name", "hint" => "Your Name", "placeholder" => "Enter name",],
            ],
            "minlength" => 3,
            "displayOnList" => true,
        ],
        "email" => [
            "type" => "email",
            "pattern" => "",
            "lang" => [
                "hu_HU" => ["displayText" => "E-mail", "hint" => "E-mail cím", "placeholder" => "E-mail",],
                "en_US" => ["displayText" => "Email", "hint" => "Your Email address", "placeholder" => "Enter email",],
            ],
            "displayOnList" => true,
        ],
        "password" => [
            "type" => "password",
            "pattern" => "^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*][6,100]$",
            "lang" => [
                "hu_HU" => ["displayText" => "Jelszó", "hint" => "Jelszó", "placeholder" => "Jelszó",],
                "en_US" => ["displayText" => "Password", "hint" => "Password", "placeholder" => "Enter password",],
            ],
            "minlength" => 8,
            "displayOnList" => true,
        ],
        "gender" => [
            "type" => "text",
            "pattern" => "",
            "lang" => [
                "hu_HU" => ["displayText" => "Nem", "hint" => "Nemed", "placeholder" => "Nem",],
                "en_US" => ["displayText" => "Gender", "hint" => "Gender", "placeholder" => "Enter gender",],
            ],
            "displayOnList" => true,
        ],
        "dob" => [
            "type" => "date",
            "lang" => [
                "hu_HU" => ["displayText" => "Szül. dátum", "hint" => "Születésed dátuma", "placeholder" => "Születés dátuma",],
                "en_US" => ["displayText" => "Date of birth", "hint" => "Date of birth", "placeholder" => "Enter date of birth",],
            ],
            "min" => "1900-01-01",
            "max" => "today",
            "displayOnList" => true,
        ],
        "country" => [
            "type" => "text",
            "pattern" => "",
            "lang" => [
                "hu_HU" => ["displayText" => "Ország", "hint" => "Lakhely - ország", "placeholder" => "Ország",],
                "en_US" => ["displayText" => "Country", "hint" => "Country", "placeholder" => "Enter country",],
            ],
            "displayOnList" => true,
        ],
        "city" => [
            "type" => "text",
            "pattern" => "",
            "lang" => [
                "hu_HU" => ["displayText" => "Város", "hint" => "Lakhely - város", "placeholder" => "Város",],
                "en_US" => ["displayText" => "City", "hint" => "City", "placeholder" => "Enter city",],
            ],
            "displayOnList" => true,
        ],
        "address1" => [
            "type" => "text",
            "pattern" => "",
            "lang" => [
                "hu_HU" => ["displayText" => "Cím #1", "hint" => "Lakhely - cím #1", "placeholder" => "Cím #1",],
                "en_US" => ["displayText" => "Address #1", "hint" => "Address #1", "placeholder" => "Enter address1",],
            ],
            "displayOnList" => false,
        ],
        "address2" => [
            "type" => "text",
            "pattern" => "",
            "lang" => [
                "hu_HU" => ["displayText" => "Cím #2", "hint" => "Lakhely - cím #2", "placeholder" => "Cím #2",],
                "en_US" => ["displayText" => "Address #2", "hint" => "Address #2", "placeholder" => "Enter address2",],
            ],
            "displayOnList" => false,
        ],
        "postcode" => [
            "type" => "number",
            "pattern" => "",
            "lang" => [
                "hu_HU" => ["displayText" => "Irsz.", "hint" => "Lakhely - irányítószám", "placeholder" => "Irányítószám",],
                "en_US" => ["displayText" => "Post code", "hint" => "Post code", "placeholder" => "Enter postcode",],
            ],
            "minlength" => 4,
            "maxlength" => 5,
            "displayOnList" => false,
        ],
    ];

    public static function getModelInfo()
    {
        return User::modelInfo;
    }
}
