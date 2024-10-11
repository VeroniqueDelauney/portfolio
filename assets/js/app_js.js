if (typeof $ === "undefined") {
	var $ = jQuery;
}


document.addEventListener("DOMContentLoaded", (event) => { // On attend que toute la page soit chargée 
	
        
    window.onload = function(){

    
        // Effet fade in au chargement de la page
        document.getElementById("page").style.opacity = "1";
    
    
        
        // Animation Swiper pour bloc "Compétences"
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


        // Retour haut de page
        var scrollTop = document.querySelector(".backTop");
        window.onscroll = function(){
            scrollfunction()
        };
        function scrollfunction(){
            if( document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
                scrollTop.style.display = "block";
            } else {
                scrollTop.style.display = "none";
            }
        }
        scrollTop.addEventListener("click", function(){
            window.scrollTo({
                left: 0,
                top: 0,
                behavior: "smooth"
            })
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
    

        
        
        // Loading page    
        let loading = document.getElementById("loading");
        setTimeout(function() {
            loading.style.opacity = 0;
            setTimeout(function() {
                loading.style.display = "none";
            }, 1300);
        }, 1300);
    
    
    
    
    
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
        var hamburgerIcon = document.querySelector(".hamburger-icon");
        var menu = document.querySelector(".menu");
        var logo = document.querySelector(".logo");
        var close = document.querySelector(".close");
        if(hamburgerIcon) {
            hamburgerIcon.addEventListener("click", function() {
                hamburgerIcon.classList.toggle("show");
                logo.classList.toggle("show");
                menu.classList.toggle("show");                
                if(close) {
                    close.classList.toggle("show");                        
                }                
            });
            close.addEventListener("click", function() {
                logo.classList.toggle("show");
                menu.classList.toggle("show");
                hamburgerIcon.classList.toggle("show");
                close.classList.toggle("show");
            });
        };       
        
        
    };
    
    
    
});