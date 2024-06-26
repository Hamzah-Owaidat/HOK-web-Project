# HOK

HOK is a web application that offers user authentication, personalized profiles, and games like Sudoku and Minesweeper. The website is built with Laravel for the main application and Flask for the games, supporting multiple languages with various features and effects to enhance user experience.

## Table of Contents
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Pages](#pages)
  - [Home Page](#home-page)
  - [Profile Page](#profile-page)
  - [Games Page](#games-page)
- [Languages](#languages)
- [Libraries and Tools](#libraries-and-tools)
- [Contributors](#contributors)

## Features
- User authentication system
- Multi-language support (Arabic, English, French)
- Home page with a user count graph and text effects using Typed.js
- Profile page with editable user information and score graphs
- Games page with Sudoku and Minesweeper games built with Flask
- Effects using Typed.js library

## Installation
### Laravel Application
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/HOK.git
   cd HOK
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate
   php artisan serve
### Flask Application
1. Create and activate a virtual environment:
   ```bash
   python -m venv venv
   source venv/bin/activate # On Windows, use `venv\Scripts\activate`
   flask run

## Usage
1. Access the website at http://localhost:8000 for the Laravel application
2. Access the games at http://localhost:5000 for the Flask application
3. Register for a new account or log in with existing credentials
4. Navigate through the home, profile, and games pages

## Pages
### Home Page:
   1. Displays a graph showing the user count for each month
   2. Features dynamic text effects using the Typed.js library
    
### Profile Page:
   1. Shows the user's profile image, bio, and username
   2. Includes options to edit profile information and log out
   3. Displays a graph of the user's scores in each game

### Games Page:
   1.  Contains Sudoku and Minesweeper games, built with Flask

### Languages:
   1. Arabic (ar)
   2. English (en)
   3. French (fr)

## Libraries and Tools
### Laravel:
   1. Web framework used for the main application
### Flask: 
   1. Web framework used for the games
### Typed.js: 
   1.  Library for text typing effects
### Chart.js (or any graph library): 
   1. Used for displaying graphs on home and profile pages

## Contributors:
Hamzah Owaidat
Houssein Koubaissy


UserName: Hamzah-Owaidat
