<?php
session_start();
echo "logged out successfully";
session_destroy();
header("location: /forum");