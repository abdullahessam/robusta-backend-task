<?php


namespace App\Http\Controllers\Api\Auth;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

interface iAuth
{
    public function guard();
    public function Model() ;
    public function registrationRules() : array;
    public function loginRules():array;
    public function resource();
}
