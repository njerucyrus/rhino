<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 5/31/17
 * Time: 5:13 PM
 */

namespace App\Controller;


use App\AppInterface\UserInterface;
use App\Entity\User;

class UserController implements UserInterface
{
    public function create(User $user)
    {
        // TODO: Implement create() method.
    }

    public function update(User $user)
    {
        // TODO: Implement update() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function destroy()
    {
        // TODO: Implement destroy() method.
    }

    public static function getId($id)
    {
        // TODO: Implement getId() method.
    }

    public static function getObject($id)
    {
        // TODO: Implement getObject() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }


}