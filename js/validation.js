document.addEventListener("DOMContentLoaded", function() {
    
    // --- VALIDIMI PËR LOGIN ---
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function(event) {
            // Këtu përdorim ID-të që janë te login.php (email dhe password)
            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value;
            
            if (email === "" || password === "") {
                alert("Ju lutem plotësoni të gjitha fushat!");
                event.preventDefault();
            }
        });
    }

    // --- VALIDIMI PËR REGJISTRIM ---
document.getElementById("registerForm").addEventListener("submit", function(event) {
    // Pastrojmë mesazhet e vjetra
    document.querySelectorAll(".error-msg").forEach(el => el.innerText = "");
    document.querySelectorAll("input").forEach(el => el.classList.remove("invalid"));

    let emri = document.getElementById("emri_reg").value.trim();
    let email = document.getElementById("email_reg").value.trim();
    let password = document.getElementById("password_reg").value;
    let valid = true;

    if (emri.length < 3) {
        document.getElementById("error-emri").innerText = "Emri duhet të ketë së paku 3 shkronja!";
        document.getElementById("emri_reg").classList.add("invalid");
        valid = false;
    }

    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById("error-email").innerText = "Ju lutem jepni një email të saktë!";
        document.getElementById("email_reg").classList.add("invalid");
        valid = false;
    }

    if (password.length < 6) {
        document.getElementById("error-pass").innerText = "Fjalëkalimi duhet të ketë së paku 6 karaktere!";
        document.getElementById("password_reg").classList.add("invalid");
        valid = false;
    }

    if (!valid) {
        event.preventDefault(); // Ndalon dërgimin nëse ka gabime
    }
});
});

// --- PJESA E RE PËR SLIDER-IN NË ABOUT ---
const dynSlider = document.getElementById('dynamic-slider');
const dynTitle = document.getElementById('slider-title');
const dynText = document.getElementById('slider-text');

if (dynSlider) {
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
    // Ndryshimi i fotos
    dynSlider.style.backgroundImage = `linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('${aboutSlides[currentIdx].img}')`;
    
    // Ndryshimi i tekstit (Kujdes: innerText me T të madhe)
    dynTitle.innerText = aboutSlides[currentIdx].title;
    dynText.innerText = aboutSlides[currentIdx].text;
    
    currentIdx = (currentIdx + 1) % aboutSlides.length;
}

// Thirrja e parë
startRotating();

// Ndërrimi çdo 4 sekonda
setInterval(startRotating, 4000);
}