+--------+-----------+--------------------------------------------+----------------------+-------------------------------------------------------------------------+--------------+
| Domain | Method    | URI                                        | Name                 | Action                                                                  | Middleware   |
+--------+-----------+--------------------------------------------+----------------------+-------------------------------------------------------------------------+--------------+
|        | GET|HEAD  | /                                          | home                 | App\Http\Controllers\HomeController@index                               | web          |
|        | GET|HEAD  | about                                      | about                | App\Http\Controllers\AboutController@index                              | web          |
|        | GET|HEAD  | api/user                                   |                      | Closure                                                                 | api          |
|        |           |                                            |                      |                                                                         | auth:api     |
|        | GET|HEAD  | articles                                   | articles             | App\Http\Controllers\ArticlesController@index                           | web          |
|        | GET|HEAD  | articles/{article}                         | article.show         | App\Http\Controllers\ArticlesController@show                            | web          |
|        | GET|HEAD  | artists/artist/{artist}                    | artist.show          | App\Http\Controllers\ArtistsController@show                             | web          |
|        | GET|HEAD  | artists/event/{event}                      | artists              | App\Http\Controllers\ArtistsController@index                            | web          |
|        | POST      | artists/inscription/{event}                | artists.inscription  | App\Http\Controllers\ArtistsController@inscription                      | web          |
|        | GET|HEAD  | backoffice                                 | backoffice.index     | App\Http\Controllers\BackofficeController@index                         | web          |
|        |           |                                            |                      |                                                                         | auth         |
|        |           |                                            |                      |                                                                         | verified     |
|        | GET|HEAD  | backoffice/articles                        | articles.index       | App\Http\Controllers\BackofficeArticlesController@index                 | web          |
|        | POST      | backoffice/articles                        | articles.store       | App\Http\Controllers\BackofficeArticlesController@store                 | web          |
|        | GET|HEAD  | backoffice/articles/create                 | articles.create      | App\Http\Controllers\BackofficeArticlesController@create                | web          |
|        | GET|HEAD  | backoffice/articles/{article}              | articles.show        | App\Http\Controllers\BackofficeArticlesController@show                  | web          |
|        | PUT|PATCH | backoffice/articles/{article}              | articles.update      | App\Http\Controllers\BackofficeArticlesController@update                | web          |
|        | DELETE    | backoffice/articles/{article}              | articles.destroy     | App\Http\Controllers\BackofficeArticlesController@destroy               | web          |
|        | GET|HEAD  | backoffice/articles/{article}/edit         | articles.edit        | App\Http\Controllers\BackofficeArticlesController@edit                  | web          |
|        | GET|HEAD  | backoffice/artists                         | artists.index        | App\Http\Controllers\BackofficeArtistsController@index                  | web          |
|        | POST      | backoffice/artists                         | artists.store        | App\Http\Controllers\BackofficeArtistsController@store                  | web          |
|        | GET|HEAD  | backoffice/artists/create                  | artists.create       | App\Http\Controllers\BackofficeArtistsController@create                 | web          |
|        | GET|HEAD  | backoffice/artists/{artist}                | artists.show         | App\Http\Controllers\BackofficeArtistsController@show                   | web          |
|        | PUT|PATCH | backoffice/artists/{artist}                | artists.update       | App\Http\Controllers\BackofficeArtistsController@update                 | web          |
|        | DELETE    | backoffice/artists/{artist}                | artists.destroy      | App\Http\Controllers\BackofficeArtistsController@destroy                | web          |
|        | GET|HEAD  | backoffice/artists/{artist}/edit           | artists.edit         | App\Http\Controllers\BackofficeArtistsController@edit                   | web          |
|        | GET|HEAD  | backoffice/contact                         | contact.index        | App\Http\Controllers\BackofficeContactController@index                  | web          |
|        | POST      | backoffice/contact                         | contact.store        | App\Http\Controllers\BackofficeContactController@store                  | web          |
|        | GET|HEAD  | backoffice/contact/create                  | contact.create       | App\Http\Controllers\BackofficeContactController@create                 | web          |
|        | GET|HEAD  | backoffice/contact/{contact}               | contact.show         | App\Http\Controllers\BackofficeContactController@show                   | web          |
|        | PUT|PATCH | backoffice/contact/{contact}               | contact.update       | App\Http\Controllers\BackofficeContactController@update                 | web          |
|        | DELETE    | backoffice/contact/{contact}               | contact.destroy      | App\Http\Controllers\BackofficeContactController@destroy                | web          |
|        | GET|HEAD  | backoffice/contact/{contact}/edit          | contact.edit         | App\Http\Controllers\BackofficeContactController@edit                   | web          |
|        | GET|HEAD  | backoffice/events                          | events.index         | App\Http\Controllers\BackofficeEventsController@index                   | web          |
|        | POST      | backoffice/events                          | events.store         | App\Http\Controllers\BackofficeEventsController@store                   | web          |
|        | GET|HEAD  | backoffice/events/create                   | events.create        | App\Http\Controllers\BackofficeEventsController@create                  | web          |
|        | GET|HEAD  | backoffice/events/{event}                  | events.show          | App\Http\Controllers\BackofficeEventsController@show                    | web          |
|        | PUT|PATCH | backoffice/events/{event}                  | events.update        | App\Http\Controllers\BackofficeEventsController@update                  | web          |
|        | DELETE    | backoffice/events/{event}                  | events.destroy       | App\Http\Controllers\BackofficeEventsController@destroy                 | web          |
|        | GET|HEAD  | backoffice/events/{event}/edit             | events.edit          | App\Http\Controllers\BackofficeEventsController@edit                    | web          |
|        | GET|HEAD  | backoffice/files                           | files.index          | App\Http\Controllers\BackofficeFilesController@index                    | web          |
|        | POST      | backoffice/files                           | files.store          | App\Http\Controllers\BackofficeFilesController@store                    | web          |
|        | GET|HEAD  | backoffice/files/create                    | files.create         | App\Http\Controllers\BackofficeFilesController@create                   | web          |
|        | GET|HEAD  | backoffice/files/{file}                    | files.show           | App\Http\Controllers\BackofficeFilesController@show                     | web          |
|        | PUT|PATCH | backoffice/files/{file}                    | files.update         | App\Http\Controllers\BackofficeFilesController@update                   | web          |
|        | DELETE    | backoffice/files/{file}                    | files.destroy        | App\Http\Controllers\BackofficeFilesController@destroy                  | web          |
|        | GET|HEAD  | backoffice/files/{file}/edit               | files.edit           | App\Http\Controllers\BackofficeFilesController@edit                     | web          |
|        | GET|HEAD  | backoffice/guest                           | guest.index          | App\Http\Controllers\BackofficeGuestController@index                    | web          |
|        | POST      | backoffice/guest                           | guest.store          | App\Http\Controllers\BackofficeGuestController@store                    | web          |
|        | GET|HEAD  | backoffice/guest/create                    | guest.create         | App\Http\Controllers\BackofficeGuestController@create                   | web          |
|        | GET|HEAD  | backoffice/guest/{guest}                   | guest.show           | App\Http\Controllers\BackofficeGuestController@show                     | web          |
|        | PUT|PATCH | backoffice/guest/{guest}                   | guest.update         | App\Http\Controllers\BackofficeGuestController@update                   | web          |
|        | DELETE    | backoffice/guest/{guest}                   | guest.destroy        | App\Http\Controllers\BackofficeGuestController@destroy                  | web          |
|        | GET|HEAD  | backoffice/guest/{guest}/edit              | guest.edit           | App\Http\Controllers\BackofficeGuestController@edit                     | web          |
|        | GET|HEAD  | backoffice/inscriptions                    | inscriptions.index   | App\Http\Controllers\BackofficeInscriptionsController@index             | web          |
|        | POST      | backoffice/inscriptions                    | inscriptions.store   | App\Http\Controllers\BackofficeInscriptionsController@store             | web          |
|        | GET|HEAD  | backoffice/inscriptions/create             | inscriptions.create  | App\Http\Controllers\BackofficeInscriptionsController@create            | web          |
|        | GET|HEAD  | backoffice/inscriptions/{inscription}      | inscriptions.show    | App\Http\Controllers\BackofficeInscriptionsController@show              | web          |
|        | PUT|PATCH | backoffice/inscriptions/{inscription}      | inscriptions.update  | App\Http\Controllers\BackofficeInscriptionsController@update            | web          |
|        | DELETE    | backoffice/inscriptions/{inscription}      | inscriptions.destroy | App\Http\Controllers\BackofficeInscriptionsController@destroy           | web          |
|        | GET|HEAD  | backoffice/inscriptions/{inscription}/edit | inscriptions.edit    | App\Http\Controllers\BackofficeInscriptionsController@edit              | web          |
|        | GET|HEAD  | confirm-password                           | password.confirm     | App\Http\Controllers\Auth\ConfirmablePasswordController@show            | web          |
|        |           |                                            |                      |                                                                         | auth         |
|        | POST      | confirm-password                           |                      | App\Http\Controllers\Auth\ConfirmablePasswordController@store           | web          |
|        |           |                                            |                      |                                                                         | auth         |
|        | GET|HEAD  | contact                                    | contact              | App\Http\Controllers\ContactController@index                            | web          |
|        | POST      | email/verification-notification            | verification.send    | App\Http\Controllers\Auth\EmailVerificationNotificationController@store | web          |
|        |           |                                            |                      |                                                                         | auth         |
|        |           |                                            |                      |                                                                         | throttle:6,1 |
|        | GET|HEAD  | events                                     | events               | App\Http\Controllers\EventsController@index                             | web          |
|        | GET|HEAD  | events/{event}                             | event.show           | App\Http\Controllers\EventsController@show                              | web          |
|        | GET|HEAD  | forgot-password                            | password.request     | App\Http\Controllers\Auth\PasswordResetLinkController@create            | web          |
|        |           |                                            |                      |                                                                         | guest        |
|        | POST      | forgot-password                            | password.email       | App\Http\Controllers\Auth\PasswordResetLinkController@store             | web          |
|        |           |                                            |                      |                                                                         | guest        |
|        | GET|HEAD  | gallery                                    | gallery              | App\Http\Controllers\GalleryController@index                            | web          |
|        | GET|HEAD  | guestbook                                  | guestbook            | App\Http\Controllers\GuestbookController@index                          | web          |
|        | GET|HEAD  | lang/{lang}                                | lang.switch          | App\Http\Controllers\LanguageController@switchLang                      | web          |
|        | GET|HEAD  | login                                      | login                | App\Http\Controllers\Auth\AuthenticatedSessionController@create         | web          |
|        |           |                                            |                      |                                                                         | guest        |
|        | POST      | login                                      |                      | App\Http\Controllers\Auth\AuthenticatedSessionController@store          | web          |
|        |           |                                            |                      |                                                                         | guest        |
|        | POST      | logout                                     | logout               | App\Http\Controllers\Auth\AuthenticatedSessionController@destroy        | web          |
|        |           |                                            |                      |                                                                         | auth         |
|        | GET|HEAD  | register                                   | register             | App\Http\Controllers\Auth\RegisteredUserController@create               | web          |
|        |           |                                            |                      |                                                                         | guest        |
|        | POST      | register                                   |                      | App\Http\Controllers\Auth\RegisteredUserController@store                | web          |
|        |           |                                            |                      |                                                                         | guest        |
|        | POST      | reset-password                             | password.update      | App\Http\Controllers\Auth\NewPasswordController@store                   | web          |
|        |           |                                            |                      |                                                                         | guest        |
|        | GET|HEAD  | reset-password/{token}                     | password.reset       | App\Http\Controllers\Auth\NewPasswordController@create                  | web          |
|        |           |                                            |                      |                                                                         | guest        |
|        | GET|HEAD  | verify-email                               | verification.notice  | App\Http\Controllers\Auth\EmailVerificationPromptController@__invoke    | web          |
|        |           |                                            |                      |                                                                         | auth         |
|        | GET|HEAD  | verify-email/{id}/{hash}                   | verification.verify  | App\Http\Controllers\Auth\VerifyEmailController@__invoke                | web          |
|        |           |                                            |                      |                                                                         | auth         |
|        |           |                                            |                      |                                                                         | signed       |
|        |           |                                            |                      |                                                                         | throttle:6,1 |
+--------+-----------+--------------------------------------------+----------------------+-------------------------------------------------------------------------+--------------+