<?php

session_start();

if(session_destroy()){
    header('Location:page1.php');
}