<?php

namespace App\Repositories;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

interface IUserRepository
{
    public function getAllUsers();

    public function saveCountry($collection = []);

    public function getAllCountries();

    public function getUserById($id);

    public function createOrUpdate( $id = null, $collection = [] );

    public function deleteUser($id);
}
