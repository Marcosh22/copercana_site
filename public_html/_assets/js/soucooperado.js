document.addEventListener('DOMContentLoaded', function () {
    let radioOpts = document.querySelectorAll("input[name='is-cooperated']");
    let form = document.getElementById("contact-form");
    let popup = document.getElementById("message-popup");

    if(radioOpts) radioOpts.forEach((input) => {
        input.addEventListener('change', (evt) => {
            let { value } = evt.target;

            if(parseInt(value)) {
                if(form.classList.contains('d-none')) form.classList.remove('d-none');
            } else {
                if(!form.classList.contains('d-none')) form.classList.add('d-none');
                if(popup.classList.contains('d-none')) popup.classList.remove('d-none');
            }
        })
    });

    popup.addEventListener('click', function() {
        if(!popup.classList.contains('d-none')) popup.classList.add('d-none');
    })
});