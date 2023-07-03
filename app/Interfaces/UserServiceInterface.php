<?php
namespace App\Interfaces;

interface UserServiceInterface
{
    public function saveUser();
    public function loginUser();
    public function logoutUser();
    public function generateToken();
}
