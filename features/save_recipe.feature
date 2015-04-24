Feature: Save recipes into cookbooks

  Scenario: Add recipe to cookbook
    Given exists a user named "John" who owns a cookbook named "Desserts"
      And exists a recipe of title "Crema catalana"
     When the recipe "Crema catalana" is added to the John's cookbook named "Desserts"
     Then the John's cookbook named "Desserts" should contain the recipe of title "Crema Catalana"
