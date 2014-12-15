# Laravel Basics

## Live URL
<http://p4.simonleetoronto.me>

## Description
This is the final project of Dynamic Web Applications class using Laravel.
It is a Task Manager application that requires an account. It is included and not limited to the following functions:

- User authentication so different users can have their own task lists.
- A page to display all incomplete tasks.
- A page to display all completed tasks.
- A page to display all tasks with incomplete tasks in bold and completed tasks greyed out.
- A page to add new tasks.
- A page to edit the content of existing tasks.
- Whenever a task is displayed, it should list the date it was created and if complete, when it was completed.
- Don't allow empty tasks, don't allow duplicate email sign-ups, etc

## Demo

[http://www.screencast.com/t/H70gZlehP2v](http://www.screencast.com/t/H70gZlehP2v)


## Details for teaching team

Database P4TaskManager was created for this project with the following tables:

users
- id: unsigned int with auto_increment, primary key
- email:  varchar(255) 
- remember_token: varchar (100) 
- password: varchar(100)
- create_at: timestamp
- updated_at: timestamp 

taskTypes
- id: unsigned int with auto_increment, primary key
- create_at: timestamp
- updated_at: timestamp 
- name: name of the task type

tasks (one user can have many tasks, each task has a task type)
- id: unsigned int with auto_increment, primary key
- create_at: timestamp
- updated_at: timestamp 
- name: varchar (225); This is the name of the task 
- detail: varchar (225); Detail of the task
- completed: tinyint (1); boolean field to track if the task is completed
- user_id: unsigned int; foreign key of id field in the users table.  Identify which user owns this task. 
- taskType_id: unsigned int; foreign key of id field in the taskTypes table.  Identify what type of a task is. 

Relationships of these tables are defined in the following PHP classes:
- User.php
- TaskType.php: includes function to get all task and return of name and id pair
- Task.php: definition of Task and task search function

There are 4 controllers used in this project:
- indexController.php: handles the display of the index view
- TaskType.php :handles routes of index, create, store, show, edit, update and destroy functions of the task type in a Restful fashion
- UserController.php: handles getSignUp, postSignUp, getLogin, postLogin, and getLogout in any Explicit Routing fashion
- TaskController.php: handles explicit routing of all each function of CRUD of task 

Filters
- Authentication filter 
- CSRF Protection Filter


## Outside code
- no outside code was used.  
- Some code referenced to the CSCE15 Susan's Foo book example 