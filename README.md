# Student Leaderboard

A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

```bash
git clone git@github.com:chameeracd/student_leaderboard.git
cd student_leaderboard
composer update
```

Rename `config/app.default.php` to `config/app.php`

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.

```bash
bin/cake migrations migrate
bin/cake migrations seed --seed UsersSeed
bin/cake migrations seed --seed StudentsSeed
bin/cake migrations seed --seed AssessmentsSeed
bin/cake migrations seed --seed ResultsSeed
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update
`tag 0.1` open api

CMS default user/pass `admin/admin`