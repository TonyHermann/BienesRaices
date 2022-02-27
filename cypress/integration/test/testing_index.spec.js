/// <reference types="cypress" />

describe('Testing index', ()=> {
    it('Probar Header', ()=>{
        cy.visit('/');
        cy.get('[data-cy="header"]').should('exist');
        cy.get('[data-cy="header"]').invoke('text').should('equal', 'Venta de casas y departamentos exclusivos de lujo')
    });
    it('Probar AboutUs', ()=>{
        cy.visit('/');
        cy.get('[data-cy="iconos-nosotros"]').should('exist');
        cy.get('[data-cy="iconos-nosotros"]').find('.card').should('have.length', 3);
    });
    it('Probar Listado Anuncios', ()=>{
        cy.visit('/');
        cy.get('[data-cy="anuncio"]').should('exist');
        cy.get('[data-cy="anuncio"]').should('have.length', 3);

        cy.get('[data-cy="boton-ver-propiedad"]').should('exist');
        cy.get('[data-cy="boton-ver-propiedad"]').first().should('exist');
        cy.get('[data-cy="boton-ver-propiedad"]').should('have.class', 'boton-amarillo-block');

        cy.get('[data-cy="boton-ver-propiedad"]').first().click();
        cy.get('[data-cy="propiedad-titulo"]').should('exist');
        cy.get('[data-cy="propiedad-titulo"]').should('have.prop', 'tagName').should('equal', 'H1');

        // cy.wait(500);
        cy.go('back'); 

        cy.get('[data-cy="ver-mas-boton"]').should('exist');
        cy.get('[data-cy="ver-mas-boton"]').should('have.class', 'boton-verde');
        cy.get('[data-cy="ver-mas-boton"]').invoke('text').should('equal', 'Ver más');
        cy.get('[data-cy="ver-mas-boton"]').invoke('attr', 'href').should('equal', '/anuncios');
        cy.get('[data-cy="ver-mas-boton"]').click();

        cy.get('[data-cy="anuncios-titulo"]').should('have.prop', 'tagName').should('equal', 'H1');
        // cy.wait(500);
        cy.go('back'); 

    });
    it('Probar seccion contacto', ()=> {
        cy.get('[data-cy="seccion-contacto"]').should('exist');
        cy.get('[data-cy="seccion-contacto"]').find('h2').invoke('text').should('equal', 'Encuentra la casa de tus sueños');
        cy.get('[data-cy="seccion-contacto"]').find('p').invoke('text').should('equal', 'Llena el contacto de formulario y un asesor se pondrá en contacto contigo a la brevedad.');
        cy.get('[data-cy="seccion-contacto"]').find('a').should('have.class', 'boton-amarillo');
        cy.get('[data-cy="seccion-contacto"]').find('a').invoke('attr', 'href').should('equal', '/contacto');
        cy.get('[data-cy="seccion-contacto"]').find('a').invoke('attr', 'href')
            .then( href => {
                cy.visit(href);
            });
        
        cy.get('[data-cy="contacto-titulo"]').should('exist');
        cy.get('[data-cy="contacto-titulo"]').should('have.prop', 'tagName').should('equal', 'H1');

        // cy.wait(500);
        cy.visit('/'); 

    });
    it('Probando blog y testimoniales', ()=>{
        cy.get('[data-cy="blog"]').should('exist');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal', 'Nuestro Blog');
        cy.get('[data-cy="blog"]').find('img').should('have.length', 3);

        cy.get('[data-cy="testimoniales"]').should('exist');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('equal', 'Testimoniales');
    });
});
