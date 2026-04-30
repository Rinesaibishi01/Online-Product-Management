// Sigurohemi qe kodi ekzekutohet pasi te ngarkohet HTML-i
document.addEventListener("DOMContentLoaded", function() {

    // VALIDIMI I LOGIN-IT ---
    var loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function(event) {
            var email = document.getElementById("loginEmail").value;
            var pass = document.getElementById("loginPass").value;

            if (email === "" || pass === "") {
                alert("Ju lutem plotësoni të gjitha fushat!");
                event.preventDefault(); // Ndalon dergimin e formes[cite: 2]
            }
        });
    }

    //  VALIDIMI I REGJISTRIMIT ME REGEX ---
    var registerForm = document.getElementById("registerForm");
    if (registerForm) {
        registerForm.addEventListener("submit", function(event) {
            var emri = document.getElementById("regEmri").value;
            var email = document.getElementById("regEmail").value;
            var pass = document.getElementById("regPass").value;
            var errorMsg = document.getElementById("error-message");

            // Pastron mesazhin e gabimit paraprak
            errorMsg.innerText = "";

            // emaili me regex
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (emri.length < 3) {
                errorMsg.innerText = "Emri duhet te kete se paku 3 karaktere!";
                event.preventDefault();
            } 
            else if (!emailRegex.test(email)) {
                errorMsg.innerText = "Email adresa nuk eshte valide!";
                event.preventDefault();
            } 
            else if (pass.length < 6) {
                errorMsg.innerText = "Fjalekalimi duhet te kete se paku 6 karaktere!";
                event.preventDefault();
            }
        });
    }

    // SLIDER-I DINAMIK ne pjesen e about
    var slides = [
        {
            foto: "img/restaurant1.jpg",
            titulli: "Kush jemi ne?",
            pershkrimi: "Ne ofrojmë shërbimet më të mira që nga viti 2010."
        },
        {
            foto: "img/restaurant2.jpg",
            titulli: "Misioni ynë",
            pershkrimi: "Ushqim i freskët dhe ambient i ngrohtë për familjen tuaj."
        }
    ];

    var index = 0;
    var sliderContainer = document.getElementById("slider-bg");

    function ndryshoSliderin() {
        if (sliderContainer) {
            // Ndryshojme background-in dhe tekstin permes DOM-it[cite: 2]
            sliderContainer.style.backgroundImage = "url('" + slides[index].foto + "')";
            document.getElementById("slider-title").innerText = slides[index].titulli;
            document.getElementById("slider-text").innerText = slides[index].pershkrimi;

            index = (index + 1) % slides.length; // Ciklimi i slider-it
        }
    }

    // ndrrohet fotoja çdo 4 sekonda
    if (sliderContainer) {
        setInterval(ndryshoSliderin, 4000);
        ndryshoSliderin(); // Thirrja e pare
    }
});