# Test introduction and expectations

The purpose of this test is to see how you would implement a couple of features described in [Gherkin language](http://docs.behat.org/en/latest/guides/1.gherkin.html#gherkin-syntax) for a cooking recipes platform.    
Whatever you deliver, we will give value to it if it really works. This means that anything you implement, whether it's big or small, should simply work. Since this is a backend test, don't spend any time trying to build a fancy UI. Just focus on doing your best implementing the functionalities we ask for.

Since we like testing and we try to use it in any development we work with, we also encourage you to use functional tests and unit testing to drive your implementations. To give you some ideas, we currently use Behat3 and PHPUnit, but you can use whatever you prefer.   
Looking at the project structure you will see a couple of .feature files where the following behaviours are described:

__1. Save recipe into a cookbook__  

- Build the functionality to save a recipe into an existing cookbook.

__2. Be updated when a user saves a recipe into a cookbook__
 
- Build the functionality around a notifications workflow when certain events like save a recipe happen in the application.  

Please send us an email when you consider your test to be finished, so we can start taking a look at it. We encourage you not to dedicate more than 4 hours to the test. We know that everybody is busy with other stuff.  
If you have any questions or doubts about the test, or if you have finished the test, please contact us at cv@mytaste.com

# Environment Setup
The following instructions are our proposal for setting up a testing environment in less than 10 minutes. This will allow you to start with the technical test right away.

The steps you should follow are:

__1- Fork the test repository in github:__

- git@github.com:203webgroup/myTasteRecruitmentPhpTest.git

__2- In order to have everything up and running you will need to install composer dependencies__  

$ cd myTasteRecruitmentPhpTest  
$ php composer.phar install

Good luck!  
myTaste developers team