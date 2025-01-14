<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forum">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/forum/about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/forum/contact.php">Contact</a>
        </li>
      </ul>
      
      <div class="mx-2">';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  echo '<form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
        <p class="text-light my-0 mx-2">Weclcome ' . $_SESSION['useremail'] . '</p>
        <a href="/forum/logout.php" class="btn btn-outline-success mx-2" >Logout</a>
      </form>';
} else {
  echo '<form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
        
      </form>
      </div>

      <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      <button class="btn btn-outline-success"  data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
}

echo '  </div>
  </div>
</nav>';

include "/xampp/htdocs/forum/loginModal.php";
include "/xampp/htdocs/forum/signupModal.php";

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {

  echo '<div class="alert alert-success alert-dismissible fade show my=0" role="alert">
  <strong>Success</strong> You can now login
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}