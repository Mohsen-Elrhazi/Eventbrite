<?php 
use App\Core\Session;

        if(Session::hasSession('error')){
            echo "<div class='alert alert-danger text-center'>". Session::getSession('error') ."</div>";
            Session::removeSession('error');
        }
        if(Session::hasSession('success')){
            echo "<div class='alert alert-success text-center'>". Session::getSession('success') ."</div>";
            Session::removeSession('success');
        }
         ?>