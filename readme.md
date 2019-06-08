# yungbuck-web

[![Build Status](https://travis-ci.org/andreduvoisin/yungbuck-web.svg?branch=master)](https://travis-ci.org/andreduvoisin/yungbuck-web)

This is the final project for ITP-405 at the University of Southern California (USC). Because of backwards-incompatible changes made to the Battle.net API, the website itself is no longer fully functional. However, the video explanation below was created when it worked properly and gives a full overview of all of the features that the website used to have.

Website: [https://yungbuck.herokuapp.com/login](https://yungbuck.herokuapp.com/login)

Video Explanation: [https://youtu.be/bt_0KNLmEMQ](https://youtu.be/bt_0KNLmEMQ)

## What is your site about?

The website interacts with the [Battle.net API](https://dev.battle.net/) in order to provide players information for Player versus Player (PvP) combat in [World of Warcraft (WoW)](http://us.battle.net/wow/en/). Here is a list of expected features:

- Leaderboards for 2v2, 3v3, 5v5, and RBG (Rated Battlegrounds)
- Character profiles for the above
- Saving character profiles to re-visit later
- Comparison of different characters in order to view differences/similarities in specilization, talents, race, and gear
- Saving these comparisons to re-visit later

Time permitting, I would like to expand this to Player versus Environment (PvE). Here's a sample of what could be done:

- Challenge mode leaderboards
- Character profiles for the above
- Saving character profiles to re-visit later
- Comparison of different characters in order to view differences/similarities in specilization, talents, race, and gear
- Team profiles for the above
- Saving team profiles to re-visit later
- Comparison of different teams in order to view differences/similarities in team builds
- Saving these comparisons to re-visit later

This could even be expanded to being able to simply view and save different information, such as quests, achievements, and mounts, possibly with a link to the [Wowhead](http://www.wowhead.com/) page for each of these.

The unique aspect of this website is the ability to both compare different character profiles and being able to save this information to come back to. As far as I know, there aren't any other websites that do this, and I know that I would have found something like this useful in the past.

## What types of users will visit your site?

Anyone who is a fan of WoW and would like to compare/contrast high level players in PvP (or PvE) with each other or with their own WoW character in order to see either similarities/differences between these players or where they themselves could improve, from an objective gear/specilization/etc perspective.

## Will they need to create an account?

I'm not sure yet. I believe I will need to use the Battle.net API's OAuth 2.0 to allow users to login with their Battle.net account for some features; if this is the case, then I will use that as the "account creation" and save data based on Battle.net account. If it is found that I do not need to use this feature, then I will have users create an account to use the website instead.

## What API will you be using?

Blizzard Entertainment's [Battle.net API](https://dev.battle.net/)

## What do you think your tables will be?

I don't have exact specifications yet, but I know that I will need to use tables in order to save character profiles, team profiles, and comparisons for later viewing based on user account.

# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
