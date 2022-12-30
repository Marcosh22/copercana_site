function increment_banner_click_count(banner_id) {
    fetch(`/api/banners/increment_click/${banner_id}`, {
      method: 'POST'
    });
}

// Create cookie
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// Delete cookie
function deleteCookie(cname) {
    const d = new Date();
    d.setTime(d.getTime() + (24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=;" + expires + ";path=/";
}

// Read cookie
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// Set cookie consent
function acceptCookieConsent(){
    deleteCookie('user_cookie_consent');
    setCookie('user_cookie_consent', 1, 30);
    document.getElementById("cookieNotice").style.display = "none";
}

function Marquee(selector, speed) {
    const parentSelector = document.querySelector(selector);
    const clone = parentSelector.innerHTML;
    const firstElement = parentSelector.children[0];
    let i = 0;
    parentSelector.insertAdjacentHTML('beforeend', clone);
    parentSelector.insertAdjacentHTML('beforeend', clone);
  
    setInterval(function () {
      firstElement.style.marginLeft = `-${i}px`;
      if (i > firstElement.clientWidth) {
        i = 0;
      }
      i = i + speed;
    }, 0);
  }

async function fetchQuotation() {
    let quotation_list;

    if (sessionStorage.getItem("cp-quotationlist")) {
        quotation_list = sessionStorage.getItem("cp-quotationlist");
    } else {
        quotation_list = await fetch("/cotacoes");
        quotation_list = await quotation_list.text();

        sessionStorage.setItem("cp-quotationlist", quotation_list);
    }

    return quotation_list;
}

const speechUtteranceChunker = function (utt, settings, callback) {
    settings = settings || {};
    var chunkLength = settings && settings.chunkLength || 160;
    var pattRegex = new RegExp('^.{' + Math.floor(chunkLength / 2) + ',' + chunkLength + '}[\.\!\?\,]{1}|^.{1,' + chunkLength + '}$|^.{1,' + chunkLength + '} ');
    var txt = (settings && settings.offset !== undefined ? utt.text.substring(settings.offset) : utt.text);
    var chunkArr = txt.match(pattRegex);

    if (chunkArr[0] !== undefined && chunkArr[0].length > 2) {
        var chunk = chunkArr[0];
        var newUtt = new SpeechSynthesisUtterance(chunk);
        for (x in utt) {
            if (utt.hasOwnProperty(x) && x !== 'text') {
                newUtt[x] = utt[x];
            }
        }
        newUtt.onend = function () {
            settings.offset = settings.offset || 0;
            settings.offset += chunk.length - 1;
            speechUtteranceChunker(utt, settings, callback);
        }
        console.log(newUtt); //IMPORTANT!! Do not remove: Logging the object out fixes some onend firing issues.
        //placing the speak invocation inside a callback fixes ordering and onend issues.
        setTimeout(function () {
            speechSynthesis.speak(newUtt);
        }, 0);
    } else {
        //call once all text has been spoken...
        if (callback !== undefined) {
            callback();
        }
    }
}

function startTts() {
    let synth = window.speechSynthesis;

    function selection() {
        let selection = "Nenhum texto selecionado.";

        if (window.getSelection) {
            let text_selection = window.getSelection();

            if (text_selection && text_selection.baseNode && text_selection.baseNode.data) selection = text_selection;
        }

        console.log(selection);

        return selection;
    }

    const button = document.getElementById('tts-button');

    let voice;

    function getVoice() {
        let voices = synth.getVoices();

        voices = voices.filter((item) => {
            return item.lang === 'pt-BR';
        });

     /*    let filtered_voice = voices.filter((item) => {
            return item.voiceURI === 'Google português do Brasil';
        });

        voice = filtered_voice.length > 0 ? filtered_voice[0] : voices[0]; */

        voice = voices[0];
    }

    getVoice();

    if (speechSynthesis.onvoiceschanged !== undefined) {
        speechSynthesis.onvoiceschanged = getVoice;
    }

    button.addEventListener('click', function (event) {
        event.preventDefault();

        const utterThis = new SpeechSynthesisUtterance(selection());

        utterThis.voice = voice;
        utterThis.pitch = 1;
        utterThis.rate = 1;
        utterThis.volume = 1;

        synth.speak(utterThis);

        setInterval(function(){
            if (synth.paused) {
                console.log("#continue")
                synth.resume();
            }
        }, 100);
    })

    //synth.cancel();
}

document.addEventListener('DOMContentLoaded', async function () {
    let close_menu_button = document.getElementById('close-menu-btn');
    let open_menu_button = document.getElementById('open-menu-btn');

    function closeNav() {
        const navbar = document.getElementById('navbar');
        if(navbar.classList.contains('show')) navbar.classList.remove('show');
    }

    function openNav() {
        const navbar = document.getElementById('navbar');
        if(!navbar.classList.contains('show')) navbar.classList.add('show');
    }

    if(close_menu_button) close_menu_button.addEventListener('click', function(event) {
        event.preventDefault();
        closeNav();
    });

    if(open_menu_button) open_menu_button.addEventListener('click', function(event) {
        event.preventDefault();
        openNav();
    });

    let cookie_consent = getCookie("user_cookie_consent");

    if(cookie_consent != ""){
        document.getElementById("cookieNotice").style.display = "none";
    }else{
        document.getElementById("cookieNotice").style.display = "block";
    }

    let quotation_container = document.getElementById('quotation-container');

    if(quotation_container) {
        let quotation_list = await fetchQuotation();
        quotation_container.innerHTML = quotation_list;

        if(document.querySelector('.marquee')) window.addEventListener('load', Marquee('.marquee', 0.2));
    }

    new window.VLibras.Widget('https://vlibras.gov.br/app');

    startTts();
}, false);