# Yellow-Page-Task-Assignment
# Design Patterns
 ## First Design Pattern (MVC)
  The whole appliaction is based on (MVC) design pattern so the application contains three folders (Models, Views, Controllers)
 
 ## Second Design Pattern (Singletone)
  This design pattern is used to create only one object from the class
  I used this design pattern in (config.php) in order to get only one object from Database connection object
 
 ## Third Design Pattern (Strategy)
  This design is used to allow you to select function during runtime
  This mean that each subclass implements parent class and implement function that in parent class as needed with different implementation
  I used this design pattern in (Users.php and userController.php) to make two methods for admin layer login { can login with username and password or login with email and password }
 
 
# Socail Media API
 In this project i used google plus api in order to login to system and be able to make comment on advertisements


# Testing
In this project i used PHPUnit to perform tests on model classes and this will be found in (tests) folder
 
 
# Database structure
  The database is called yellow and the sql file is in the repository and called (yellow.zip)
  The database consist of three tables
  
  ## First table for advertisements (ads)
   this table consist of:
    (id) which is auto increment,
    (image) name of image,
    (description) description of advertisement
    example:
```bash
1    yellow1.gif   this is first  advertisement
2    yellow1.gif   this is second advertisement
```
    
  ## Second table for users (users)
   this table consist of:
   (id) which is auto increment,
   (name) name of user,
   (email) email of user,
   (password) password of user,
   (type) type for user role (0 =>'means he is admin', 1=>'means he is editor', 2=>'means he is user')
       example:
```bash
1    Admin   admin@admin.com    123  0
2    Editor  editor@editor.com  123  1
3    User    user@user.com      123  2
```
  
  ## Third table for comments (comments)
   this table consist of:
   (id) which is auto increment,
   (comment) subject of comment,
   (created_at) the time in which the comment approved,
   (status) the status of comment (0 => 'means not approved' , 1 => 'means approved'),
   (user_id) foreign key with the id that exist in (users) table,
   (ads_id) foreign key with the id that exist in (ads) table
   ```bash
1    comment1   2018-11-23 17:05:58  1  3   1
2    comment2   2018-11-23 17:05:58  0  3   1
3    comment3   2018-11-23 17:05:58  1  3   2

```
   
# Routes of application
## Users Routes
 ### index
 the first page of application that contains list of advertisement
```bash
http://localhost/YellowAssignment/App/Views/users/index.php 
```
 ### single Advertisement Page
 this page appear when click on any advertisement from index page and contains comments on the specific advertisement
 ```bash
 http://localhost/YellowAssignment/App/Views/users/singleAd.php?id=1
 ```
 ### logout
 when click logout button will redirect you to index page
 
## Admin Routes
 ### login page
  this is the start page for admin layer
 ```bash
  http://localhost/YellowAssignment/App/Views/admin/login.php
 ```
 ### dashboard page
 this is the page you will redirect to after login
  ```bash
  http://localhost/YellowAssignment/App/Views/admin/dashboard.php
 ```
 ### list Users
  when click on Users will get list of users
   ```bash
  http://localhost/YellowAssignment/App/Views/admin/listUsers.php
  ```
  ### list Advertisements
  when click on Advertisements will get list of Advertisements
   ```bash
 http://localhost/YellowAssignment/App/Views/admin/listAds.php 
 ```
 ### Add New Advertisement
  when click on Add New Advertisement will redirect your to add page
   ```bash
 http://localhost/YellowAssignment/App/Views/admin/addAds.php
 ```
 ### Update Advertisement
  when click on Edit Advertisement will redirect your to Edit page
   ```bash
 http://localhost/YellowAssignment/App/Views/admin/editAds.php?id=1&image=yellow1.gif&description=this
 ```
 ### list Comments
  when click on Comments will get list of Comments
   ```bash
 http://localhost/YellowAssignment/App/Views/admin/listComments.php
 ```
 ### logout
 when click logout button will redirect you to login page
  
   
# Application Folders And Files Structure
 ## First Folder (App)
  This folder contains the folders of MVC pattern
   ### Controllers (take the values form view and send to model)
    Contains adsController.php, commentController.php, userController.php
   
   ### Models(take the values from controller and interact with database)
    Contains Ads.php, Comments.php, Users.php,
    In Users.php the usage of (singletone design pattern) that i decleared loginbehavior interface class and two classes that implements  the parent class (userNameLoginClass, emailLoginClass)
   
   ### Views (application layout)
    Contains two subfolders (admin) contains admin layout, (users) contains users layout
    
 ## Second Folder (GoogleAPI)
  This folder is the package of the google api which used to login and post comment
 
 ## Third Folder (Public)
  This folder contains subfolders that responsible for css, fonts, images and js files
 
 ## Fourth Folder(googlefiles)
  This folder contains two files (config.php) which has the configuration of the api (g-callback.php) the files that check the   authentication of the user then redirect him after checking
 
 ## Fifth Folder(tests)
  This folder responsible for performin testing on model classes
  This folder contains subfolder called (Models) which contains AdsTest.php, CommentsTest.php, UsersTest.php

 ## config.php
  This is the database class which used singletone desin pattern and has function connect to connect to database
  
 ## phpunit.xml
  This is the configuration file used for PHPUbnit test
