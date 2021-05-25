<?php

namespace App\Http\Controllers;

use App\Repositories\IUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public $user;

    public function __construct(IUserRepository $user)
    {
        $this->user = $user;
    }

    public function saveCountry(Request $request){
        $collection = $request->except(['_token','_method']);
        $this->user->savecountry($collection);
        return redirect()->route('user.create');
    }

    public function showUsers()
    {
        $users = $this->user->getAllUsers();
        return View::make('user.index', compact('users'));
    }

    public function createUser()
    {
        $country = $this->user->getAllCountries();
        return View::make('user.edit',compact('country'));
    }

    public function getUser($id)
    {
        $user = $this->user->getUserById($id);
        $country = $this->user->getAllCountries();
        return View::make('user.edit', compact('user','country'));
    }

    public function saveUser(Request $request, $id = null)
    {
        $collection = $request->except(['_token','_method']);

        if( ! is_null( $id ) )
        {
            $this->user->createOrUpdate($id, $collection);
        }
        else
        {
            $this->user->createOrUpdate($id = null, $collection);
        }

        return redirect()->route('user.list');
    }

    public function deleteUser($id)
    {
        $this->user->deleteUser($id);

        return redirect()->route('user.list');
    }
}
