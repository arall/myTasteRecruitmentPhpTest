# Test introduction and expectations

The purpose of this test is to see how are you able to implement a couple of features described in [Gherkin language](http://docs.behat.org/en/latest/guides/1.gherkin.html#gherkin-syntax) for a cooking recipes platform.    
Whatever you deliver, we'll give value to it if it really works. It means that anything that you implement, even if it's big or small, it should simply work.

Since we like testing and we try to use it in any development we work with, we also encourage you to use functional tests and unit testing to drive your implementations. To give you some ideas, we currently use Behat3 and PHPUnit, but you can use whatever you prefer.   
Looking at the project structure you'll see a couple of .feature files where the following behaviours are described:

__1. Save recipe into a cookbook__  

- Build the functionality to save a recipe into an existing cookbook.

__2. Be updated when a user saves a recipe into a cookbook__
  
- Build the functionality around a notifications workflow when certain events like save a recipe happen in the application.  

We encourage you not to dedicate more than 4 hours to the test. We know that everybody is busy with other stuff.  
If you have any questions or doubts about the test, please contact us at platypus@mytaste.com

# Environment Setup
The following instructions are our proposal for setting up a testing environment in less than 10 minutes. This will allow you to start with the technical test right away.  

This setup will end up with a project that should contain your implementation. Note that we've prepared simple __Silex__ framework setup. We've choosen this framework for simplicity, but if you prefer to use a different one, you're free to do it.

The steps you should follow are:

__1- Fork the test repository in github:__

- git@github.com:203webgroup/myTasteRecruitmentPhpTest.git

__2- In order to have everything up and running you'll need to install composer dependencies__  

$ cd myTasteRecruitmentPhpTest  
$ php composer.phar install

Good luck!  
myTaste developers team
