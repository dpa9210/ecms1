<nav class="navbar navbar-fixed-top bg-purple-hd" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">
      <img id="logo1" alt="logo" src="../img/cooperation.jpg" width="60" height="40" style="max-width:100px; margin-top:-5px;">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a> <?php if(isset($_SESSION['user_id'])){echo $_SESSION['name']." ".$_SESSION['name2']."<li><a href='logout.php'><span class='glyphicon glyphicon-off'></span>Logout</a></li>";} ?> </a>  </li>
         </ul>

        <div class="container">
      <ul class="nav navbar-nav navbar-right">

     
    
      </ul>
      </div>
  
    </div>
  </div>
</nav>


