JSON API and RESTful web services
==========================

This exercise explains the basics on a JSON API and RESTFul web services by showing an example implementation in Symfony.



JSON
--------------------------



RESTful web services
--------------------------



HTTP requests
--------------------------



Example on a REST API
--------------------------

https://rem.dbwebb.se/api/users

Save a few files as example files.



JsonResponse in Symfony
--------------------------

```
$response = new JsonResponse($data);
$response->setEncodingOptions(
    $response->getEncodingOptions() ||
    JSON_PRETTY_PRINT ||
    JSON_UNESCAPED_UNICODE
);
return $response;
```



Development tools for JSON and RESTful
--------------------------

### Postman
### Postman alternative
### Bash tool jq



Example on JSON API:s
--------------------------
