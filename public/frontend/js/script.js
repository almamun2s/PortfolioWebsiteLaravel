$(document).ready(function () {

    // Mobile menu
    $("#show_menu").click(function () {
        $(this).addClass("hide");
        $("#hide_menu").removeClass("hide");
        $(".main_menu ul").slideDown(500, function () {
            $(this).css("display", "flex");
        });

    });
    $("#hide_menu").click(function () {
        $(this).addClass("hide");
        $("#show_menu").removeClass("hide");
        $(".main_menu ul").slideUp(500);
    });

    // Contact Form 
    $("#contact_btn").click(function () {
        $("#popup_contact").addClass("popup_contact_show");
    });;
    $("#xmark").click(function () {
        $("#popup_contact").removeClass("popup_contact_show");
    });

});


let contactBtn = document.querySelectorAll('.reach_btn')
let popUp = document.getElementById('popup_contact');
contactBtn.forEach(function (btn) {
    btn.addEventListener('click', function () {
        // alert('hi');
        popUp.classList.add('popup_contact_show');
    });
});

new WOW().init();

function animateProgressBar() {
    const progressBarAll = document.querySelectorAll('.progress-bar');
    progressBarAll.forEach(progressBar => {

        let targetValue = progressBar.getAttribute('aria-valuenow');
        let currentValue = 0;
        const interval = setInterval(() => {
            if (currentValue >= targetValue) {
                clearInterval(interval);
            } else {
                currentValue++;
                progressBar.style.width = currentValue + '%';
                progressBar.setAttribute('aria-valuenow', currentValue);
            }
        }, 20); // Adjust the interval for faster/slower animation
    });
}

document.querySelector('.progress').addEventListener('animationend', animateProgressBar());