# CMPT350 Assignment3-Task B

Name: Rongli Han

Group programming with Michal Luczynski

MySQL database is on lovett.usask.ca server.
Database name is cmpt350_roh919.

SQL database with is called Azure is on azure portal.
Database name is Assignment2.
And I use Azure website host since homepage.usask.ca does not have PDO driver.
The website host is connected with a Github repository which is called CMPT350-A2-Azure.
Here is URL https://github.com/Henry0422/CMPT350-A2-Azure.


Display Online Contacts
Simple page that lets you add people to a contact book.
It will read contacts from a database and display them on individual "cards".
You will be able to edit and delete contacts.


Add new contact
On the left hand side of home page, you are able to add new contact.
In the real world, we may not get each contact all information. So only firstname, lastname, email, phone number and adding contact date are not null attributes in the database.
Once filled in the required info you are able to add new contact. Otherwise, it will display the error message.
At the back-end, javascript will check user input regulation. For example, firstname and lastname must be all characters; Email will in "abc123@mail.usask.ca" or similar format. url must begin with "http://" and phone number must be all numbers.


Update page
Basically, it has the same layout with home page.
Click the update botton below each contact card to update a contact.
It will show the update confirmation page, after 4 seconds it will redirect to home page automatically.
Otherwise, it will display the error message.


Delete contact
Click the delete botton below each contact card to delete a contact.
First, it will pop up the alert box "Would you like to delete the contact?".
Once you click confirm, it will delete the information in the database and show the delete success message on confirmation page.
Otherwise, it will display the error message.
After 4 seconds it will redirect to home page automatically.
