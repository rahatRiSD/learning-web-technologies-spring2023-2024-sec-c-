
// Set the date we're counting down to (Bangla New Year 1429)
const newYearDate = new Date("2025-04-14T00:00:00+06:00").getTime();

// Update the countdown every second
const countdownFunction = setInterval(function() {
    const now = new Date().getTime();
    const distance = newYearDate - now;

    // Time calculations for days, hours, minutes, and seconds
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result
    document.getElementById("days").innerText = days;
    document.getElementById("hours").innerText = hours;
    document.getElementById("minutes").innerText = minutes;
    document.getElementById("seconds").innerText = seconds;

    // If the countdown is over, display a message
    if (distance < 0) {
        clearInterval(countdownFunction);
        document.getElementById("timer").innerText = "শুভ নববর্ষ!";
    }
}, 1000);
