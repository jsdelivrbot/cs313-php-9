CREATE TABLE Project(
   ID SERIAL PRIMARY KEY NOT NULL,
   name TEXT NOT NULL,
   description TEXT
);

CREATE TABLE Task(
   id SERIAL PRIMARY KEY NOT NULL,
   name TEXT NOT NULL,
   description TEXT,
   project_id INT,
   completed BOOLEAN,
   FOREIGN KEY (project_id) REFERENCES Project(id)
);

CREATE TABLE Event(
   id SERIAL PRIMARY KEY NOT NULL,
   name TEXT NOT NULL,
   description TEXT,
   start_datetime DATE NOT NULL,
   end_datetime DATE NOT NULL,
   project_id INT,
   FOREIGN KEY (project_id) REFERENCES Project(id)   
);

CREATE TABLE Goal(
   id SERIAL PRIMARY KEY NOT NULL,
   name TEXT NOT NULL,
   description TEXT,
   project_id INT,
   end_datetime DATE,
   FOREIGN KEY (project_id) REFERENCES Project(id)
);

CREATE TABLE Users(
   id SERIAL PRIMARY KEY NOT NULL,
   first_name TEXT NOT NULL,
   last_name TEXT NOT NULL,
   address TEXT,
   phone_number TEXT,
   email TEXT,
   username TEXT,
   pwd_hash TEXT,
   pwd_salt TEXT
);

CREATE TABLE Tasks_To_Goals(
   task_id INT NOT NULL,
   goal_id INT NOT NULL,
   PRIMARY KEY (task_id, goal_id),
   FOREIGN KEY (task_id) REFERENCES Task(id),
   FOREIGN KEY (goal_id) REFERENCES Goal(id)
);

CREATE TABLE Tasks_To_Events(
   task_id INT NOT NULL,
   event_id INT NOT NULL,
   PRIMARY KEY (task_id, event_id),
   FOREIGN KEY (task_id) REFERENCES Task(id),
   FOREIGN KEY (event_id) REFERENCES Event(id)
);

CREATE TABLE Users_To_Tasks(
   user_id INT NOT NULL,
   task_id INT NOT NULL,
   PRIMARY KEY (user_id, task_id),
   FOREIGN KEY (user_id) REFERENCES Users(id),
   FOREIGN KEY (task_id) REFERENCES Task(id)
);

CREATE TABLE Users_To_Goals(
   user_id INT NOT NULL,
   goal_id INT NOT NULL,
   PRIMARY KEY (user_id, goal_id),
   FOREIGN KEY (user_id) REFERENCES Users(id),
   FOREIGN KEY (goal_id) REFERENCES Goal(id)
);

CREATE TABLE Users_To_Events(
   user_id INT NOT NULL,
   event_id INT NOT NULL,
   PRIMARY KEY (user_id, event_id),
   FOREIGN KEY (user_id) REFERENCES Users(id),
   FOREIGN KEY (event_id) REFERENCES Event(id)
);

CREATE TABLE Users_To_Projects(
   user_id INT NOT NULL,
   project_id INT NOT NULL,
   PRIMARY KEY (user_id, project_id),
   FOREIGN KEY (user_id) REFERENCES Users(id),
   FOREIGN KEY (project_id) REFERENCES Project(id)
);