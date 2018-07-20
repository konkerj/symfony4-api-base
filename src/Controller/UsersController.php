<?php
/**
 * Created by PhpStorm.
 * User: xupanjiang
 * Date: 19/07/18
 * Time: 12:26 PM
 */

namespace App\Controller;


use App\Repository\UserRepository;
use FOS\RestBundle\Controller\FOSRestController;

class UsersController extends FOSRestController
{
    public function getUsers(UserRepository $userRepository)
    {
        $data = $userRepository->findAll();
        $view = $this->view($data, 200);

        return $this->handleView($view);
    }
}