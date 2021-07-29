## BACKOFFICE

To access the administrator Backoffice you have to click over the small "head with a hat" icon in the footer of the page. This will make visible a "Login" button. (The login/registration system has been implemented with [Laravel Breeze](https://github.com/laravel/breeze)).

![Login](readme/backoffice-login.png)

When you click the "Login" button you'll be redirected to the login form where you should put your admin credentials. For the moment it is not possible to register a new user. 

![Login Form](readme/backoffice-login-form.png)

Then you will enter the backoffice panel which is composed of 8 sections and 2 clickable buttons. The "Logo" button at the left takes you back to the Frontpage and the "Username" drop-down button at the right allows you to log out from the Backoffice.

![Backoffice Menu](readme/backoffice-menu.png)

### BACKOFFICE (WELCOME) page

For the moment, the "Backoffice" section only shows you a welcome message but we could add some other functionalities in the future such as the option to change the current password.

![Backoffice Welcome](readme/backoffice-section.png)

### ARTICLES page

In the "Articles" section, the admin can manage the Article elements. Articles are shown according to the "created_at" value from newest to oldest.

![Backoffice Articles](readme/backoffice-articles-section.png)

    - He can create a new Article that will be added to the "Articles" section in the Frontpage. All the fields are required except for the "URL". The picture will be also copied to the public folder /images/articles and it has a size limit of 5MB. When you create an Article the "article_date" value is assigned automatically according to the date/time it was created but you can change it afterwards. This date will affect the "Latest Articles" shown in the "Home" frontpage section. 

![Backoffice Add Article](readme/backoffice-articles-add.png)

    - He can edit existing Articles content.

![Backoffice Edit Article](readme/backoffice-articles-edit.png)
    
    - He can delete existing Articles. A confirm message will pop-up when you hit the "Delete" button. This will also automatically delete the image associated to the Article in the public images/articles folder.

![Backoffice Delete Article](readme/backoffice-articles-delete.png)

### EVENTS page

In the "Events" section, the admin can manage the Event elements. Events are shown according to the "date_start" value from newest to oldest.

![Backoffice Events](readme/backoffice-events-section.png)

    - He can create a new Event that will be added to the "Events" section in the Frontpage. All the fields are required. The pictures will be also copied to the public folder /images/events and they have a size limit of 5MB each. When you create an Event the "start_date" value will affect the "Next Events" shown in the "Home" frontpage section. Events are created with a default inscription "Status" of "CLOSED" so if you want people to be able to inscribe to this event you need to manually change the "Status" to "OPEN" afterwards.

![Backoffice Add Event](readme/backoffice-events-add-01.png)

![Backoffice Add Event](readme/backoffice-events-add-02.png)

    - He can edit existing Events content. Here he can change the inscription "Status" of the event between "OPEN" and "CLOSED". This value will affect the "Featured Event" shown in the "Home" frontpage section. If you have multiple events "OPEN" for inscription at the same time, the "Featured Event" shown will be the one with the lowest "start_date".

![Backoffice Edit Event](readme/backoffice-events-edit.png)
    
    - He can delete existing Events. A confirm message will pop-up when you hit the "Delete" button. This will also automatically delete the image associated to the Event in the public images/events folder.

![Backoffice Delete Event](readme/backoffice-events-delete.png)

### INSCRIPTIONS page

### MEMBERS page

### GALLERY page

### GUESTBOOK page

### CONTACT page
