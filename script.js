const startingminutes = 10;
let time = startingminutes * 60;

const countdownEL = document.getElementById('countdown');

const interval = setInterval(updateCountdown,1000);

function updateCountdown() {
    const minutes = Math.floor(time/60);
    let seconds = time % 60;
    
    seconds = seconds < 10 ? '0'+ seconds : seconds;

    countdownEL.innerHTML = `${minutes}: ${seconds}`;

    if(time<1){
        clearInterval(interval);
        document.getElementById("my_form").submit();
    }
    time--;
}