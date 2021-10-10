# 5am
5am is a tool to help members of the [5am club](https://www.amazon.co.uk/5-AM-Club-Robin-Sharma/dp/0008312834) make the most of their mornings.

Designed to structure your morning, in 5am you set a wellness task - such as taking a walk or meditating - to complete as soon as you wake up, and then a handful of goals you are aiming to accomplish with the rest of your morning.

## Built with
- TALL stack and Valet for local development.
- Laravel Breeze for authentication and dashboard shell.

## Setup
- Clone repo
- Copy .env.example to .env and update APP_URL/DB details
- `composer install`
- `php artisan migrate`

If you run into any issues, feel free to get in touch with me on [Twitter](https://twitter.com/imkieransmith/).


## Todo
- Ask users about their schedule as part of account setup process to auto-fill days off.
- Onboarding to help the user get started quickly.
- Better day structure on the dashboard. This will show the next upcoming day and previous days only.
- Improve date selector. This is currently automatic based on existing days and the current date.
- Ability to update progress of day, marking tasks as complete/incomplete.
- Expand the app with reports around progress and task completion.
- Expand the app to include links for further reading and ways to make the most out of a 5am start.
- Automated tests.
