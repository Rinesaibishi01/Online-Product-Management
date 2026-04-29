document.addEventListener("DOMContentLoaded", function() {
    
    // --- 1. VALIDIMI PËR LOGIN ---
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function(event) {
            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value;
            
            if (email === "" || password === "") {
                alert("Ju lutem plotësoni të gjitha fushat!");
                event.preventDefault(); // Ndalon dërgimin e formës
            }
        });
    }

    // --- 2. VALIDIMI PËR REGJISTRIM ---
    const registerForm = document.getElementById("registerForm");
    if (registerForm) {
        registerForm.addEventListener("submit", function(event) {
            // Pastrojmë mesazhet e vjetra të gabimeve (nëse ekzistojnë)
            document.querySelectorAll(".error-msg").forEach(el => el.innerText = "");
            document.querySelectorAll("input").forEach(el => el.classList.remove("invalid"));

            let emri = document.getElementById("emri_reg").value.trim();
            let email = document.getElementById("email_reg").value.trim();
            let password = document.getElementById("password_reg").value;
            let valid = true;

            // Validimi i Emrit (së paku 3 karaktere)
            if (emri.length < 3) {
                const errEmri = document.getElementById("error-emri");
                if(errEmri) errEmri.innerText = "Emri duhet të ketë së paku 3 shkronja!";
                document.getElementById("emri_reg").classList.add("invalid");
                valid = false;
            }

            // Validimi i Email-it me Regex (Plain JS)
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                const errEmail = document.getElementById("error-email");
                if(errEmail) errEmail.innerText = "Ju lutem jepni një email të saktë!";
                document.getElementById("email_reg").classList.add("invalid");
                valid = false;
            }

            // Validimi i Password-it (së paku 6 karaktere)
            if (password.length < 6) {
                const errPass = document.getElementById("error-pass");
                if(errPass) errPass.innerText = "Fjalëkalimi duhet të ketë së paku 6 karaktere!";
                document.getElementById("password_reg").classList.add("invalid");
                valid = false;
            }

            if (!valid) {
                event.preventDefault(); // Ndalon dërgimin nëse ka gabime
            }
        });
    }

    // --- 3. SLIDER-I DINAMIK (PËR FAQEN ABOUT) ---
    const dynSlider = document.getElementById('dynamic-slider');
    const dynTitle = document.getElementById('slider-title');
    const dynText = document.getElementById('slider-text');

    if (dynSlider && dynTitle && dynText) {
        const aboutSlides = [
            {
                img: "https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg",
                title: "TEKNOLOGJIA E FUNDIT",
                text: "Laptopë me performancë të lartë për çdo nevojë."
            },
            {
                img: "https://images.pexels.com/photos/404280/pexels-photo-404280.jpeg",
                title: "SMARTPHONES MODERNE",
                text: "Zbuloni modelet më të reja në dyqanin tonë."
            },
            {
                img: "https://images.pexels.com/photos/3182773/pexels-photo-3182773.jpeg",
                title: "EKIP PROFESIONIST",
                text: "Asistencë teknike për çdo blerje tuajën."
            }
        ];

        let currentIdx = 0;

        function startRotating() {
            // Ndryshimi i fotos me efekt fade (përmes CSS background)
            dynSlider.style.backgroundImage = `linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('${aboutSlides[currentIdx].img}')`;
            dynSlider.style.backgroundSize = "cover";
            dynSlider.style.backgroundPosition = "center";
            
            // Ndryshimi i tekstit dinamik
            dynTitle.innerText = aboutSlides[currentIdx].title;
            dynText.innerText = aboutSlides[currentIdx].text;
            
            // Logjika e ciklimit (Modulo %)
            currentIdx = (currentIdx + 1) % aboutSlides.length;
        }

        // Fillimi i menjëhershëm dhe pastaj çdo 4 sekonda
        startRotating();
        setInterval(startRotating, 4000);
    }
});