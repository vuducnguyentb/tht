// https://docs.cypress.io/api/introduction/api.html

describe('Test admin login', () => {
  it('Visit admin page', () => {
    cy.visit('/')
    cy.contains('h1', 'Welcome to Your Vue.js App')
  })
})
