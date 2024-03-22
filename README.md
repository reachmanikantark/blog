# blog
Sample Blog

**This blog is implemented using the CakePHP 5.x Framework. It will show default blog articles on the home page and then the facility view the application. You can create blog articles with login authentication.**

**Installation instructions**

* Setup the Docker application in your system.
* Download the application from GitHub.
* Open the root directory of the application in the command window or else open the application in the editor like Visual Studio Code and then open the Terminal from View.
* Type the following command in the terminal
  * Docker-compose up –-build -d
  * You can access the website using http://localhost:8080
  * Login Details are
  *  Email address: reachmanikantark@gmail.com
  *  Password: 123456789
  *  You have the facility to create new user also http://localhost:users/add
  *  Logged in user only create , edit or delete the posts.
* It will install apache, php and mysql and then create the containers.
* Setup the cypress also in the docker container but it is not working perfectly to test the cypress from the docker.
* I did not implement CI/CD GitHub actions and the CI Pipelines.

  


