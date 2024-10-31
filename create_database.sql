-- Drop tables if they already exist to avoid conflicts
DROP TABLE IF EXISTS Schedule;
DROP TABLE IF EXISTS Meal_Plan_Recipes;
DROP TABLE IF EXISTS Meal_Plans;
DROP TABLE IF EXISTS Recipes;
DROP TABLE IF EXISTS Meal_Type;
DROP TABLE IF EXISTS Users;

-- Create Users table
CREATE TABLE Users (
    User_ID INT NOT NULL AUTO_INCREMENT,
    User_Name VARCHAR(50) NOT NULL,
    FName VARCHAR(50) NOT NULL, 
    LName VARCHAR(50) NOT NULL,  
    Password VARCHAR(36) NOT NULL,
    UNIQUE (User_Name),  -- Enforce unique usernames
    PRIMARY KEY (User_ID)
);

-- Create Meal_Type table
CREATE TABLE Meal_Type (
    Meal_Type VARCHAR(20) NOT NULL,
    PRIMARY KEY (Meal_Type)
);

-- Create Recipes table
CREATE TABLE Recipes (
    Recipe_ID INT NOT NULL AUTO_INCREMENT,
    User_ID INT NOT NULL,
    Recipe_Name VARCHAR(100) NOT NULL,
    Meal_Type VARCHAR(20) NOT NULL,
    Cook_Time INT NOT NULL,
    Cal INT NOT NULL,
    URL VARCHAR(255) NOT NULL,
    Image_URL VARCHAR(255),
    PRIMARY KEY (Recipe_ID),
    FOREIGN KEY (Meal_Type) REFERENCES Meal_Type(Meal_Type),
    FOREIGN KEY (User_ID) REFERENCES Users(User_ID) ON DELETE CASCADE  -- Added ON DELETE CASCADE
);

-- Create Meal_Plans table
CREATE TABLE Meal_Plans (
    Meal_Plan_ID INT NOT NULL AUTO_INCREMENT,
    User_ID INT NOT NULL,
    PRIMARY KEY (Meal_Plan_ID),
    FOREIGN KEY (User_ID) REFERENCES Users(User_ID) ON DELETE CASCADE  -- Added ON DELETE CASCADE
);

-- Create Meal_Plan_Recipes table (junction table)
CREATE TABLE Meal_Plan_Recipes (
    Meal_Plan_ID INT NOT NULL,
    Recipe_ID INT NOT NULL,
    PRIMARY KEY (Meal_Plan_ID, Recipe_ID),
    FOREIGN KEY (Meal_Plan_ID) REFERENCES Meal_Plans(Meal_Plan_ID) ON DELETE CASCADE,  -- Added ON DELETE CASCADE
    FOREIGN KEY (Recipe_ID) REFERENCES Recipes(Recipe_ID) ON DELETE CASCADE  -- Added ON DELETE CASCADE
);

-- Create Schedule table
CREATE TABLE Schedule (
    Schedule_ID INT NOT NULL AUTO_INCREMENT,
    User_ID INT NOT NULL,
    Meal_Plan_ID INT NOT NULL,
    Meal_Date DATE NOT NULL,
    PRIMARY KEY (Schedule_ID),
    FOREIGN KEY (Meal_Plan_ID) REFERENCES Meal_Plans(Meal_Plan_ID) ON DELETE CASCADE,  -- Added ON DELETE CASCADE
    FOREIGN KEY (User_ID) REFERENCES Users(User_ID) ON DELETE CASCADE  -- Added ON DELETE CASCADE
);
