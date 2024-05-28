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
  
  document.addEventListener("DOMContentLoaded", function() {
    startCountdown("countdown-timer-1", "June 04, 2024 00:00:00");
    startCountdown("countdown-timer-2", "June 01, 2024 00:00:00");
    // Tambahkan lebih banyak panggilan ke startCountdown sesuai kebutuhan
  });

function startCountdown(elementId, endDate) {
  var countdownElement = document.getElementById(elementId);
  var endTime = new Date(endDate).getTime();

  var countdownInterval = setInterval(function() {
    var now = new Date().getTime();
    var distance = endTime - now;

    if (distance < 0) {
      clearInterval(countdownInterval);
      countdownElement.innerHTML = "EXPIRED";
      return;
    }

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    countdownElement.innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
  }, 1000);
}
