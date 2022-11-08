window.addEventListener('load', () => {

    if (document.getElementsByClassName('error-msg')[0]) {
        document.getElementsByClassName('error-msg')[0].classList.add('animation-error');
    }

    const tipos = document.getElementsByClassName('tipo');
    console.log(tipos.length);
    var tsala = '';
    var nsala = '';
    for (let i = 0; i < tipos.length; i++) {
        nsala = tipos[i].getElementsByClassName('salas')[0].className.split(' ')[1];
        console.log(nsala);
        var csala = tipos[i].getElementsByClassName(nsala);
        console.log(csala.length);
        for (let j = 0; j < csala.length; j++) {

            tsala = csala[j];
            console.log(tsala);
            tsala.onclick = () => {
                console.log(tsala);
                tsala.classList.toggle('mostrar');
                // tsala.getElementsByTagName('h3')[0].classList.toggle('info-salas');
                // tsala.getElementsByClassName('info-salas')[0].classList.toggle('mostrar');
                // for (let j = 0; j < tsala.getElementsByClassName('salas').length; j++) {
                //     tsala.getElementsByClassName('salas')[j].classList.toggle(nsala);
                // }
            }
        }
        // tsala.onmouseout = () => {
        //     tsala.classList.remove('remove')
        //     for (let j = 0; j < tsala.getElementsByClassName('salas').length; j++) {
        //         tsala.getElementsByClassName('salas')[j].classList.remove(nsala);
        //     }
        // }
    }

    // const tipos2 = document.getElementsByClassName('tipo-sal');
    // for (let i = 0; i < tipos2.length; i++) {
    //     let nsala = tipos2[i].className.split(' ')[1]
    //     // console.log(nsala);
    //     let tsala = document.getElementsByClassName(nsala)[0]
    //     tsala.onclick = () => {
    //         // tsala.classList.add('remove')
    //         // console.log(document.getElementsByClassName('modal')[i].className == 'modal '+nsala);
    //         if (document.getElementsByClassName('modal')[i].className == 'modal '+nsala) {
    //             // for (let j = 0; j < tsala.getElementsByClassName('salas').length; j++) {
    //             //     tsala.getElementsByClassName('salas')[j].classList.add(nsala);
    //             // }
    //             // console
    //             document.getElementsByClassName('modal')[i].classList.add('mostrar');
    //         }
    //     }
        // tsala.onclick = () => {
        //     tsala.classList.remove('remove')
        //     for (let j = 0; j < tsala.getElementsByClassName('salas').length; j++) {
        //         tsala.getElementsByClassName('salas')[j].classList.remove(nsala);
        //     }
        // }
    // }
})