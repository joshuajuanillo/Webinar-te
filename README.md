## About Webinarinc Developer Challenge

Challenge description


The applicant should design and implement a minimalistic web-application that would let the user browse, search and navigate through Chuck Norris jokes and works within a standard modern web-browser. We expect the applicant to at least implement these three endpoints:

https://api.chucknorris.io/jokes/categories
https://api.chucknorris.io/jokes/random?category={category}
https://api.chucknorris.io/jokes/search?query={query} <br>


which would allow:

* listing all the categories
* navigating into a category and showing a random joke in that category.
* searching through all the jokes using free text search.


## Installation

* npm install
* npm run dev
* composer install
* composer install
* php artisan storage:link
* php artisan migrate

then, run:
* php artisan serve, and navigate your localhost server


## Features and specification of web-application.
* This application serves a simple web-app that gives entertainment to a user that will visit this website.
* A user will input first the name and select their character whom will be their talking

<img width="915" alt="Screen Shot 2021-06-02 at 9 31 30 AM" src="https://user-images.githubusercontent.com/43087375/120410378-73744b00-c385-11eb-97a3-49e275d25664.png">

* After selecting the character and inputting their names, a simple chat page will be load so that a user can get a random joke base on the list of category.

<img width="881" alt="Screen Shot 2021-06-02 at 9 31 48 AM" src="https://user-images.githubusercontent.com/43087375/120410416-84bd5780-c385-11eb-8cab-1b76b3f5af29.png">

* A user can also search a specific joke when they click the button "more joke" in a homepage and the a modal pop up will appear and will give a list of joke
base on the input search they provide.

<img width="999" alt="Screen Shot 2021-06-02 at 9 32 04 AM" src="https://user-images.githubusercontent.com/43087375/120410436-90a91980-c385-11eb-91a9-478411501e9b.png">

