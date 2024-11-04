# Currently Just making list of recipes page. 
### Done so far
- made for loop that populates the screen with tables (each table is a unique item)
- made css for each table and currently displaying an example with fake inputs (in the future we take from the database)

### to-do
- move the recipe page out of the controller folder
- setup the database and input some recipes and plans for testing
- implement the planner
- implement add function
- whole lotta other stuff

# Updates
Project Task Manger: [Google Sheets](https://docs.google.com/spreadsheets/d/1Z7VhM-vTWlsauJfi8g3YPr1uVNYuFAaF5FlJcw7KtQQ/edit?usp=sharing).
## Ama (11/01/2024)
- **Huge update on the WebDevProject/Controller/index.php file:** Created $action implementation just like we do in class. Made it as a pull request for you to look at first.
- Registration is fully developed in the back-end. Will take users to homepage (`home.php`) after registering, which is not yet implemented.
- Added a bunch of folders and files I needed for registration/login implementation
- Reorganized the Directory:
  - Anything that will not be part of the htdocs XAAMP file should be put in the ProjectDocs folder
  - The WebDevProject folder should **only have things that are actually gonna be part of our web application**
- Will be making branch moving forward to finish the login implementation
- Added `.gitignore` file because I needed it for my macOS when working with Git in VSCode
## Andrew (11/4/2024)
- everything that was previously in the index file was moved to recipeView.php
- recipeView.php is what i did in the library
- additionally added pageHeader.php, header.css, and updated recipe_table.css
- all are used in recipeView.php
How the Landing Page Currently looks like on my end (using my own main.css file I created). 
<img src="https://github.com/ZTurtle/WebDev/blob/main/ProjectDocs/LandingPage.png?raw=true" alt="Landing Page" width="500" />

## What it looks like now (need food pics) 
![Screenshot](https://github.com/ZTurtle/WebDev/blob/main/ProjectDocs/Screenshot_5.png?raw=true)
