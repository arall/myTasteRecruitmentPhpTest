Feature: News stream

  Scenario: Be updated when a user saves a recipe into a cookbook
    Given exists a user named "Doe"
      And exists a user named "John" who owns a cookbook named "Desserts"
      And "Doe" is following "John"
      And exists a recipe with title "Crema catalana"
     When "John" saves a recipe into his "Desserts" cookbook
     Then the "Doe"'s news stream should contain a "recipe-saved" notification
      And the notification should contain information from the user "John", the recipe "Crema catalana", the cookbook "Desserts" and when it occurred on.
