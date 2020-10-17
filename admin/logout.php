<?php
session_start();
unset($_SESSION['username'],$_SESSION['cart']);
header('Location: ../');
