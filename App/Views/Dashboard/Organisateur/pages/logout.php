<?php
// echo "page logout";
use App\Core\session;
Session::destroySession();
header("Location: /auth/login");