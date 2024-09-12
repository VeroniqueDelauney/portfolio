
if (typeof $ === "undefined") {
	var $ = jQuery;
}



window.onload = function(){
    
    // Effet fade in au chargement de la page
    document.getElementById("page").style.opacity = "1";

    // Swiper animation for competencies
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 3000,
        },
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 0,
            stretch: 80,
            depth: 200,
            modifier: 1,
            slideShadows: false,
        }
    
    })


    // Animation des sections + hero
    function callAnim(selecteur, eventToListen) {
        var selecteurs = document.querySelectorAll(selecteur);
        if(selecteurs) {
            window.addEventListener(eventToListen, function() {
                selecteurs.forEach(function (section) {
                    var sectionTop = section.getBoundingClientRect().top;  
                    var windowHeight = window.innerHeight;  
                    var coef = 0;
                    if (window.innerWidth >= 480) {
                        coef = 0.8;
                    }
                    else
                    {
                        coef = 1.2;
                    }				
                    if (sectionTop < windowHeight * coef) {
                        section.classList.add("fadeIn");
                    }
                    else {
                        section.classList.remove("fadeIn");
                    }
                });
            });
        };
    }
    callAnim("section", "scroll");
    callAnim(".block", "scroll");
    callAnim(".first", "scroll");
    callAnim(".second", "scroll");
    callAnim(".third", "scroll");
    callAnim(".blocks", "scroll");





    // Remplacement des photos par des blocs de texte 
    function replaceSquare() {
        var squares = document.querySelectorAll("div.square");
        if(squares) {
            squares.forEach(square => {
                square.addEventListener("mouseover", function() {
                    square.querySelector(".titleSquare").classList.remove("showWithTransition");
                    square.querySelector(".titleSquare").classList.add("hideWithTransition");
                    square.querySelector(".textBlock").classList.add("showWithTransition");
                });
                square.addEventListener("mouseout", function() {
                    square.querySelector(".titleSquare").classList.remove("showWithTransition");
                    square.querySelector(".titleSquare").classList.add("showWithTransition");
                    // square.querySelector(".titleSquare").classList.add("showWithTransition");
                    square.querySelector(".textBlock").classList.remove("showWithTransition");
                    square.querySelector(".textBlock").classList.add("hideWithTransition");
                });
            });
        };
    }
    replaceSquare();


    
    
    // Afficher/cacher le bouton hamburger du mobile
    function hamburger() {
		var hamburgerIcon = document.querySelector(".hamburger-icon");
        var hamburgerIconClose = document.querySelector(".hamburger-icon-close");
        var topMenu = document.getElementById("topMenu");
		if(hamburgerIcon) {
			hamburgerIcon.addEventListener("click", function() {
                hamburgerIcon.style.display = "none";
				hamburgerIconClose.style.display = "block";
                if(topMenu) {
                    topMenu.style.display = "block";
                };
			});
		};
        if(hamburgerIconClose) {
			hamburgerIconClose.addEventListener("click", function() {
                hamburgerIconClose.style.display = "none";
				hamburgerIcon.style.display = "block";
                if(topMenu) {
                    topMenu.style.display = "none";
                };
			});
		};
	}
	hamburger();

    
    





    document.addEventListener("DOMContentLoaded", (event) => { // On attend que toute la page soit chargée 
	
        var s = skrollr.init();
        
    
        // Animation des lignes du bouton toggle du menu
        document.getElementById("showMenu").style.display = "none";		
        document.querySelector('.menu-toggle').addEventListener('click',function() {
            var x = document.getElementById("site-navigation");
            var menu = document.getElementById("showMenu");
            var menuToggle = document.querySelector(".menu-toggle");
            if(x.className === "main-navigation toggled") {
                menu.style.display = "block";
                menuToggle.classList.add("rotate");		
            }
            else {
                menu.style.display = "none";
                menuToggle.classList.remove("rotate");
            }
        });
    
        // Cacher le menu plein écran qd un lien a été cliqué
        let linksMenu = document.querySelectorAll("a.animationDown");
        if(linksMenu) {
            linksMenu.forEach(linkMenu => {
                linkMenu.addEventListener("click",function(){
                    document.querySelector(".main-navigation").classList.remove("toggled");
                    document.querySelector(".menu-toggle").classList.remove("rotate");
                    document.querySelector(".menu-toggle").setAttribute("aria-expanded", false);
                    document.getElementById("showMenu").style.display = "none";
                });
            });
        }
    
    
        
    
    
    
        // Ajout de sticky au logo du hero
        var image = document.getElementById("Image");
        if(image) {
            window.addEventListener("scroll", function() {
                document.getElementById("Image").classList.add("sticky");
            });
        };
    
        
        // Animation des titres h2
        function toggleAnimClass(selecteur) {
            var selecteurs = document.querySelectorAll(selecteur);
            if(selecteurs) {
                window.addEventListener("scroll", function() {
                    selecteurs.forEach(function (div) {
                        var sectionTop = div.getBoundingClientRect().top;  
                        var windowHeight = window.innerHeight;  
    
                        var coef = 0;
                        if (window.innerWidth >= 480) {
                            coef = 0.8;
                        }
                        else
                        {
                            coef = 1.5;
                        }	
    
                        if (sectionTop < windowHeight * coef) {
                            div.classList.add("anim");
                        }
                        else
                        {
                            div.classList.remove("anim");
                        }
                    });
                });
            };
        }
        toggleAnimClass(".animatedTitle");
    
    
    
        // Animation personnages avec Swiper en coverflow

        var mySwiper = new Swiper('.swiper-container', {
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 3000,
            },
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 0,
                stretch: 80,
                depth: 200,
                modifier: 1,
                slideShadows: false,
            }

        })
        
    
    
    });

    
};
