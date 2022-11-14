window.addEventListener('load', () => {
    if (document.getElementsByClassName('active') && document.getElementById('activa')) {
    document.getElementById('activa').classList.add('active');
    ver(document.getElementById('activa').value);

        document.getElementById('activa').onclick = () => {
            document.getElementsByClassName('active')[0].classList.remove('active');
            document.getElementById('activa').classList.add('active');
            document.getElementsByTagName('body')[0].classList.remove('resp-scroll');
            document.getElementById('test').classList.remove('resp');
            ver(document.getElementById('activa').value);
        }
        document.getElementById('finalizar').onclick = () => {
            document.getElementsByClassName('active')[0].classList.remove('active');
            document.getElementById('finalizar').classList.add('active');
            document.getElementsByTagName('body')[0].classList.remove('resp-scroll');
            document.getElementById('test').classList.remove('resp');
            ver(document.getElementById('finalizar').value);
        }
        document.getElementById('estadis').onclick = () => {
            document.getElementsByClassName('active')[0].classList.remove('active');
            document.getElementById('estadis').classList.add('active');
            document.getElementsByTagName('body')[0].classList.add('resp-scroll');
            document.getElementById('test').classList.toggle('resp');
            ver(document.getElementById('estadis').value);
        }
    } 
});