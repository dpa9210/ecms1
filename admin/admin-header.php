<nav class="navbar navbar-inverse whitetxt" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index">
      <img id="logo1" alt="logo" src="../img/cooperation2.jpg" width="60" height="50" style="max-width:100px; margin-top:-5px;">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

       <?php if(isset($_SESSION['admin_id'])){
          
          echo "<p>".customWelcome()." "."<a href='logout.php'><span class='glyphicon glyphicon-off'>Logout</span></a>"."<p>";

        }else{
          echo "<li><a class='right' href='index.php'> Login</a></li>";
        } 
        ?>
        </ul>
  
    </div>
  </div>
</nav>


