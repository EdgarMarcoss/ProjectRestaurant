window.addEventListener('load', () => {
    document.getElementById('activa').classList.add('active')
    ver(document.getElementById('activa').value)

    if (document.getElementsByClassName('active')) {
        document.getElementById('activa').onclick = () => {
            document.getElementById('finalizar').classList.remove('active');
            document.getElementById('activa').classList.add('active');
            ver(document.getElementById('activa').value);
        }
        document.getElementById('finalizar').onclick = () => {
            document.getElementById('activa').classList.remove('active');
            document.getElementById('finalizar').classList.add('active');
            ver(document.getElementById('finalizar').value);
        }
    } else {

        document.getElementById('activa').onclick = () => {
            document.getElementById('activa').classList.add('active');
            ver(document.getElementById('activa').value);
        }
        document.getElementById('finalizar').onclick = () => {
            document.getElementById('finalizar').classList.add('active');
            ver(document.getElementById('finalizar').value);
        }
    }
});