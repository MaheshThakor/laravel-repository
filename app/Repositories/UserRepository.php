<?php

namespace App\Repositories;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{
    protected $user = null;

    public function getAllUsers()
    {
       return DB::table('users')
           ->join('countries', 'users.country_code', '=', 'countries.id')
           ->select('users.*', 'countries.country_name')->get();
    }
    public function saveCountry($collection = []){
        $country = new Country();
        $country->country_name = $collection['country_name'];
        return $country->save();
    }

    public function getAllCountries()
    {
        return Country::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {
        if(is_null($id)) {
            $user = new User;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->country_code = $collection['country_id'];
            $user->password = Hash::make($collection['password']);
            return $user->save();
        }
        $user = User::find($id);
        $user->name = $collection['name'];
        $user->email = $collection['email'];
        $user->country_code = $collection['country_id'];
        $user->password = Hash::make($collection['password']);
        return $user->save();
    }

    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}
