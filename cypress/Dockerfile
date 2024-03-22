# Use the official Cypress Docker image as the base image
FROM cypress/browsers:node14.17.0-chrome91-ff89

# Set the working directory
WORKDIR /var/www/html/

# Copy the Cypress test files into the container
COPY ./app/cypress /var/www/html/cypress

# Install dependencies
RUN npm install

# Expose any necessary ports (if applicable)
# EXPOSE <port>

# Set the command to run Cypress tests
CMD ["npm", "run", "cypress:run"]
