+--------+-----------+---------------------------------+---------------------+-------------------------------------------------------------------------+--------------+
| Domain | Method    | URI                             | Name                | Action                                                                  | Middleware   |
+--------+-----------+---------------------------------+---------------------+-------------------------------------------------------------------------+--------------+
|        | GET|HEAD  | /                               | home                | App\Http\Controllers\HomeController@index                               | web          |
|        | GET|HEAD  | about                           | about               | App\Http\Controllers\AboutController@index                              | web          |
|        | GET|HEAD  | api/user                        |                     | Closure                                                                 | api          |
|        |           |                                 |                     |                                                                         | auth:api     |
|        | GET|HEAD  | articles                        | articles.index      | App\Http\Controllers\ArticlesController@index                           | web          |
|        | POST      | articles                        | articles.store      | App\Http\Controllers\ArticlesController@store                           | web          |
|        | GET|HEAD  | articles/create                 | articles.create     | App\Http\Controllers\ArticlesController@create                          | web          |
|        | GET|HEAD  | articles/{article}              | articles.show       | App\Http\Controllers\ArticlesController@show                            | web          |
|        | PUT|PATCH | articles/{article}              | articles.update     | App\Http\Controllers\ArticlesController@update                          | web          |
|        | DELETE    | articles/{article}              | articles.destroy    | App\Http\Controllers\ArticlesController@destroy                         | web          |
|        | GET|HEAD  | articles/{article}/edit         | articles.edit       | App\Http\Controllers\ArticlesController@edit                            | web          |
|        | GET|HEAD  | backoffice                      | backoffice.index    | App\Http\Controllers\BackofficeController@index                         | web          |
|        | POST      | backoffice                      | backoffice.store    | App\Http\Controllers\BackofficeController@store                         | web          |
|        | GET|HEAD  | backoffice/create               | backoffice.create   | App\Http\Controllers\BackofficeController@create                        | web          |
|        | GET|HEAD  | backoffice/{backoffice}         | backoffice.show     | App\Http\Controllers\BackofficeController@show                          | web          |
|        | PUT|PATCH | backoffice/{backoffice}         | backoffice.update   | App\Http\Controllers\BackofficeController@update                        | web          |
|        | DELETE    | backoffice/{backoffice}         | backoffice.destroy  | App\Http\Controllers\BackofficeController@destroy                       | web          |
|        | GET|HEAD  | backoffice/{backoffice}/edit    | backoffice.edit     | App\Http\Controllers\BackofficeController@edit                          | web          |
|        | GET|HEAD  | confirm-password                | password.confirm    | App\Http\Controllers\Auth\ConfirmablePasswordController@show            | web          |
|        |           |                                 |                     |                                                                         | auth         |
|        | POST      | confirm-password                |                     | App\Http\Controllers\Auth\ConfirmablePasswordController@store           | web          |
|        |           |                                 |                     |                                                                         | auth         |
|        | GET|HEAD  | contact                         | contact             | App\Http\Controllers\ContactController@index                            | web          |
|        | POST      | email/verification-notification | verification.send   | App\Http\Controllers\Auth\EmailVerificationNotificationController@store | web          |
|        |           |                                 |                     |                                                                         | auth         |
|        |           |                                 |                     |                                                                         | throttle:6,1 |
|        | GET|HEAD  | events                          | events.index        | App\Http\Controllers\EventsController@index                             | web          |
|        | POST      | events                          | events.store        | App\Http\Controllers\EventsController@store                             | web          |
|        | GET|HEAD  | events/create                   | events.create       | App\Http\Controllers\EventsController@create                            | web          |
|        | GET|HEAD  | events/{event}                  | events.show         | App\Http\Controllers\EventsController@show                              | web          |
|        | PUT|PATCH | events/{event}                  | events.update       | App\Http\Controllers\EventsController@update                            | web          |
|        | DELETE    | events/{event}                  | events.destroy      | App\Http\Controllers\EventsController@destroy                           | web          |
|        | GET|HEAD  | events/{event}/edit             | events.edit         | App\Http\Controllers\EventsController@edit                              | web          |
|        | GET|HEAD  | forgot-password                 | password.request    | App\Http\Controllers\Auth\PasswordResetLinkController@create            | web          |
|        |           |                                 |                     |                                                                         | guest        |
|        | POST      | forgot-password                 | password.email      | App\Http\Controllers\Auth\PasswordResetLinkController@store             | web          |
|        |           |                                 |                     |                                                                         | guest        |
|        | GET|HEAD  | gallery                         | gallery.index       | App\Http\Controllers\GalleryController@index                            | web          |
|        | POST      | gallery                         | gallery.store       | App\Http\Controllers\GalleryController@store                            | web          |
|        | GET|HEAD  | gallery/create                  | gallery.create      | App\Http\Controllers\GalleryController@create                           | web          |
|        | GET|HEAD  | gallery/{gallery}               | gallery.show        | App\Http\Controllers\GalleryController@show                             | web          |
|        | PUT|PATCH | gallery/{gallery}               | gallery.update      | App\Http\Controllers\GalleryController@update                           | web          |
|        | DELETE    | gallery/{gallery}               | gallery.destroy     | App\Http\Controllers\GalleryController@destroy                          | web          |
|        | GET|HEAD  | gallery/{gallery}/edit          | gallery.edit        | App\Http\Controllers\GalleryController@edit                             | web          |
|        | GET|HEAD  | guestbook                       | guestbook.index     | App\Http\Controllers\GuestbookController@index                          | web          |
|        | POST      | guestbook                       | guestbook.store     | App\Http\Controllers\GuestbookController@store                          | web          |
|        | GET|HEAD  | guestbook/create                | guestbook.create    | App\Http\Controllers\GuestbookController@create                         | web          |
|        | GET|HEAD  | guestbook/{guestbook}           | guestbook.show      | App\Http\Controllers\GuestbookController@show                           | web          |
|        | PUT|PATCH | guestbook/{guestbook}           | guestbook.update    | App\Http\Controllers\GuestbookController@update                         | web          |
|        | DELETE    | guestbook/{guestbook}           | guestbook.destroy   | App\Http\Controllers\GuestbookController@destroy                        | web          |
|        | GET|HEAD  | guestbook/{guestbook}/edit      | guestbook.edit      | App\Http\Controllers\GuestbookController@edit                           | web          |
|        | GET|HEAD  | login                           | login               | App\Http\Controllers\Auth\AuthenticatedSessionController@create         | web          |
|        |           |                                 |                     |                                                                         | guest        |
|        | POST      | login                           |                     | App\Http\Controllers\Auth\AuthenticatedSessionController@store          | web          |
|        |           |                                 |                     |                                                                         | guest        |
|        | POST      | logout                          | logout              | App\Http\Controllers\Auth\AuthenticatedSessionController@destroy        | web          |
|        |           |                                 |                     |                                                                         | auth         |
|        | GET|HEAD  | register                        | register            | App\Http\Controllers\Auth\RegisteredUserController@create               | web          |
|        |           |                                 |                     |                                                                         | guest        |
|        | POST      | register                        |                     | App\Http\Controllers\Auth\RegisteredUserController@store                | web          |
|        |           |                                 |                     |                                                                         | guest        |
|        | POST      | reset-password                  | password.update     | App\Http\Controllers\Auth\NewPasswordController@store                   | web          |
|        |           |                                 |                     |                                                                         | guest        |
|        | GET|HEAD  | reset-password/{token}          | password.reset      | App\Http\Controllers\Auth\NewPasswordController@create                  | web          |
|        |           |                                 |                     |                                                                         | guest        |
|        | GET|HEAD  | verify-email                    | verification.notice | App\Http\Controllers\Auth\EmailVerificationPromptController@__invoke    | web          |
|        |           |                                 |                     |                                                                         | auth         |
|        | GET|HEAD  | verify-email/{id}/{hash}        | verification.verify | App\Http\Controllers\Auth\VerifyEmailController@__invoke                | web          |
|        |           |                                 |                     |                                                                         | auth         |
|        |           |                                 |                     |                                                                         | signed       |
|        |           |                                 |                     |                                                                         | throttle:6,1 |
+--------+-----------+---------------------------------+---------------------+-------------------------------------------------------------------------+--------------+