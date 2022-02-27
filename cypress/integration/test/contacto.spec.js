/// <reference types="cypress" />

describe('Probando la página de contacto', ()=> {
    it('Probando titulos', ()=>{
        cy.visit('/contacto');

        cy.get('[data-cy="contacto-titulo"]').should('exist');
        cy.get('[data-cy="contacto-titulo"]').invoke('text').should('equal', 'Contacto');
        
        cy.get('[data-cy="titulo-formulario"]').should('exist');
        cy.get('[data-cy="titulo-formulario"]').invoke('text').should('equal', 'Llene el formulario de contacto');

        cy.get('[data-cy="formulario"]').should('exist');

    });

    it('Probando el formulario', ()=> {
        cy.get('[data-cy="nombre"]').should('exist');
        cy.get('[data-cy="nombre"]').type('Tony');

        cy.get('[data-cy="mensaje"]').should('exist');
        cy.get('[data-cy="mensaje"]').type('Deseo comprar una casa!');

        cy.get('[data-cy="input-opciones"]').select('Compra');

        cy.get('[data-cy="presupuesto"]').type('99999');

        cy.get('[data-cy="forma-contacto"]').eq(1).check();

        cy.get('[data-cy="email"]').should('exist');

        cy.wait(10);

        cy.get('[data-cy="forma-contacto"]').eq(0).check();

        cy.get('[data-cy="telefono"]').should('exist');
        cy.get('[data-cy="telefono"]').type('3513334444')


        cy.get('[data-cy="fecha"]').should('exist');
        cy.get('[data-cy="fecha"]').type('2004-01-12');

        cy.get('[data-cy="hora"]').should('exist');
        cy.get('[data-cy="hora"]').type('12:30')


        cy.get('[data-cy="formulario"]').submit();
        
        cy.get('[data-cy="alerta-exito"]').should('exist');



    
    });
});