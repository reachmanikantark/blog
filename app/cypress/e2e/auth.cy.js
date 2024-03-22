describe('Authentication', () => {
  beforeEach(() => {
    cy.visit('/users/login')
    cy.getCsrfToken() // Fetch CSRF token
  })
  it('Logs in successfully', () => {
    cy.visit('/users/login') // Assuming '/login' is your login page URL

    // Fill in login form fields
    cy.get('input[name="email"]').type('reachmanikantark@gmail.com')
    cy.get('input[name="password"]').type('123456789')

    // Submit login form
    cy.get('@csrfToken').then((token) => {
      cy.get('form').submit({
        headers: {
          'X-CSRF-Token': token
        }
      })
    })

    // Assert user is logged in
    cy.url().should('include', '/posts/list') // Redirects to dashboard after login
  })
})
