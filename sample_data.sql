/* Sample data for UserID = 1
   NOTE: 
   - Recipes(Image URL) and Recipes(URL) are random and don't take you anywhere.
   - Make sure you update the date to within the upcoming two weeks. 
   This is just for testing the "home" page and "my saved meal plans" page but can be modified to test other pages later on
*/

/* Insert sample user (if it is not already set up) */
/* 
INSERT INTO Users (UserID, Username, FName, LName, Password) VALUES 
(1, 'testuser', 'Test', 'User', 'password123');
*/

/* Insert meal types */
INSERT INTO Meal_Type (MealType) VALUES 
('Breakfast'), 
('Lunch'), 
('Dinner');

/* Insert recipes for UserID = 1 */
INSERT INTO Recipes (UserID, RecipeName, MealType, CookTime, Cal, URL, ImageURL) VALUES 
(1, 'Oatmeal with Fruits', 'Breakfast', 10, 250, 'https://example.com/oatmeal', 'https://example.com/oatmeal.jpg'),
(1, 'Grilled Chicken Salad', 'Lunch', 20, 350, 'https://example.com/chickensalad', 'https://example.com/chickensalad.jpg'),
(1, 'Steak and Veggies', 'Dinner', 40, 600, 'https://example.com/steak', 'https://example.com/steak.jpg'),
(1, 'Smoothie Bowl', 'Breakfast', 15, 300, 'https://example.com/smoothiebowl', 'https://example.com/smoothiebowl.jpg'),
(1, 'Turkey Sandwich', 'Lunch', 15, 400, 'https://example.com/turkeysandwich', 'https://example.com/turkeysandwich.jpg'),
(1, 'Pasta Bolognese', 'Dinner', 30, 500, 'https://example.com/pastabolognese', 'https://example.com/pastabolognese.jpg');

/* Insert meal plans for UserID = 1 */
INSERT INTO Meal_Plans (UserID) VALUES 
(1), (1), (1); -- Insert 3 meal plans for testing

/* Insert recipes into meal plans (Meal_Plan_Recipes) for MealPlanID = 1, 2, and 3 */
INSERT INTO Meal_Plan_Recipes (MealPlanID, RecipeID) VALUES 
(1, 1), (1, 2), (1, 3),  -- Meal Plan 1 includes three recipes
(2, 4), (2, 5), (2, 6),  -- Meal Plan 2 includes three different recipes
(3, 1), (3, 4), (3, 6);  -- Meal Plan 3 includes a mix of recipes

/* Insert schedule data to assign meal plans to specific dates for UserID = 1 */
INSERT INTO Schedule (UserID, MealPlanID, MealDate) VALUES 
(1, 1, '2024-11-01'), 
(1, 2, '2024-11-02'), 
(1, 3, '2024-11-03');