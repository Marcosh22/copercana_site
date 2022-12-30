let radios = document.querySelectorAll('input[type=radio][name="person_type"]');
let input = document.getElementById('cpf_cnpj');

function changeHandler(event) {
    if ( this.value === 'pf' ) {
        if(input) {
            if(input.classList.contains('mask-cnpj')) input.classList.remove('mask-cnpj');
            if(!input.classList.contains('mask-cpf')) input.classList.add('mask-cpf');
            input.setAttribute('placeholder', 'CPF');
        }
    } else if ( this.value === 'pj' ) {
        if(input) {
            if(input.classList.contains('mask-cpf')) input.classList.remove('mask-cpf');
            if(!input.classList.contains('mask-cnpj')) input.classList.add('mask-cnpj');
            input.setAttribute('placeholder', 'CNPJ');
        }
    }  

    $(".mask-cpf").mask("999.999.999-99");
	$(".mask-cnpj").mask("99.999.999/9999-99");
 }

 Array.prototype.forEach.call(radios, function(radio) {
    radio.addEventListener('change', changeHandler);
 });