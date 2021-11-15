# superhero-faurecia

By Joaquim Hernani Duarte Fernandes
- This is a simple superhero api created with PHP/Laravel 8

Tecnologies Used:
- PHP / Laravel 8
- JavaScript
- HTML
- CSS

Description
- This is a Rest API and a backoffice developed with PHP/Laravel 8. In this simple web app, users can create a superhero by adding a real name, hero name, publisher, first appearance date, list of abilities and list of team affiliations. In addition to this, uers can also update a superhero, get a list of all superheros, get details on one superhero, and search for a superhero by the real name ou hero name.

Framework: 
- I decided to use Laravel because it's such a powerful framework and is great for backend tasks. It follows the MVC based architectural pattern. It's the best PHP framework,in my opinion, and I have been using this framework for some time now, so I feel very confortable working with it. 

Setup/Installation Requirements:
- To access the app, simply use the following link: http://superhero-faurecia.herokuapp.com/api/index
- To get access to the repository, please use the following link: https://github.com/fernandes12/superhero-faurecia

Other Information:
- This website is hosted on Heroku
- I used Postman to test the API
- Database: PostgreSQL

API routes:
- GET http://superhero-faurecia.herokuapp.com/api/index - Return main page
- GET http://superhero-faurecia.herokuapp.com/api/all-superheros - Return all superheros
- GET http://superhero-faurecia.herokuapp.com/api/superhero - Return form to create a new superhero
- POST http://superhero-faurecia.herokuapp.com/api/store - Add a new superhero
- GET http://superhero-faurecia.herokuapp.com/api/view/{id} - Return view information on the superhero with same id
- GET http://superhero-faurecia.herokuapp.com/api/edit/{id} - Return form to edit superhero properties
- POST http://superhero-faurecia.herokuapp.com/api/edit - Update superhero
- GET http://superhero-faurecia.herokuapp.com/api/delete/{id} - Delete the superhero with same id
- GET http://superhero-faurecia.herokuapp.com/api/find - Return superhero by id
- GET http://superhero-faurecia.herokuapp.com/api/find_hero/{name} - Return superhero by real or hero name

- GET http://superhero-faurecia.herokuapp.com/api/abilities - Return list of abilities
- GET http://superhero-faurecia.herokuapp.com/api/teams - Return list of teams affiliation
- POST http://superhero-faurecia.herokuapp.com/api/store_ability - Add new ability
- POST http://superhero-faurecia.herokuapp.com/api/store_team - Delete ability
- GET http://superhero-faurecia.herokuapp.com/api/delete-team/{id} - Delete team




Note:
- Like any other app, there is certainly space for a lot of improvments to make, but working with Agile methodology, it's best to improve as it goes.

Thanks
- Joaquim Fernandes
