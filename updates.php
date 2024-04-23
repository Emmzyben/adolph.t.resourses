<?php
    $servername = 'localhost';
    $username = "adolphtr";
    $password = "Nikido886@";
    $database = "adolphtr_adolpht";

// Create a database connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Modify the SQL query to retrieve posts sorted by the latest post
$sql = "SELECT * FROM posts ORDER BY post_timestamp DESC";

// Execute the query
$result = mysqli_query($connection, $sql);

// Check if there are results
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

// Rest of your code to display the posts...
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png">
    <title>Updates</title>
   <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="index.css">
   <style>
.nav-container {
  position: relative;
  display: inline-block;
}

#dropdown {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #382968;
  padding: 10px 0;
  width: 300px;
  text-align: center;
}

#dropdown a:hover {
  background-color: grey;
}

#dropdown a {
  border-bottom: 1px solid white;
  list-style-type: none;
}

#dropdown a {
  color: white;
  display: block;
  font-weight: lighter;
  padding-bottom: 10px;
}

#hoverer {
  cursor: pointer;
}

/* Show the dropdown when either the "Services" link or the dropdown itself is hovered */
#hoverer:hover + #dropdown,
#dropdown:hover {
  display: block;
}
img {
            max-width: 500px;
            max-height: 300px;
        }
        .post-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
         
        }
        #cool{
          border: 1px solid #382968;
          margin: 20px;
          border-radius: 7px;
          padding: 20px;
          color: black;
        }
        #cooler{
          margin-bottom: 30px;
        }
        #color{
          color: #382968;
        }
ul li{
  list-style-type: none;
}
#topper{
  margin-top: 20px;
  background-color:  #382968;
  color: white;
  padding: 10px;
  font-weight: bold;
}
   </style>
</head>
<body>
<header class="text-gray-600 body-font w-full z-50">
        <div  class="title-font font-medium text-gray-900" id="custom-container" style="height: 80px;">
          <div style="text-align: left;">
            <img src="images/logo.png" width="150px" style="margin-left: 4%;" />
            <h1 class="text-[#382968] cursor-pointer" style="font-size: 13px; padding-left: 20px;">Adolph T. Resources Nigeria Limited</h1>
          </div>
      
          <div id="upul">
            <p class="text-gray-900 font-bold cursor-pointer"><i class="fa fa-envelope" style="font-size:15px;color:#382968;padding-right: 10px;"></i> support@adolphtresources.com.ng</p>
            <p class="text-gray-900 font-bold cursor-pointer"><i class="fa fa-phone" style="font-size:15px;color:#382968;padding-right: 10px;"></i> +234 (0) 810 238 7889<br /><i class="fa fa-phone" style="font-size:15px;color:#382968;padding-right: 10px;"></i> Tel2: +234 (0) 812 487 4990</p>
          </div>
        </div>
    </header>   
       
        <aside> 
         <div id="title" >
            <span><img src="images/logo.png" alt="" ></span>
            <span><p>Adolp T.Resources</p></span>
        </div>
            <div onclick="openNav()" >
                <div class="container1" onclick="myFunction(this)" id="sideNav">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                  </div>
                </div>
        </aside>


          <div id="mySidenav" class="sidenav">
            <img src="images/logo.png" alt="" width="70px" height="70px"><br>
              <a href="index.html">Home</a>
              <a href="about.html">About Us</a>
              <a class="dropdown-item">
                Services +
                <ul class="sub-menu">
                  <li><a id="hovs" href='scafolding.html'>Scaffolding</a></li>
                  <li><a id="hovs" href='training.html'>Scaffolding training</a></li>
                  <li><a id="hovs" href='safehouse.html'>Safehouse pressurized habitat</a></li>
                  <li><a id="hovs" href='maintanance.html'>Maintenance and Construction Support</a></li>
                  <li><a id="hovs" href='renting.html'>Renting of equipment and procurement</a></li>
                </ul>
              </a>
              <script>
              function toggleSubMenu() {
                const subMenu = document.querySelector('.sub-menu');
                subMenu.classList.toggle('open');
              }
              
              function handleSubMenuItemClick() {
                closeMenu(); // Call closeMenu when a submenu item is clicked
              }
              
              document.querySelector('.dropdown-item').addEventListener('click', toggleSubMenu);
              const subMenuLinks = document.querySelectorAll('.sub-menu a');
              
              subMenuLinks.forEach((link) => {
                link.addEventListener('click', handleSubMenuItemClick);
              });
              </script>
            <a href="gallery.php">Gallery</a>
              <a href="updates.php">Updates</a>
              <a href="certificate-verification.html">Certificate Verification</a>
              <a href="contact.html">Contact Us</a>
          </div>


      <!-- nav -->

      <nav id="navs" class="md:ml-auto items-center text-base justify-center text-[#ffffffd4] font-bold" style="text-align: center; padding: 8px;">
        <a class="mr-5 cursor-pointer" id="hover" href="index.html">Home</a>
        <a class="mr-5 cursor-pointer" id="hover" href="about.html">About</a>
       
        
        <div class="nav-container">
          <a class="mr-5 cursor-pointer" id="hoverer" onmouseenter="openDropdown()" onmouseleave="closeDropdown()">Services</a>
          <ul id="dropdown">
            <a href="scafolding.html">Scaffolding</a>
            <a href="training.html">Scaffolding training</a>
            <a href="safehouse.html">Safehouse pressurized habitat</a>
            <a href="maintanance.html">Maintenance and Construction Support</a>
            <a href="renting.html">Renting of equipment and procurement.</a>
          </ul>
        </div>
        
        
        <a class="mr-5 cursor-pointer" id="hover" href="gallery.php">Gallery</a>
        <a class="mr-5 cursor-pointer" id="hover" href="updates.php">Updates</a>
        <a class="mr-5 cursor-pointer" id="hover" href="certificate-verification.html">Certificate verification</a>
      
        <a href="contact.html">
          <button class="bg-[#FF595A] border-0 py-2 px-6 focus:outline-none hover:text-[white] rounded text-[#001233] font-bold">Contact us</button>
        </a>
      </nav>
      



