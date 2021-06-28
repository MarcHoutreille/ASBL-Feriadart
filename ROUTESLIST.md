+--------+-----------+--------------------------------------------------------+----------------------------+-------------------------------------------------------------------------+--------------+
| Domain | Method    | URI                                                    | Name                       | Action                                                                  | Middleware   |
+--------+-----------+--------------------------------------------------------+----------------------------+-------------------------------------------------------------------------+--------------+
|        | GET|HEAD  | /                                                      | home                       | App\Http\Controllers\HomeController@index                               | web          |
|        | GET|HEAD  | about                                                  | about                      | App\Http\Controllers\AboutController@index                              | web          |
|        | GET|HEAD  | api/user                                               |                            | Closure                                                                 | api          |
|        |           |                                                        |                            |                                                                         | auth:api     |
|        | GET|HEAD  | articles                                               | articles                   | App\Http\Controllers\ArticlesController@index                           | web          |
|        | GET|HEAD  | articles/{article}                                     | article.show               | App\Http\Controllers\ArticlesController@show                            | web          |
|        | GET|HEAD  | backoffice                                             | backoffice.index           | App\Http\Controllers\BackofficeController@index                         | web          |
|        |           |                                                        |                            |                                                                         | auth         |
|        |           |                                                        |                            |                                                                         | verified     |
|        | GET|HEAD  | backoffice/articles                                    | articles.index             | App\Http\Controllers\BackofficeArticlesController@index                 | web          |
|        | POST      | backoffice/articles                                    | articles.store             | App\Http\Controllers\BackofficeArticlesController@store                 | web          |
|        | GET|HEAD  | backoffice/articles/create                             | articles.create            | App\Http\Controllers\BackofficeArticlesController@create                | web          |
|        | GET|HEAD  | backoffice/articles/{article}                          | articles.show              | App\Http\Controllers\BackofficeArticlesController@show                  | web          |
|        | PUT|PATCH | backoffice/articles/{article}                          | articles.update            | App\Http\Controllers\BackofficeArticlesController@update                | web          |
|        | DELETE    | backoffice/articles/{article}                          | articles.destroy           | App\Http\Controllers\BackofficeArticlesController@destroy               | web          |
|        | GET|HEAD  | backoffice/articles/{article}/edit                     | articles.edit              | App\Http\Controllers\BackofficeArticlesController@edit                  | web          |
|        | GET|HEAD  | backoffice/artistsPictures                             | artistsPictures.index      | App\Http\Controllers\BackofficeArtistsPicturesController@index          | web          |
|        | POST      | backoffice/artistsPictures                             | artistsPictures.store      | App\Http\Controllers\BackofficeArtistsPicturesController@store          | web          |
|        | GET|HEAD  | backoffice/artistsPictures/create                      | artistsPictures.create     | App\Http\Controllers\BackofficeArtistsPicturesController@create         | web          |
|        | GET|HEAD  | backoffice/artistsPictures/{artistsPicture}            | artistsPictures.show       | App\Http\Controllers\BackofficeArtistsPicturesController@show           | web          |
|        | PUT|PATCH | backoffice/artistsPictures/{artistsPicture}            | artistsPictures.update     | App\Http\Controllers\BackofficeArtistsPicturesController@update         | web          |
|        | DELETE    | backoffice/artistsPictures/{artistsPicture}            | artistsPictures.destroy    | App\Http\Controllers\BackofficeArtistsPicturesController@destroy        | web          |
|        | GET|HEAD  | backoffice/artistsPictures/{artistsPicture}/edit       | artistsPictures.edit       | App\Http\Controllers\BackofficeArtistsPicturesController@edit           | web          |
|        | GET|HEAD  | backoffice/artistsVideos                               | artistsVideos.index        | App\Http\Controllers\BackofficeArtistsVideosController@index            | web          |
|        | POST      | backoffice/artistsVideos                               | artistsVideos.store        | App\Http\Controllers\BackofficeArtistsVideosController@store            | web          |
|        | GET|HEAD  | backoffice/artistsVideos/create                        | artistsVideos.create       | App\Http\Controllers\BackofficeArtistsVideosController@create           | web          |
|        | GET|HEAD  | backoffice/artistsVideos/{artistsVideo}                | artistsVideos.show         | App\Http\Controllers\BackofficeArtistsVideosController@show             | web          |
|        | PUT|PATCH | backoffice/artistsVideos/{artistsVideo}                | artistsVideos.update       | App\Http\Controllers\BackofficeArtistsVideosController@update           | web          |
|        | DELETE    | backoffice/artistsVideos/{artistsVideo}                | artistsVideos.destroy      | App\Http\Controllers\BackofficeArtistsVideosController@destroy          | web          |
|        | GET|HEAD  | backoffice/artistsVideos/{artistsVideo}/edit           | artistsVideos.edit         | App\Http\Controllers\BackofficeArtistsVideosController@edit             | web          |
|        | GET|HEAD  | backoffice/contact                                     | contact.index              | App\Http\Controllers\BackofficeContactController@index                  | web          |
|        | POST      | backoffice/contact                                     | contact.store              | App\Http\Controllers\BackofficeContactController@store                  | web          |
|        | GET|HEAD  | backoffice/contact/create                              | contact.create             | App\Http\Controllers\BackofficeContactController@create                 | web          |
|        | GET|HEAD  | backoffice/contact/{contact}                           | contact.show               | App\Http\Controllers\BackofficeContactController@show                   | web          |
|        | PUT|PATCH | backoffice/contact/{contact}                           | contact.update             | App\Http\Controllers\BackofficeContactController@update                 | web          |
|        | DELETE    | backoffice/contact/{contact}                           | contact.destroy            | App\Http\Controllers\BackofficeContactController@destroy                | web          |
|        | GET|HEAD  | backoffice/contact/{contact}/edit                      | contact.edit               | App\Http\Controllers\BackofficeContactController@edit                   | web          |
|        | GET|HEAD  | backoffice/events                                      | events.index               | App\Http\Controllers\BackofficeEventsController@index                   | web          |
|        | POST      | backoffice/events                                      | events.store               | App\Http\Controllers\BackofficeEventsController@store                   | web          |
|        | GET|HEAD  | backoffice/events/create                               | events.create              | App\Http\Controllers\BackofficeEventsController@create                  | web          |
|        | GET|HEAD  | backoffice/events/{event}                              | events.show                | App\Http\Controllers\BackofficeEventsController@show                    | web          |
|        | PUT|PATCH | backoffice/events/{event}                              | events.update              | App\Http\Controllers\BackofficeEventsController@update                  | web          |
|        | DELETE    | backoffice/events/{event}                              | events.destroy             | App\Http\Controllers\BackofficeEventsController@destroy                 | web          |
|        | GET|HEAD  | backoffice/events/{event}/edit                         | events.edit                | App\Http\Controllers\BackofficeEventsController@edit                    | web          |
|        | GET|HEAD  | backoffice/eventsInscriptions                          | eventsInscriptions.index   | App\Http\Controllers\BackofficeEventsInscriptionsController@index       | web          |
|        | POST      | backoffice/eventsInscriptions                          | eventsInscriptions.store   | App\Http\Controllers\BackofficeEventsInscriptionsController@store       | web          |
|        | GET|HEAD  | backoffice/eventsInscriptions/create                   | eventsInscriptions.create  | App\Http\Controllers\BackofficeEventsInscriptionsController@create      | web          |
|        | GET|HEAD  | backoffice/eventsInscriptions/{eventsInscription}      | eventsInscriptions.show    | App\Http\Controllers\BackofficeEventsInscriptionsController@show        | web          |
|        | PUT|PATCH | backoffice/eventsInscriptions/{eventsInscription}      | eventsInscriptions.update  | App\Http\Controllers\BackofficeEventsInscriptionsController@update      | web          |
|        | DELETE    | backoffice/eventsInscriptions/{eventsInscription}      | eventsInscriptions.destroy | App\Http\Controllers\BackofficeEventsInscriptionsController@destroy     | web          |
|        | GET|HEAD  | backoffice/eventsInscriptions/{eventsInscription}/edit | eventsInscriptions.edit    | App\Http\Controllers\BackofficeEventsInscriptionsController@edit        | web          |
|        | GET|HEAD  | backoffice/eventsPictures                              | eventsPictures.index       | App\Http\Controllers\BackofficeEventsPicturesController@index           | web          |
|        | POST      | backoffice/eventsPictures                              | eventsPictures.store       | App\Http\Controllers\BackofficeEventsPicturesController@store           | web          |
|        | GET|HEAD  | backoffice/eventsPictures/create                       | eventsPictures.create      | App\Http\Controllers\BackofficeEventsPicturesController@create          | web          |
|        | GET|HEAD  | backoffice/eventsPictures/{eventsPicture}              | eventsPictures.show        | App\Http\Controllers\BackofficeEventsPicturesController@show            | web          |
|        | PUT|PATCH | backoffice/eventsPictures/{eventsPicture}              | eventsPictures.update      | App\Http\Controllers\BackofficeEventsPicturesController@update          | web          |
|        | DELETE    | backoffice/eventsPictures/{eventsPicture}              | eventsPictures.destroy     | App\Http\Controllers\BackofficeEventsPicturesController@destroy         | web          |
|        | GET|HEAD  | backoffice/eventsPictures/{eventsPicture}/edit         | eventsPictures.edit        | App\Http\Controllers\BackofficeEventsPicturesController@edit            | web          |
|        | GET|HEAD  | backoffice/eventsVideos                                | eventsVideos.index         | App\Http\Controllers\BackofficeEventsVideosController@index             | web          |
|        | POST      | backoffice/eventsVideos                                | eventsVideos.store         | App\Http\Controllers\BackofficeEventsVideosController@store             | web          |
|        | GET|HEAD  | backoffice/eventsVideos/create                         | eventsVideos.create        | App\Http\Controllers\BackofficeEventsVideosController@create            | web          |
|        | GET|HEAD  | backoffice/eventsVideos/{eventsVideo}                  | eventsVideos.show          | App\Http\Controllers\BackofficeEventsVideosController@show              | web          |
|        | PUT|PATCH | backoffice/eventsVideos/{eventsVideo}                  | eventsVideos.update        | App\Http\Controllers\BackofficeEventsVideosController@update            | web          |
|        | DELETE    | backoffice/eventsVideos/{eventsVideo}                  | eventsVideos.destroy       | App\Http\Controllers\BackofficeEventsVideosController@destroy           | web          |
|        | GET|HEAD  | backoffice/eventsVideos/{eventsVideo}/edit             | eventsVideos.edit          | App\Http\Controllers\BackofficeEventsVideosController@edit              | web          |
|        | GET|HEAD  | backoffice/guestbook                                   | guestbook.index            | App\Http\Controllers\BackofficeGuestbookController@index                | web          |
|        | POST      | backoffice/guestbook                                   | guestbook.store            | App\Http\Controllers\BackofficeGuestbookController@store                | web          |
|        | GET|HEAD  | backoffice/guestbook/create                            | guestbook.create           | App\Http\Controllers\BackofficeGuestbookController@create               | web          |
|        | GET|HEAD  | backoffice/guestbook/{guestbook}                       | guestbook.show             | App\Http\Controllers\BackofficeGuestbookController@show                 | web          |
|        | PUT|PATCH | backoffice/guestbook/{guestbook}                       | guestbook.update           | App\Http\Controllers\BackofficeGuestbookController@update               | web          |
|        | DELETE    | backoffice/guestbook/{guestbook}                       | guestbook.destroy          | App\Http\Controllers\BackofficeGuestbookController@destroy              | web          |
|        | GET|HEAD  | backoffice/guestbook/{guestbook}/edit                  | guestbook.edit             | App\Http\Controllers\BackofficeGuestbookController@edit                 | web          |
|        | GET|HEAD  | confirm-password                                       | password.confirm           | App\Http\Controllers\Auth\ConfirmablePasswordController@show            | web          |
|        |           |                                                        |                            |                                                                         | auth         |
|        | POST      | confirm-password                                       |                            | App\Http\Controllers\Auth\ConfirmablePasswordController@store           | web          |
|        |           |                                                        |                            |                                                                         | auth         |
|        | GET|HEAD  | contact                                                | contact                    | App\Http\Controllers\ContactController@index                            | web          |
|        | POST      | email/verification-notification                        | verification.send          | App\Http\Controllers\Auth\EmailVerificationNotificationController@store | web          |
|        |           |                                                        |                            |                                                                         | auth         |
|        |           |                                                        |                            |                                                                         | throttle:6,1 |
|        | GET|HEAD  | events                                                 | events                     | App\Http\Controllers\EventsController@index                             | web          |
|        | GET|HEAD  | forgot-password                                        | password.request           | App\Http\Controllers\Auth\PasswordResetLinkController@create            | web          |
|        |           |                                                        |                            |                                                                         | guest        |
|        | POST      | forgot-password                                        | password.email             | App\Http\Controllers\Auth\PasswordResetLinkController@store             | web          |
|        |           |                                                        |                            |                                                                         | guest        |
|        | GET|HEAD  | gallery                                                | gallery                    | App\Http\Controllers\GalleryController@index                            | web          |
|        | GET|HEAD  | guestbook                                              | guestbook                  | App\Http\Controllers\GuestbookController@index                          | web          |
|        | GET|HEAD  | lang/{lang}                                            | lang.switch                | App\Http\Controllers\LanguageController@switchLang                      | web          |
|        | GET|HEAD  | login                                                  | login                      | App\Http\Controllers\Auth\AuthenticatedSessionController@create         | web          |
|        |           |                                                        |                            |                                                                         | guest        |
|        | POST      | login                                                  |                            | App\Http\Controllers\Auth\AuthenticatedSessionController@store          | web          |
|        |           |                                                        |                            |                                                                         | guest        |
|        | POST      | logout                                                 | logout                     | App\Http\Controllers\Auth\AuthenticatedSessionController@destroy        | web          |
|        |           |                                                        |                            |                                                                         | auth         |
|        | GET|HEAD  | register                                               | register                   | App\Http\Controllers\Auth\RegisteredUserController@create               | web          |
|        |           |                                                        |                            |                                                                         | guest        |
|        | POST      | register                                               |                            | App\Http\Controllers\Auth\RegisteredUserController@store                | web          |
|        |           |                                                        |                            |                                                                         | guest        |
|        | POST      | reset-password                                         | password.update            | App\Http\Controllers\Auth\NewPasswordController@store                   | web          |
|        |           |                                                        |                            |                                                                         | guest        |
|        | GET|HEAD  | reset-password/{token}                                 | password.reset             | App\Http\Controllers\Auth\NewPasswordController@create                  | web          |
|        |           |                                                        |                            |                                                                         | guest        |
|        | GET|HEAD  | verify-email                                           | verification.notice        | App\Http\Controllers\Auth\EmailVerificationPromptController@__invoke    | web          |
|        |           |                                                        |                            |                                                                         | auth         |
|        | GET|HEAD  | verify-email/{id}/{hash}                               | verification.verify        | App\Http\Controllers\Auth\VerifyEmailController@__invoke                | web          |
|        |           |                                                        |                            |                                                                         | auth         |
|        |           |                                                        |                            |                                                                         | signed       |
|        |           |                                                        |                            |                                                                         | throttle:6,1 |
+--------+-----------+--------------------------------------------------------+----------------------------+-------------------------------------------------------------------------+--------------+