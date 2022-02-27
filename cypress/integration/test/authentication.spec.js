/// <reference types="cypress" />

describe('Probando la autenticación', ()=> {
    it('Probando la páina', ()=> {
        cy.visit('/login');
        cy.get('[data-cy="heading-login"]').should('exist');
        cy.get('[data-cy="heading-login"]').invoke('text').should('equal', 'Iniciar sesión');

        cy.get('[data-cy="formulario-login"]').should('exist');

    });
    it('Probando falta de mail', ()=> {
        cy.get('[data-cy="password-login"]').type('123456');
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-error-login"]').should('exist').and('have.class', 'error');
        cy.get('[data-cy="alerta-error-login"]').invoke('text').should('equal', 'El email es obligatorio');
    });
    it('Probando falta de contraseña', ()=> {
        cy.visit('/login');
        cy.get('[data-cy="email-login"]').type('correo@correo.com');
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-error-login"]').should('exist').and('have.class', 'error');
        cy.get('[data-cy="alerta-error-login"]').invoke('text').should('equal', 'La contraseña es requerida');
    });
    it('Probando falta de existencia de usuario', ()=> {
        cy.visit('/login');
        cy.get('[data-cy="email-login"]').type('correofalso@correo.com');
        cy.get('[data-cy="password-login"]').type(123456);
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-error-login"]').should('exist').and('have.class', 'error');
        cy.get('[data-cy="alerta-error-login"]').invoke('text').should('equal', 'El usuario no existe');
    });
    it('Probando contraseña incorrecta', ()=> {
        cy.visit('/login');
        cy.get('[data-cy="email-login"]').type('correo@correo.com');
        cy.get('[data-cy="password-login"]').type(1234567);
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-error-login"]').should('exist').and('have.class', 'error');
        cy.get('[data-cy="alerta-error-login"]').invoke('text').should('equal', 'La contraseña es incorrecta');
    });
    it('Probando el login correcto', ()=> {
        cy.visit('/login');
        cy.get('[data-cy="email-login"]').type('correo@correo.com');
        cy.get('[data-cy="password-login"]').type('123456');
        cy.get('[data-cy="formulario-login"]').submit();
        
        //Una vez que somos redireccionados al login
        cy.url().should('equal', Cypress.config().baseUrl + '/');
        cy.get('[data-cy="header"]').should('exist');
        cy.get('[data-cy="header"]').invoke('text').should('equal', 'Venta de casas y departamentos exclusivos de lujo');
    });
});