// script.js
document.querySelectorAll(".menu-button").forEach((button) => {
    button.addEventListener("click", () => {
        alert(`${button.textContent} button clicked!`);
    });
});

document
    .querySelector(".icon-button.settings")
    .addEventListener("click", () => {
        alert("Open settings");
    });

// Elemen
const musicButtonOn = document.getElementById("musicButtonOn");
const musicButtonOff = document.getElementById("musicButtonOff");
const backgroundMusic = document.getElementById("backgroundMusic");

// Fungsi untuk memperbarui tampilan tombol
function toggleButtons(isPlaying) {
    if (isPlaying) {
        musicButtonOn.style.display = "none";
        musicButtonOff.style.display = "block";
    } else {
        musicButtonOn.style.display = "block";
        musicButtonOff.style.display = "none";
    }
}

// Memutar musik secara otomatis saat halaman dimuat
window.addEventListener("load", () => {
    backgroundMusic.play().then(() => {
        toggleButtons(true); // Tampilkan tombol "Off"
    }).catch((error) => {
        console.error("Audio autoplay error:", error);
    });
});

// Tombol "On" ditekan (Memutar musik)
musicButtonOn.addEventListener("click", () => {
    backgroundMusic.play();
    toggleButtons(true); // Tampilkan tombol "Off"
});

// Tombol "Off" ditekan (Menghentikan musik)
musicButtonOff.addEventListener("click", () => {
    backgroundMusic.pause();
    toggleButtons(false); // Tampilkan tombol "On"
});


