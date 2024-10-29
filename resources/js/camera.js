document
    .getElementById("openCameraButton")
    .addEventListener("click", openCamera);
document.getElementById("takePhotoButton").addEventListener("click", takePhoto);

let stream;

function openCamera() {
    const cameraContainer = document.getElementById("cameraContainer");
    cameraContainer.style.display = "block"; // Menampilkan elemen video

    // Mengakses kamera
    navigator.mediaDevices
        .getUserMedia({ video: true })
        .then((s) => {
            stream = s;
            const video = document.getElementById("cameraVideo");
            video.srcObject = stream;
        })
        .catch((error) => {
            console.error("Gagal mengakses kamera:", error);
        });
}

function takePhoto() {
    const video = document.getElementById("cameraVideo");
    const canvas = document.createElement("canvas");
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    // Menggambar frame video ke canvas
    canvas.getContext("2d").drawImage(video, 0, 0, canvas.width, canvas.height);

    // Menampilkan hasil foto
    const photoContainer = document.getElementById("photoContainer");
    const photo = document.getElementById("photo");
    photo.src = canvas.toDataURL("image/png");
    photoContainer.style.display = "block";
}

// Hentikan streaming saat halaman ditutup
window.addEventListener("beforeunload", () => {
    if (stream) {
        const tracks = stream.getTracks();
        tracks.forEach((track) => track.stop());
    }
});
