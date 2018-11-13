## P3 Peer Review

+ Reviewer's name: Venkatesh Mantha
+ Reviwee's name: Alexander Noren
+ URL to Reviewee's P3 Github Repo URL: *<https://github.com/dnoren32/p3>*

## 1. Interface

+ It would have been really helpful if there was a short description or a handy link that describes what DiSC behavioural assessment is.
The idea is to not let users off the website but rather keep them engaged within the interface wherever possible
+ The second input asks 'Which personality trait was strongest based on the assessment?' when the actual link to take the assessment appears after the form is submitted. This could be a little confusing for some users
+ The interface does a good job in fetching the trait's behavioural description when selected from the dropdown
+ The results could have been more personalized by using the inputs of first and last name which are not being used now


## 2. Functional testing

+ The inputs for first name, last name and email fields have validation checks
+ There is no action when the dropdown and radio button aren't selected
+ The inputs take only letters as input and throw an error appropriately for any other combination of input
+ Since the interface uses GET, to refresh/clear the form, one has to manually clear all the inputs to return to home. This could be a pain after many form submits as hitting the back button on browser will take you to the form with the previous inputs.
+ Accessing a page that doesn't exist shows a 404 page
+ The title of the page is clickable but it leads to the same page and clears the form


## 3. Code: Routes

+ The separation of concern between Routes and Controller has been handled well
+ Every view except when the dropdown is selected is returned with null values
```
        $trait =  null;
        $checkbox = null;
        $name = null;
        $last = null;
        $email =null;
```
This is a little repetitive and could be initialized just once for brevity

## 4. Code: Views

+ Templace inheritance is used to good effect
+ There are no separation of concern issues
+ Nothing is done in PHP that could have been done in Blade
+ I am familiar with the Blade syntax/techniques used

## 5. Code: General

+ Did not notice any inconsistencies between the code and the course notes on [code style](https://github.com/susanBuck/dwa15-fall2018/blob/master/misc/code-style.md)
+ Best practices discussed in course material about interface use and design could have better followed
+ The code is self-evident and well-commented


## 6. Misc
N/A