<!-- content -->
<div class="post-container"> 
        <h1 id="topper">Recent Posts and updates</h1>
        <ul>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li  id='cool'>";
                echo "<div id='cooler'>";
                echo "<h1 id='color'><b>" . $row['post_title'] . "</b></h1>";
                echo "<p>" . nl2br($row['post_content']) . "</p>";
                echo "</div>";
                if (!empty($row['image_path'])) {
                    echo "<img src='" . $row['image_path'] . "' alt='Post Image'>";
                }
                echo "<p>Posted on: " . $row['post_timestamp'] . "</p>"; 
                echo "</li>";
            }
            ?>
        </ul>
    </div>
    <?php
    // Close the database connection
    mysqli_close($connection);
    ?>

  









<!-- footer -->
<footer>
    <div>
     <p>Copyright © 2024 Adolph T. Resources</p> 
     </div>
     <div><p><i class="fa fa-envelope" style="font-size:15px;color:#ffffff;padding-right: 10px;"></i>support@adolphtresources.com.ng </p></div>
      <div><p><i class="fa fa-phone" style="font-size:15px;color:#ffffff;padding-right: 10px;"></i> +234 (0) 810 238 7889, +234 (0) 812 487 4990</p>
       </div>
  </footer>
  <script src="index.js"></script>
  <script>
let isMenuOpen = false;

const toggleMenu = () => {
    const menu = document.getElementById("ul");
    
    if (!isMenuOpen) {
        menu.style.height = "auto";
        isMenuOpen = true;
    } else {
        menu.style.height = "0px";
        isMenuOpen = false;
    }
};

const closeMenu = () => {
    const menu = document.getElementById("ul");
    menu.style.height = "0px";
    isMenuOpen = false;
};
</script>
</body>
</html>