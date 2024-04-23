
document.addEventListener('DOMContentLoaded', function () {
    var secondDiv = document.getElementById('navs');

    // Listen for scroll events
    window.addEventListener('scroll', function () {
        // Check if the user has scrolled down a certain amount (adjust as needed)
        if (window.scrollY > 250) {
            // Slide down the sticky div by changing the 'top' property
            secondDiv.style.top = '0';
        } else {
            // Move the sticky div back above the viewport when scrolling up
            secondDiv.style.top = '-100px';
        }
    });
});


    function myFunction(x) {
        x.classList.toggle("change");
      }
    
      var open = false;
    
    function openNav() {
        var sideNav = document.getElementById("mySidenav");
        
        if (sideNav.style.width === "0px" || sideNav.style.width === "") {
            sideNav.style.width = "250px";
            open = true;
        } else {
            sideNav.style.width = "0";
            open = false;
        }
    }
  

    const imageUrls = [
        'images/image4.png',
        'images/image5.png',
        'images/image6.png',
        'images/image7.png',
        'images/image8.png',
    ];

let currentIndex = 0;

function updateImage() {
    const rotatingImage = document.getElementById('rotating-image');
    rotatingImage.src = imageUrls[currentIndex];
}

function goToPrevious() {
    currentIndex = currentIndex === 0 ? imageUrls.length - 1 : currentIndex - 1;
    updateImage();
}

function goToNext() {
    currentIndex = (currentIndex + 1) % imageUrls.length;
    updateImage();
}

// Automatically rotate images every 5 seconds
setInterval(goToNext, 5000);

// Initial image update
updateImage();





const toggleMenu = () => {
    const menu = document.getElementById("ul");
    menu.style.height = menu.style.height === "0px" ? "auto" : "0px";
};

const closeMenu = () => {
    const menu = document.getElementById("ul");
    menu.style.height = "0px";
};




