/* Sample data for UserID = 1
   NOTE: 
   Recipes(Image URL) and Recipes(URL) are random and don't take you anywhere.
   Make sure you update the date to within the upcoming two weeks. 
   This is just for testing the "home" page and "my saved meal plans" page but can be modified to test other pages later on
*/

/* Insert sample user (if it is not already set up) */
/*
INSERT INTO Users (UserID, Username, FName, LName, Password) VALUES 
(1, 'testuser', 'Test', 'User', 'password123');
*/


/* Insert meal types if don't have these categories already */
/*INSERT INTO Meal_Type (MealType) VALUES 
('Breakfast'), 
('Lunch'), 
('Dinner');*/

/* Insert new recipes for UserID = 1 */
INSERT INTO Recipes (UserID, RecipeName, MealType, CookTime, Cal, URL, ImageURL) VALUES 
(1, 'Avocado Toast', 'Breakfast', 10, 200, 'https://example.com/avocadotoast', 'https://example.com/avocadotoast.jpg'),
(1, 'Chicken Caesar Wrap', 'Lunch', 15, 450, 'https://example.com/caesarwrap', 'https://example.com/caesarwrap.jpg'),
(1, 'Grilled Salmon', 'Dinner', 25, 550, 'https://example.com/grilledsalmon', 'https://example.com/grilledsalmon.jpg'),
(1, 'Greek Yogurt Parfait', 'Breakfast', 10, 250, 'https://example.com/yogurtparfait', 'https://example.com/yogurtparfait.jpg'),
(1, 'Veggie Burrito', 'Lunch', 20, 500, 'https://example.com/veggieburrito', 'https://example.com/veggieburrito.jpg'),
(1, 'Beef Stir-Fry', 'Dinner', 30, 650, 'https://example.com/beefstirfry', 'https://example.com/beefstirfry.jpg');

/* Insert new meal plans for UserID = 1 */
INSERT INTO Meal_Plans (UserID) VALUES 
(1), (1), (1), (1);  -- Four new meal plans for additional testing

/* Insert recipes into meal plans (Meal_Plan_Recipes) for MealPlanID = 4, 5, 6, and 7 */
INSERT INTO Meal_Plan_Recipes (MealPlanID, RecipeID) VALUES 
(4, 7), (4, 8), (4, 9),  -- Meal Plan 4 includes three recipes
(5, 10), (5, 11), (5, 12),  -- Meal Plan 5 includes three different recipes
(6, 7), (6, 10), (6, 9),  -- Meal Plan 6 includes a mix of recipes
(7, 8), (7, 11), (7, 12);  -- Meal Plan 7 includes another mix of recipes

/* Insert new schedule data to assign meal plans to specific dates for this week */
INSERT INTO Schedule (UserID, MealPlanID, MealDate) VALUES 
(1, 4, '2024-11-11'),  -- Monday
(1, 5, '2024-11-12'),  -- Tuesday
(1, 6, '2024-11-13'),  -- Wednesday
(1, 7, '2024-11-14'),  -- Thursday
(1, 4, '2024-11-15'),  -- Friday
(1, 5, '2024-11-16'),  -- Saturday
(1, 6, '2024-11-17');  -- Sunday