describe('Blog Post Creation', () => {
    beforeEach(() => {
      // Log in before each test
      cy.login('reachmanikantark@gmail.com', '123456789') // Custom command to log in
      cy.getCsrfToken() // Fetch CSRF token
    })
  

    it('Creates a new blog post', () => {
      cy.visit('/posts/add') // Assuming '/posts/create' is your blog post creation page URL
      cy.get('@csrfToken').then((token) => {
        cy.get('input[name="_csrfToken"]').type(token) // Fill CSRF token in form
      })
      // Fill in blog post form fields
      cy.get('input[name="title"]').type('New Blog Post Title')
      cy.get('textarea[name="content"]').type('Lorem ipsum dolor sit amet...')
  
      // Submit blog post form
      cy.get('form').submit()
  
      // Assert blog post is created
      cy.contains('New Blog Post Title').should('exist')
    })
  })
  