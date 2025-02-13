<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    public static function renderRowUser(User $user)
    {
        $status = $user->getStatus();

        $btn = ' ';
        if ($status === "Active") {
            $btn = "<button class='btn btn-danger'> Disactivate</button>";
        } else {
            $btn = "<button class='btn btn-success'> Activate</button>";
        }

        return "<tr>
        <td> " . $user->getPrenom() . "</td>
        <td> " . $user->getNom() . "</td>
        <td> " . $user->getEmail() . "</td>
        <td> " . $user->getStatus() . "</td>
        <td>
        <form method='post' action='/admin/updateStatusUser/" . $user->getID() . "'>
        $btn
        </form>
        </td>
    </tr>";
    }
}
