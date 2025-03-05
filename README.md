Database Setup and Running the Application
Create the Database:
In phpMyAdmin (or your preferred MySQL client), create a database named ci4_project.

Configure Environment Variables:
In the root directory of the project, create a .env file (if it doesn't already exist) and add the following content:


database.default.hostname = localhost
database.default.database = ci4_project
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
Run Migrations:
Open a Command Prompt (or terminal) in the project's root directory and run:

php spark migrate
This command will create the necessary tables in the ci4_project database.

Start the Application:
Run the following command to start the CodeIgniter 4 development server:


php spark serve
Then, open your browser and navigate to http://localhost:8080 to view the application.