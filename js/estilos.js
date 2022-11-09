window.addEventListener('load', () => {

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
    // document.getElementsByClassName('hola')[0].onclick = () => {
    //     alert('img');
    // }
    // document.getElementsByClassName('hola')[0].addEventListener('click', () => {
    //     alert('img');
    // })
    
})