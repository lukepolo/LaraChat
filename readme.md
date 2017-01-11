# Welcome

- - - -
Curious about Laravel, VueJS and why it’s beneficial to use both of them? In this workshop you will be building a simple chat application to talk between two browsers using pusher. You will learn how to build a single page application using Laravel as the backend and VueJS as the fronted framework. 

- - - -
## What We Will Be Doing (150 Mins) :
This is an interactive workshop. It is meant to be led to help answer questions, as it contains hidden problems.

1. Introduction (5 mins)
	* Why Laravel?
	* Why Vue?
2. The Setup (15 min)
	* Environment Setup
	* Base Install
3. Getting to Know Laravel  (5 mins)
			* Routes
	* Controllers
	* Models & Migrations / Seeders
	* Templates / Views / Blade Syntax
4. Getting to know Vue (5 mins)
	* Data Binding
	* Template Directives
5. Building a simple chat app 
	* Migrations (10 mins)
	* Models  (10 mins)
	* Controllers  (15 mins)
	* Routes  (10 mins)
	* Views (40 mins)
	* Interacting with Sockets (15 mins)
6. Questions (10 Mins)

- - - -
## Prerequisites:

1. Basic knowledge of 
	- [ ] PHP
	- [ ] JavaScript
	- [ ] HTML
	- [ ] CSS
	
- - - -
Why Laravel?

# Interacting With Sockets
 Views
- - - -
branch `events` 
- - - -
Now that we have messages saving and persisting in our application, it's time to add some reactivity.

