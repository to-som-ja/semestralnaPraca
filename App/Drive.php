<?php

namespace App;

use App\Models\drivingList;
use App\Models\Users;

class Drive
{

    public static function ulozData($pohlavie, $datum, $tank, $strelba, $cas, $demolition)
    {


        $driveList = new drivingList();
        $driveList->setDatum($datum);
        $driveList->setCas($cas);
        $name = Auth::getName();
        $user = Users::getOneMail($name);
        $driveList->setUserID($user->getId());
        if ($demolition=="on")
        {
            $driveList->setDemolition(1);
        }
        else
        {
            $driveList->setDemolition(0);
        }
        if ($strelba=="on")
        {
            $driveList->setStrelba(1);
        }
        else
        {
            $driveList->setStrelba(0);
        }
        $driveList->setPohlavie($pohlavie);
        $driveList->setTank($tank);

        //pri update je potrebne nastavit aj ID
        $drivingList = DrivingList::getOneUserID($user->getId());
        if ($drivingList!=null){
            $driveList->setId($drivingList->getId());
        }

        $driveList->save();
    }
}