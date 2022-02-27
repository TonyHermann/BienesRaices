/// <reference types="cypress" />

describe('Testing Router', ()=> {
    it('Probando navegación del header', ()=> {
        cy.visit('/');
        
        cy.get('[data-cy="navbar_header_ul"]').should('exist');
        cy.get('[data-cy="navbar_header_ul"]').find('a').should('have.length', '4');
        
        cy.get('[data-cy="navbar_header_ul"]').find('a').eq('0').invoke('attr', 'href').should('equal', '/nosotros');
        cy.get('[data-cy="navbar_header_ul"]').find('a').eq('0').invoke('text').should('equal', 'Nosotros');

        cy.get('[data-cy="navbar_header_ul"]').find('a').eq('1').invoke('attr', 'href').should('equal', '/anuncios');
        cy.get('[data-cy="navbar_header_ul"]').find('a').eq('1').invoke('text').should('equal', 'Anuncios');

        cy.get('[data-cy="navbar_header_ul"]').find('a').eq('2').invoke('attr', 'href').should('equal', '/blog');
        cy.get('[data-cy="navbar_header_ul"]').find('a').eq('2').invoke('text').should('equal', 'Blog');

        cy.get('[data-cy="navbar_header_ul"]').find('a').eq('3').invoke('attr', 'href').should('equal', '/contacto');
        cy.get('[data-cy="navbar_header_ul"]').find('a').eq('3').invoke('text').should('equal', 'Contacto');

    });
    it('Probando navegación del footer', ()=> {
        cy.get('[data-cy="navbar_footer_ul"]').should('exist');
        cy.get('[data-cy="navbar_footer_ul"]').find('a').should('have.length', '4');
                
        cy.get('[data-cy="navbar_footer_ul"]').find('a').eq('0').invoke('attr', 'href').should('equal', '/nosotros');
        cy.get('[data-cy="navbar_footer_ul"]').find('a').eq('0').invoke('text').should('equal', 'Nosotros');

        cy.get('[data-cy="navbar_footer_ul"]').find('a').eq('1').invoke('attr', 'href').should('equal', '/anuncios');
        cy.get('[data-cy="navbar_footer_ul"]').find('a').eq('1').invoke('text').should('equal', 'Anuncios');

        cy.get('[data-cy="navbar_footer_ul"]').find('a').eq('2').invoke('attr', 'href').should('equal', '/blog');
        cy.get('[data-cy="navbar_footer_ul"]').find('a').eq('2').invoke('text').should('equal', 'Blog');

        cy.get('[data-cy="navbar_footer_ul"]').find('a').eq('3').invoke('attr', 'href').should('equal', '/contacto');
        cy.get('[data-cy="navbar_footer_ul"]').find('a').eq('3').invoke('text').should('equal', 'Contacto');

    });
});