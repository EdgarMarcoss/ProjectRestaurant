window.addEventListener('load', () => {

    if (document.getElementsByClassName('carga')[0]) {
        document.getElementsByClassName('carga')[0].classList.add('normal');
        setTimeout(function(){
            document.getElementsByClassName('carga')[0].classList.remove('normal');
        }, 3000);
    }

    if (document.getElementsByClassName('error-msg')[0]) {
        document.getElementsByClassName('error-msg')[0].classList.add('animation-error');
        setTimeout(function(){
            document.getElementsByClassName('error-msg')[0].classList.remove('animation-error');
        }, 3000);
    }

    const s = document.getElementsByClassName('salas');
    for (let i = 0; i < s.length; i++) {
        s.item(i).onclick = () => {
            s.item(i).classList.toggle('mostrar');
            s.item(i).getElementsByTagName('div')[0].getElementsByTagName('div')[0].classList.toggle('mostrar');
            s.item(i).getElementsByTagName('h3')[0].classList.toggle('info-salas');
        }
    }
    // console.log(document.getElementsByClassName('salas')[0].click());

    if (document.getElementById('all-salas')) {
        document.getElementById('all-salas').onclick = () => {
            for (let i = 0; i < s.length; i++) {
                s.item(i).click();
            }
        }
    }
    // document.getElementsByClassName('hola')[0].onclick = () => {
    //     alert('img');
    // }
    // document.getElementsByClassName('hola')[0].addEventListener('click', () => {
    //     alert('img');
    // })
    if (document.getElementsByClassName('limites')[0]){
        if (document.getElementsByClassName('limites')[0].childElementCount == 4) {
            document.getElementsByClassName('limites')[0].classList.add('terraza')
        } else if (document.getElementsByClassName('limites')[0].childElementCount == 8) {
            document.getElementsByClassName('limites')[0].classList.add('comedor')
            document.getElementsByClassName('limites')[0].firstElementChild.style = 'transform: rotate(90deg);';
            document.getElementsByClassName('limites')[0].firstElementChild.classList.add('m-ini');
            document.getElementsByClassName('limites')[0].lastElementChild.style = 'transform: rotate(90deg)';
            document.getElementsByClassName('limites')[0].lastElementChild.classList.add('m-fin');
        } else {
            document.getElementsByClassName('limites')[0].classList.add('privada')
        }
    }
})