> [Events](https://laravel.com/docs/5.3/events#defining-events)  
Laravel has built in broadcasting events. These along with Laravel Echo make receiving events really simple. First, we must create the event. 

`php artisan make:event MessageCreated`

By default it comes with some extra unused imports. We should use `ShouldBroadcastNow` interface.


- - - -
## Tasks
- [ ] Create MessageCreated event
- [ ] Configure Pusher (if you haven’t already)
- [ ] Listen for the event [Listening for Events](https://laravel.com/docs/5.3/broadcasting#listening-for-events)
- [ ] Use `commit` to add the messages data 

- - - -

I hope you learned something today, feel free to contact me with any questions, etc.




# Views
 Routes
- - - -
branch `views` 
- - - -
Finally, we get some Vue action. I’ve already created a base store for you, along with a `Home.vue` . This will help us get started quickly. 

### Vue Store
The Vue store helps us manage state around the application. While it’s not necessary, particularly in this application, I believe it’s beneficial to have a good understanding of how it works. 

* state
This is the actual state of our data that allows it to be reactive.
```
	this.$store.state.moduleName.some_data
```
* dispatching
 This allows us to dispatch a function asynchronously.  (We can use promises to do synchronous events.)  We can dispatch commands anywhere in Vue by calling the store.
```
	this.$store.dispatch(‘someFunction’)
```

* commit
This allows us to _store_ things into the store allowing the app to be reactive.
```
	this.$store.commit(‘someFunction’)
```

- - - -
### Laravel Routes in Javascript
We added a package in the beginning called Laroute, which allows us to access routes just like we would in Laravel. [Laravel Route Helpers](https://laravel.com/docs/5.3/helpers#urls)
```
	laroute.action('MessagesController@index`)
```

- - - -
## Tasks
- [ ] Make an input field and bind `message` to the components `data`
- [ ] Create a send message function that uses a store 
	- [ ] Create an action in the store to send the message to Laravel
	- [ ] Create a mutation to set the messages into
	- [ ] Create a state for messages
- [ ] Use the `created()` function to retrieve the messages from Laravel
- [ ] Display the list of messages  
- [ ] Display users name next to the message

- - - -
Continue to Interacting with Sockets 

# Routes
 Controllers
- - - -
branch `routes` 
- - - -
Using Laravel resource routes it makes it really easy to build 

`Route::resource('photos', 'PhotoController’);`

We will be placing these inside our `routes/api.php` file.

… Yup… that’s it.

- - - -
## Tasks
- [ ] User Resource Route
- [ ] Messages Resource Route
- [ ] run `php artisan laroute:generate` 
- - - -
Continue to Views

# Controllers
 Models
- - - -
branch `controllers` 
- - - -
[Resource Controllers](https://laravel.com/docs/5.3/controllers#resource-controllers)
Just like models we can generate our controllers really quickly to get us a basic HTTP resource controller.

`php artisan make:controller UsersController --resource`

Once you have created the controller, we can start filling out the areas with some code. 

> We will not be using  `create`  or  `edit`  functions in any of the controllers. These will be rendered in Vue.  

[Eloquent - Retrieving Models](https://laravel.com/docs/5.3/eloquent#retrieving-models)
You can easily grab your needed data by using the models we previously created. Simply import the model class and use the query functionality:

`return response()->json(Users::all());`

> I know some of you are already thinking about it… For time sake during this workshop, we will not be going into pagination.  

- - - -
[Validation](https://laravel.com/docs/5.3/validation)
## Http Request Validation
We will also need some request validation. This will eliminate the possibility of users trying to add additional data into our models.

`php artisan make:request UserRequest`

On your controller methods, you will see a class called `Request` being dependency injected into the method. We now want to use the new `UserRequest` class instead. This will validate the data.

- - - -
## Tasks
- [ ] UsersController
- [ ] MessagesController
- [ ] Request Validations


- - - -
Continue to Routes

# Models
 Migrations
- - - -
branch `models` 
- - - -
Now that we have the migrations done, we can now _move our generated models_ into the **Models** folder.

> This was a choice I made in the beginning, as Laravel doesn’t care about your structure and it can add folders where you see fit. I tend to work on larger applications that have a ton of models, and I don’t like clutter.  

Then, we need to make some relations so that our ORM can do the heavy lifting for us. Take a look at [Eloquent: Relationships](https://laravel.com/docs/5.3/eloquent-relationships)

## TLDR Edition
**User**  _hasMany_  **Messages**
**Messages** belongsTo **User**

- - - -
## Tasks
	- [ ] Move generated models into the  `app\Models`  folder
	- [ ] Change namespace on those models
	- [ ] Connect the models with relations

- - - -
Continue to Controllers

# Migrations
 Getting to know Vue
- - - -
We need some way to store the data into our database. We can first create the migrations that make it really easy for other developers to help improve your code.

A neat trick that is really useful is that we can create the model and the migration at the same time by using:

`php artisan make:model ModelName -m`

- - - -
### What do we need?
Well let’s think about this,

**Users** can have _many_ **Messages** and those **Messages** _belong_ to a **User**.

- - - -
## Tasks
So we need 3 Models:
	- [x] User Model & Migration
	- [ ] Channel Model & Migration
	- [ ] Message Model & Migration
	- [ ] One Migration will have two tables 
	- [ ] Run `php artisan migrate`

> If you mess up a migration, just run `php artisan migrate:rollback` . Just don’t forget to run your seeders!	  
	
- - - -
Continue to Models

# Getting to know Vue
 Getting to know Laravel
- - - -
## Oh Vue, where have you been?
If you don’t know ES6 syntax, don’t worry. It’s not as complicated as all those books you’ve been reading makes it out to be.

- - - -
## Data Binding
* [data](https://vuejs.org/v2/api/#data) 
* [methods](https://vuejs.org/v2/api/#methods)
* [computed](https://vuejs.org/v2/api/#computed)

To bind some data to the template, all you have to do is: 

```
<div id="app">
  {{ message }}
</div>
```

```
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!'
  }
})
```


Now, when you change `message` inside of your data, the message will automatically update! 

- - - -
 
## Basics of Template Directives
> [Directives](https://vuejs.org/v2/api/#Directives)  
*  v-show
* v-if
* v-else
* v-else-if
* v-for
* v-model 

Quick example: 
```
<div v-if="Math.random() > 0.5">
  Now you see me
</div>
<div v-else>
  Now you don't
</div>
```


[v-on](https://vuejs.org/v2/api/#v-on) example:
```
<p @click="doSomethingAwesome()"></p>
<p @click.prevent.stop="preventsAndStopsPropagation()"></p>
```

[Key Modifiers](https://vuejs.org/v2/guide/events.html#Key-Modifiers) example:
```
<!— Alt + C —>
<input @keyup.alt.67=“clear”>
<!-- Ctrl + Click -->
<div @click.ctrl="doSomething">Do something</div>
```


- - - -
We will be going pretty deep into Vue’s ecosystem with [Vuex](https://vuex.vuejs.org/en/) and [Vue-Router](https://router.vuejs.org/). Those each have their own documentation. 

> [Vuex - Core Concepts](https://vuex.vuejs.org/en/state.html)  
> Vuex’s documentation isn’t up to par with the rest, but don’t worry I can explain it all once we get into that area of the app.  

- - - -
Migrations


# Getting to know Laravel
 Base Install
- - - -
## It’s a big framework, where do I start?
1. Routes
2. Controllers
3. Models & Migrations / Seeders
4. Templates / Views / Blade Syntax

- - - -
## Resources
We can’t get through everything today, but there are some really good resources out there:

* [Books](https://github.com/chiraggude/awesome-laravel#books)
* [Laracasts](https://laracasts.com/)
* [Other Communities](https://github.com/chiraggude/awesome-laravel#community)
* [Laravel Slack Channel](https://larachat.co/)

Also, my best recommendation is just to read every single page of the documentation.

- - - -
Getting to know Vue

# Base Install	
 Environment Setup
- - - -
## PHP Framework 
In this workshop we are going to be using [Laravel 5.3](https://github.com/laravel/laravel)  We also require some additional packages to save us some time….

## Composer Packages
* [Redis](https://github.com/nrk/predis) 
* [Laravel Echo](https://laravel.com/docs/5.3/broadcasting#installing-laravel-echo) 
* [Laravel Passport](https://laravel.com/docs/5.3/passport) 
* [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper)
* [Laroute - Laravel Routes in Javascript](https://github.com/aaronlord/laroute)

## Basic Node Modules
* [Lodash](https://lodash.com/)
* [Pusher Client](https://github.com/pusher/pusher-js)
* [ESLint](https://github.com/eslint/eslint)  - Javascript Linter
* [Webpack & Webpack Dev Server](https://github.com/webpack) 

## VueJS Node Modules
* [Vuex](https://github.com/vuejs/vuex) 
* [VueJS](https://github.com/vuejs/vue)
* [Vue-Router](https://github.com/vuejs/vue-router)

## Laravel Node Modules
* [Laravel Mix](https://github.com/JeffreyWay/laravel-mix)


#### Whew!
That seems like a lot just to get something really simple?! You really don’t need all of these, but they make your (and my) life much simpler.  In fact, you could just use Laravel out of the box with jQuery and build your stuff with Ajax, but where’s the fun in that? 

- - - -
## Ha… Luckily, I’ve done a bit of work to get this ready for you
- [ ] `git clone git@github.com:lukepolo/LaraChat.git`
- [ ] `composer install`
- [ ] `yarn install`
- [ ] `php -r "file_exists('.env') || copy('.env.example', '.env');" `
- [ ] `php artisan key:generate`
- [ ] Add `larachat` to your database of choice
- [ ] `php artisan migrate —seed`
- [ ] Ask me for pusher keys or install your own

- - - -
Getting to know Laravel




# Environment Setup
  Why Vue?
- - - -
## Requirements 
- [ ] HTTP Server (NGINX / Apache) 
- [ ] PHP 7+
- [ ] One of the following:  Mysql / Postgres / MariaDB / SqlLite
- [ ] SQL Editor (if you can do it by hand go for it)

## A Suggestion
* [Laravel Valet](https://laravel.com/docs/5.3/valet)
* [Laravel Homestead](https://laravel.com/docs/5.3/homestead)

Now before you get all testy, and say, 

> “I don’t want to muddy my machine with all this Laravel crap”, …  

both options contain pretty solid defaults for any type of PHP project, and I suggest you give both a try. 

- - - -
Continue to the Base Install

# Why Vue?

- - - -
VueJS has written out a really detailed review of other frameworks :
> [Comparison with Other Frameworks ](https://vuejs.org/v2/guide/comparison.html)    
> Note : [2.0 React comparison guide collaboration ](https://github.com/vuejs/vuejs.org/issues/364)  

### TLDR edition : 
It’s quick, (really quick) and it is most commonly compared to React. The biggest difference in my mind is that VueJS _doesn’t require_ you to write render functions to output your html.  

If you’re the person that says they would rather write things like:
```
render () {
  let { items } = this.props
  let children
  if (items.length > 0) {
    children = (
      <ul>
        {items.map(item =>
          <li key={item.id}>{item.name}</li>
        )}
      </ul>
    )
  } else {
    children = <p>No items found.</p>
  }
  return (
    <div className=‘list-container’>
      {children}
    </div>
  )
}
```

instead of:
```
<template>
  <div class=“list-container”>
    <ul v-if=“items.length”>
      <li v-for=“item in items”>
        {{ item.name }}
      </li>
    </ul>
    <p v-else>No items found.</p>
  </div>
</template>
```

I just don’t know what I could say that would convince you to try Vue.

- - - -
Continue to Environment Setup

# Why Laravel?
 Welcome
- - - -
## Why should we even use Laravel!?
We could argue this point all day, but the fact is, the number of features the framework has built allows us to write less code really quickly. The features that we don’t have to write ourselves today are :

* ORM
* Routing
* OAuth Server
* IoC Container
* Queue System
* CSRF Protection
* Request Validation
* Event Broadcasting 
* Sessions & Cookies
* Authentication System

…. ok, I think thats it.

Of course, this comes with a price. The framework is slower than some others, but with leverage from OpCache and PHP 7, they help these larger frameworks compete with the slimmer ones. 

Feel free to pick your poison , I’m not stopping you.

- - - -
Continue to Why Vue?
