# NextAD
## Introduction

This NextCloud app integrates Microsoft Active Directory into NextCloud with seamless user interaction. Through NextAD, users are able to change attribute values in Active Directory thorugh a simple interface. They can also preview these user settings. NextAD is programmed to fetch the user ID of the Active Directory once they are logged into NextCloud. Fast, reliable, and comprehensive: That's NextAD.

## Directory Structure

### /Code
- **/NextAD**
  - '/AppInfo': Contains app configuration and route files
      - 'routes.php': Has the defined index and API app routes
      - 'info.xml': Contains app config settings and dependencies
  - '/img': Contains any asset the app uses.
  - `/css`: Uses Cascading Style Sheets for web styling
      - '/nextad_styles.css': Style file for the app
  - `/js`: Uses JavaScript files for client-side logic.
      - 'nextad_scripts.js': Main script file for the app
  - '/lib': Contains main app logic for the app in PHP
      - '/Controller': Any API logic files go here
          - 'PageController.php': This file contains the needed API functions that call on the LDAP service
      - '/Service': Any service files for LDAP configuration go here
          - 'LDAPService.php': Establishes a connection with AD, queries, and modifies user attributes
      - '/appinfo': This directory is responsible for the registration of NextAD services
          - 'Application.php': Main file that registers the page controller and LDAP service classes
  - '/templates': Contains the layout of the form and input fields
      - 'main.php': This PHP file has embedded HTML to generate the user input and submit form 
  - `/test`: The entry HTML file for the website.

### /Documentation
- **/Documents**:
  - **NextAD User Manual.pdf**: Comprehensive user manual for end-users.
  - **Official Documentation.pdf**: The latest NextAD project documentation.

## Installation Guide

### Prerequisites

* A working PC or Desktop Computer
* A running Nextcloud server, which you can set up using Docker and the Docker Compose file from our GitHub repository
* Remote virtual machine for Active Directory Access
* Administrative access to your Nextcloud instance

Initial Setup: Start the Nextcloud server using the docker-compose up command. Make sure your container is running and using the proper server name and port. Ensure that Docker has composed the correct containers to access the app, which should include a server, database, and an optional phpMyAdmin container. See the below screenshot for an example of what this would look like:

<img width="1020" alt="Screen Shot 2023-12-11 at 2 54 01 PM" src="https://github.com/Alkyz/NextAD/assets/90973494/4defce40-8426-40af-b04f-d774a967818e">

Follow the on-screen instructions in the Nextcloud setup wizard. You should create an admin account and assign it a password. Make sure you remember these credentials. Then, select MariaDB as the primary database. The wizard should prompt for server and database information as shown below.

<img src="https://github.com/Alkyz/NextAD/assets/90973494/b7e0eeef-ef03-499b-bcdb-33376796eb9d" width="300" height="200">


You will need to use the credentials found inside the compose file to provide the server and database information. Once you have access to the NextCloud dashboard, download the NextAD application zip file from our GitHub repository. Extract the zip file and copy the NextAD app folder into the apps directory of your Nextcloud instance. 

Now, enable the app if neccessary through the menu settings and you should be able to see NextAD through your dashboard. The image below shows what the menu bar should now display.

![PHOTO-2023-11-02-18-44-36](https://github.com/Alkyz/NextAD/assets/90973494/704035d4-b562-40fd-bb4f-9d4202f04783)

If you are an Active Directory user, for a quick test that the app is working, try selecting 'Preview Attributes' to fetch your current user attributes in Active Directory. Here is an example of what the response should look like:

<img width="900" alt="Screen Shot 2023-12-11 at 2 51 48 PM" src="https://github.com/Alkyz/NextAD/assets/90973494/b4ea13a7-f69b-489a-9104-0136d93ebf63">

# User Manual

[Link to User Manual](https://docs.google.com/document/d/1SCE8ht8mCx07ff1heD9eanbVxocmiE90mpH01h-vgoY/edit?usp=drive_link)

## Contact
Please reach out to us or the NextCloud Support team should you encounter any issues with the NextAD application.

