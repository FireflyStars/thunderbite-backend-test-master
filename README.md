# Thunderbite Backend Test

This test is designed to test your laravel and algorithm knowledge and it is a good representation of your core skills that are required to become a Thunderbite team member.

## Installation

For these instructions we assume you make use of Laravel Valet.
If you are not making use of Laravel Valet the below could differ a bit.

1. Clone this repository
1. Run composer install
1. Create and fill the .env file (example included /.env-example)
1. Run `php artisan migrate` to create database tables
1. Seed the database by running `php artisan db:seed`
1. Run `npm install`
1. Run `npm run dev`
1. Visit http://thunderbite-backend-test.test/backstage and happy coding

Login details: test@thunderbite.com / test123

## Test tasks

##### Task 1
The task is to create a slot machine game with 5x3 reels. (eg https://slotcatalog.com/userfiles/image/games/Microgaming/162/Fruit-Fiesta-2_s.jpg)

Create an algorithm that generates a 5 x 3 array that simulates a 5 reel slot e.g
```
[
    [4, 3, 1, 4, 6]
    [2, 5, 3, 2, 1]
    [5, 2, 3, 6, 1]
]  
```
A winning line is created when an array has 3 to 5 of the same symbol IDs <u>in succession</u> in the predefined payline.
 ```
 [
    [1,  2,  3,  4,  5 ]
    [6,  7,  8,  9,  10]
    [11, 12, 13, 14, 15]
]
```

All the possible paylines for the given example are: 1-2-3-4-5, 6-7-8-9-10,
11-12-13-14-15, 1-7-13-9-5, 11-7-3-9-15, 6-2-3-4-10, 6-12-13-14-10, 1-2-8-14-15,
11-12-8-4-5.

User should be allowed to create a new symbol and upload 1 image which represents it.
Different symbols should have different points for 3, 4 and 5 matches. Make it configurable.

As a part of the game launch validation, a minimum of 6 and a maximum of 10 symbols should be present/active in the
backoffice. <u>Please provide a database seeder for a default configuration.</u>

At the end of the game the total sum of points should be displayed.

When a user opens the campaign url, game should be created taking into account
 all necessary checks (start, end dates and required params e.g 'a=acc1&spins=4').
User will have a certain amount of spins per day. For simplicity make this 
configurable as an url parameter (eg 'a=acc1&spins=4' - **'spins' in
this case defines maximum number of spins that user with account 'acc1' gets that day**).

Frontend should contain 1 button ('Spin') which will
 simulate clicking the spin button on the slot machine and will trigger ajax call that returns 
 the 5x3 array. **Awarded points and symbols should be saved in games table and displayed in 
 Games section in the backoffice**. Don't create more than 1 game per day per user, but make
sure that all spins are logged.

Add Export button to Games section, which will generate a CSV of all <u>filtered</u> games.

##### Part 2
All user games can be accessed from backstage/games section.
This page should contain table filters, for easy data querying.
Filters that should be added can be seen in Games::filter() method (this particular query can be improved).
Backstage already contains all the elements you need for the html.
 
Database might have mistakes or bad practices, and needs optimization and/or extra fields in certain tables.

Loading of the games section can be greatly improved with appropriate optimizations.

**All changes to the database should be done with new migrations.**

If you have any questions about the task, do not hesitate to ask.