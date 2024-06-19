document.addEventListener('DOMContentLoaded', function () {
    const slider2 = document.querySelector('.slider2');
    const slides2 = document.querySelectorAll('.slidee2');
    const prevBtn2 = document.querySelector('.prev-btn2');
    const nextBtn2 = document.querySelector('.next-btn2');
  
    let counter = 0;
    const slideeWidth = slides2[0].offsetWidth + 20; // Lebar slide + margin-right
  
    function nextSlidee() {
      counter++;
      if (counter >= slides2.length) {
        counter = 0; // Kembali ke slide pertama jika mencapai akhir
      }
      slider2.style.transition = 'transform 0.5s ease-in-out'; // Tambahkan transition
      slider2.style.transform = `translateX(-${slideeWidth * counter}px)`;
    }
  
    function prevSlidee() {
      counter--;
      if (counter < 0) {
        counter = slides2.length - 1; // Pindah ke slide terakhir jika di awal
      }
      slider2.style.transition = 'transform 0.5s ease-in-out'; // Tambahkan transition
      slider2.style.transform = `translateX(-${slideeWidth * counter}px)`;
    }
  
    // Tambahkan event listener untuk tombol next dan prev
    nextBtn2.addEventListener('click', nextSlidee);
    prevBtn2.addEventListener('click', prevSlidee);
  });
  