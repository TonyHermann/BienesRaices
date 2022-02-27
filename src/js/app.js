document.addEventListener('DOMContentLoaded', function() {

    iniciarApp();

});

const moon = document.querySelector('#moon');
const body = document.querySelector('body');
const hamb = document.querySelector('#hamburger');
const list = document.querySelector('.list');

let darkMode = ()=> {
    body.classList.toggle('darkmode');
}

let toggleHamburger = ()=> {
    list.classList.toggle('on');
}

let recogniseTheme = ()=> {
    const prefersDarkTheme =  window.matchMedia('(prefers-color-scheme: dark)');

    if(prefersDarkTheme.matches) {
        body.classList.add('darkmode');
    }
}

let eventListeners = ()=> {
    moon.addEventListener('click', darkMode);
    hamb.addEventListener('click', toggleHamburger);
    
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosDeContacto));

} 

let mostrarMetodosDeContacto = (e)=> {
    console.log('hola');
    const contactoDiv = document.querySelector('#contacto');
    if(e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
        <p>Eligió TELEFONO. Elija la fecha, la hora y su nro</p>
        <label for="telefono">Teléfono</label>
        <input data-cy="telefono" type="tel" id="telefono" placeholder="Teléfono" name="contacto[telefono]" required>
        <div class="fechayhora">
            <label for="fecha">Fecha</label>
            <input data-cy="fecha" type="date" id="fecha" name="contacto[fecha]">
            <label for="hora">Hora</label>
            <input data-cy="hora" type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        </div>
        `;
    } else {
        contactoDiv.innerHTML = `
        <label for="email">Email</label>
        <input data-cy="email" type="email" id="email" placeholder="Email"name="contacto[email]" required>
        `;
    }
}

let iniciarApp = ()=> {
    eventListeners();
    recogniseTheme();
}