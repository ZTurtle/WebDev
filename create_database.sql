
-- Drop tables if they already exist to avoid conflicts
DROP TABLE IF EXISTS Schedule;
DROP TABLE IF EXISTS Meal_Plan_Recipes;
DROP TABLE IF EXISTS Meal_Plans;
DROP TABLE IF EXISTS Recipes;
DROP TABLE IF EXISTS Meal_Type;
DROP TABLE IF EXISTS Users;

-- Create Users table
CREATE TABLE Users (
    UserID INT NOT NULL AUTO_INCREMENT,
    Username VARCHAR(50) NOT NULL,
    FName VARCHAR(50) NOT NULL, 
    LName VARCHAR(50) NOT NULL,  
    Password VARCHAR(60) NOT NULL,
    UNIQUE (Username),  -- Enforce unique usernames
    PRIMARY KEY (UserID)
);

-- Create Meal_Type table
CREATE TABLE Meal_Type (
    MealType VARCHAR(20) NOT NULL,
    PRIMARY KEY (MealType)
);

-- Create Recipes table
CREATE TABLE Recipes (
    RecipeID INT NOT NULL AUTO_INCREMENT,
    UserID INT NOT NULL,
    RecipeName VARCHAR(100) NOT NULL,
    MealType VARCHAR(20) NOT NULL,
    CookTime INT NOT NULL,
    Cal INT NOT NULL,
    URL VARCHAR(255) NOT NULL,
    ImageURL VARCHAR(255),
    PRIMARY KEY (RecipeID),
    FOREIGN KEY (MealType) REFERENCES Meal_Type(MealType),
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE  -- Added ON DELETE CASCADE
);

-- Create Meal_Plans table
CREATE TABLE Meal_Plans (
    MealPlanID INT NOT NULL AUTO_INCREMENT,
    UserID INT NOT NULL,
    PRIMARY KEY (MealPlanID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE  -- Added ON DELETE CASCADE
);

-- Create Meal_Plan_Recipes table (junction table)
CREATE TABLE Meal_Plan_Recipes (
    MealPlanID INT NOT NULL,
    RecipeID INT NOT NULL,
    PRIMARY KEY (MealPlanID, RecipeID),
    FOREIGN KEY (MealPlanID) REFERENCES Meal_Plans(MealPlanID) ON DELETE CASCADE,  -- Added ON DELETE CASCADE
    FOREIGN KEY (RecipeID) REFERENCES Recipes(RecipeID) ON DELETE CASCADE  -- Added ON DELETE CASCADE
);

-- Create Schedule table
CREATE TABLE Schedule (
    ScheduleID INT NOT NULL AUTO_INCREMENT,
    UserID INT NOT NULL,
    MealPlanID INT NOT NULL,
    MealDate DATE NOT NULL,
    PRIMARY KEY (ScheduleID),
    FOREIGN KEY (MealPlanID) REFERENCES Meal_Plans(MealPlanID) ON DELETE CASCADE,  -- Added ON DELETE CASCADE
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE  -- Added ON DELETE CASCADE
);
