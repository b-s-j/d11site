Webform Remote Handlers

### About this module

  - This module allows to send Webform submission results to third party
    through Web Services (REST/SOAP), implementing two Webform Handler
    plugins (REST and SOAP). These plugins allow to define endpoint
    configurations (including endpoint URL and HTTP method), JSON
    payload (with tokens), optional base64 configurations and type of
    authentication (basic or oauth).

### Goals

  - Send webform submission results to another server through Web
    Services;

### How to use this module

In order to use this module, you should follow these steps:

1.  Enable Webform Remote Handlers module;
2.  Go to Webforms page (/admin/structure/webform);
3.  On the right side of a Webform, click on â€œDefinitionsâ€;
4.  Click on â€œEmails/Handlersâ€;
5.  Click on â€œAdd handlerâ€;
6.  Depending on the type of Webservice that you pretend, click on
    â€œRESTâ€ or â€œSOAPâ€;
7.  Fill in the configuration fields (including Web Service
    configurations and message payload) and then press â€œSaveâ€;
8.  From now on, the webform submission results (of this Webform) will
    be sent to another server through Web Services.
