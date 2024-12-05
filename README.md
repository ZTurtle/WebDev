# How to Run the Meal Planner Project

## Steps to Get Started

### Step 1: Download the Project
- Download the project zip file and extract its contents.

### Step 2: Start XAMPP Services
- Open XAMPP and start the **MySQL** and **Apache** services.

### Step 3: Set Up the Database
1. Navigate to **PhpMyAdmin** (usually accessible at http://localhost/phpmyadmin).
2. Upload the required SQL files depending on your preference:
   - `meal_planner.sql`: Use this file if you want the database pre-filled with sample data.
   - `create_database.sql`: Use this file to create an empty database structure without sample data.
3. These SQL files will create the necessary tables and populate them (if using the pre-filled option).

### Step 4: Add user
  1. Add a user and grant all permissions
    - Username: mp_user
    - Password: pa55word

### Step 5: Access the Project in Your Browser
- Open a web browser and navigate to the project folder on your local server. For example:  
  `http://localhost/your_project_folder_name/`

### Step 6: Start Using the Website
- You can now interact with the website, adding recipes, creating meal plans, and scheduling meals.
- There is a tester account with recipes already uploaded:
  - Login information:
    - Username: Test
    - Password: pa55word

---

## Additional Notes
- Ensure that XAMPP is running whenever you use the project.
- If you encounter any issues, verify that the database has been properly set up and that the project files are correctly placed in the XAMPP `htdocs` folder.
