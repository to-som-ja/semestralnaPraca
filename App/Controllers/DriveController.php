<?php

namespace App\Controllers;

use App\Core\Model;
use App\Drive;
use App\Auth;
use App\Core\Responses\Response;
use App\Models\drivingList;
use App\Models\Users;
use http\Client\Curl\User;


class DriveController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }
    public function driveRegister()
    {

        if (Auth::isLogged())
        {
            $user = Users::getOneMail(Auth::getName());
            $userID = $user->getId();
            $drivingList = DrivingList::getOneUserID($userID);
            if ($drivingList==null){
                return $this->html();
            } else{
                $this->redirect("drive", "ulozeneData",[
                    "tank" => $drivingList->getTank(),"pohlavie" => $drivingList->getPohlavie(),
                    "email" => Auth::getName(),"datum" => $drivingList->getDatum(),
                    "hodiny" => $drivingList->getCas(), "strelba" => $drivingList->getStrelba(),
                    "demolition" => $drivingList->getDemolition(),
                    ]);
            }

        }else
        {
            $this->redirect("auth", "loginForm", ["error" => "Pre vyplnenie je potrebne byt prihlaseny"]);
        }
    }
    public function ulozeneData()
    {
        if (Auth::isLogged()) {
            $user = Users::getOneMail(Auth::getName());
            $userID = $user->getId();
            $drivingList = DrivingList::getOneUserID($userID);
            if ($drivingList != null) {
                return $this->html([
                        "tank" => $this->request()->getValue("tank"),
                        "pohlavie" => $this->request()->getValue("pohlavie"),
                        "email" => $this->request()->getValue("email"),
                        "datum" => $this->request()->getValue("datum"),
                        "hodiny" => $this->request()->getValue("hodiny"),
                        "strelba" => $this->request()->getValue("strelba"),
                        "demolition" => $this->request()->getValue("demolition"),
                    ]
                );
            } else {
                $this->redirect("drive", "driveRegister");
            }
        }
        else
        {
            $this->redirect("auth", "loginForm", ["error" => "Pre vyplnenie je potrebne byt prihlaseny"]);
        }
    }

    public function driveList()
    {
        $pohlavie = $this->request()->getValue("pohlavie");
        $datum = $this->request()->getValue("datum");
        $tank = $this->request()->getValue("tank");
        $strelba = $this->request()->getValue("strelba");
        $cas = $this->request()->getValue("cas");
        $demolition = $this->request()->getValue("demolition");
        Drive::ulozData($pohlavie, $datum, $tank, $strelba, $cas, $demolition);
        $this->redirect("home", "index", ["success" => "Žiadosť bola úspešne uložená"]);
    }

    public function delete()
    {
        $user = Users::getOneMail(Auth::getName());
        $userID = $user->getId();
        $drivingList = DrivingList::getOneUserID($userID);
        $drivingList->delete();
        $this->redirect("home", "index", ["success" => "Žiadosť bola úspešne odstránená"]);
    }

    public function update()
    {
        $user = Users::getOneMail(Auth::getName());
        $userID = $user->getId();
        $drivingList = DrivingList::getOneUserID($userID);
        $this->redirect("drive", "updateForm",[
            "tank" => $drivingList->getTank(),"pohlavie" => $drivingList->getPohlavie(),
            "email" => Auth::getName(),"datum" => $drivingList->getDatum(),
            "hodiny" => $drivingList->getCas(), "strelba" => $drivingList->getStrelba(),
            "demolition" => $drivingList->getDemolition(),
        ]);
    }
    public function updateForm()
    {
        if (Auth::isLogged()) {
            return $this->html([
                    "tank" => $this->request()->getValue("tank"),
                    "pohlavie" => $this->request()->getValue("pohlavie"),
                    "email" => $this->request()->getValue("email"),
                    "datum" => $this->request()->getValue("datum"),
                    "hodiny" => $this->request()->getValue("hodiny"),
                    "strelba" => $this->request()->getValue("strelba"),
                    "demolition" => $this->request()->getValue("demolition"),
                ]
            );
        }else
        {
            $this->redirect("auth", "loginForm", ["error" => "Pre vyplnenie je potrebne byt prihlaseny"]);
        }
    }
    public function updateList()
    {
        $pohlavie = $this->request()->getValue("pohlavie");
        $datum = $this->request()->getValue("datum");
        $tank = $this->request()->getValue("tank");
        $strelba = $this->request()->getValue("strelba");
        $cas = $this->request()->getValue("cas");
        $demolition = $this->request()->getValue("demolition");
        Drive::ulozData($pohlavie, $datum, $tank, $strelba, $cas, $demolition);
        $this->redirect("home", "index", ["success" => "Žiadosť bola úspešne upravená"]);
    }
}