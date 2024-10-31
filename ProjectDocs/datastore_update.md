# Database Structure

### Users Table
| Column      | Type         | Constraints           |
|-------------|--------------|-----------------------|
| User_ID     | INT          | Primary Key, Auto Increment, Not Null |
| User_Name   | VARCHAR(50)  | Unique,Not Null             |
| Password    | VARCHAR(36)  | Not Null             |
|FName        | VARCHAR(50)  |Not Null              |
|LName        | VARCHAR(50)  |Not Null     |

### Meal_Type Table
| Column      | Type         | Constraints           |
|-------------|--------------|-----------------------|
| Meal_Type   | VARCHAR(20)  | Primary Key, Not Null |

### Recipes Table
| Column       | Type          | Constraints                     |
|--------------|---------------|---------------------------------|
| Recipe_ID    | INT           | Primary Key, Auto Increment, Not Null |
| User_ID      | INT           | Foreign Key (References `Users(User_ID)`), Not Null |
| Recipe_Name  | VARCHAR(100)  | Not Null                        |
| Meal_Type    | VARCHAR(20)   | Foreign Key (References `Meal_Type(Meal_Type)`), Not Null |
| Cook_Time    | INT           | Not Null                        |
| Cal          | INT           | Not Null                        |
| URL          | VARCHAR(255)  | Not Null                        |
| Image_URL    | VARCHAR(255)  | Optional                        |

### Meal_Plans Table
| Column        | Type         | Constraints                     |
|---------------|--------------|---------------------------------|
| Meal_Plan_ID  | INT          | Primary Key, Auto Increment, Not Null |
| User_ID       | INT          | Foreign Key (References `Users(User_ID)`), Not Null |

### Meal_Plan_Recipes Table (Junction Table)
| Column        | Type         | Constraints                    |
|---------------|--------------|--------------------------------|
| Meal_Plan_ID  | INT          | Foreign Key (References `Meal_Plans(Meal_Plan_ID)`), Not Null |
| Recipe_ID     | INT          | Foreign Key (References `Recipes(Recipe_ID)`), Not Null |
| **Primary Key (Composite)** | **Meal_Plan_ID, Recipe_ID** | |

### Schedule Table
| Column        | Type         | Constraints                    |
|---------------|--------------|--------------------------------|
| Schedule_ID   | INT          | Primary Key, Auto Increment, Not Null |
| User_ID       | INT          | Foreign Key (References `Users(User_ID)`), Not Null |
| Meal_Plan_ID  | INT          | Foreign Key (References `Meal_Plans(Meal_Plan_ID)`), Not Null |
| Meal_Date     | DATE         | Not Null                       |

# Example Data 
### Users
| User_ID | User_Name  | Password       | FName  | LName  |
|---------|------------|----------------|--------|--------|
| 1       | john_doe   | password123    |John    |Doe     |
| 2       | jane_smith | securePass456  |Jane    |Smith   |

### Meal_Type
| Meal_Type    |
|--------------|
| Breakfast    |
| Lunch        |
| Dinner       |


### Recipes
| Recipe_ID | User_ID | Recipe_Name      | Meal_Type | Cook_Time | Cal | URL                       | Image_URL              |
|-----------|---------|------------------|-----------|-----------|-----|---------------------------|-------------------------|
| 1         | 1       | Avocado Toast    | Breakfast | 10        | 250 | example.com/avocado-toast | images/avocado.jpg  |
| 2         | 2       | Grilled Chicken  | Lunch     | 30        | 400 | example.com/grilled-chicken | images/chicken.jpg  |
| 3         | 1       | Spaghetti        | Dinner    | 25        | 600 | example.com/spaghetti     | images/spaghetti.jpg |
| 4         | 2       | Fruit Salad      | Snack     | 5         | 150 | example.com/fruit-salad   | images/fruit.jpg     |

* Image_URL is the directory in our files for where to find the image 
* URL is the link to actual recipe website 

### Meal_Plans
| Meal_Plan_ID | User_ID |
|--------------|---------|
| 1            | 1       |
| 2            | 2       |

### Meal_Plan_Recipes
| Meal_Plan_ID | Recipe_ID |
|--------------|-----------|
| 1            | 1         |
| 1            | 3         |
| 2            | 2         |
| 2            | 4         |

### Schedule
| Schedule_ID | User_ID | Meal_Plan_ID | Meal_Date  |
|-------------|---------|--------------|------------|
| 1           | 1       | 1            | 2024-10-01 |
| 2           | 1       | 1            | 2024-10-02 |
| 3           | 2       | 2            | 2024-10-01 |
| 4           | 2       | 2            | 2024-10-03 |
