document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slidee');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
  
    let counter = 0;
    const slideeWidth = slides[0].offsetWidth + 20; // Lebar slide + margin-right
  
    function nextSlidee() {
      counter++;
      if (counter >= slides.length) {
        counter = 0; // Kembali ke slide pertama jika mencapai akhir
      }
      slider.style.transition = 'transform 0.5s ease-in-out'; // Tambahkan transition
      slider.style.transform = `translateX(-${slideeWidth * counter}px)`;
    }
  
    function prevSlidee() {
      counter--;
      if (counter < 0) {
        counter = slides.length - 1; // Pindah ke slide terakhir jika di awal
      }
      slider.style.transition = 'transform 0.5s ease-in-out'; // Tambahkan transition
      slider.style.transform = `translateX(-${slideeWidth * counter}px)`;
    }
  
    // Tambahkan event listener untuk tombol next dan prev
    nextBtn.addEventListener('click', nextSlidee);
    prevBtn.addEventListener('click', prevSlidee);
  });
  