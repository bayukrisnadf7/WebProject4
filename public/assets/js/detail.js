function changeImage(element) {
  // Mengambil gambar besar yang ada saat ini
  var mainImage = document.getElementById("main-image");

  // Mengambil gambar kecil yang diklik
  var clickedImage = element.src;

  // Mengganti src gambar besar dengan src gambar kecil yang diklik
  mainImage.src = clickedImage;

  // Mengganti src gambar kecil yang diklik dengan src gambar besar yang sebelumnya
  element.src = mainImage.src;
}

