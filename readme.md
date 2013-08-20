REST API Base
=============

Base components for JSON REST API for Nette applications

namespace: `Clevis\RestApi`


####ApiRoute
- route for REST requests

####ApiPresenter
- automatic validation of schema

####ApiResponse
- sending response data to client

####JsonSchemaValidator
- validating request data. uses *justinrainbow/json-schema*

####*IApiAuthorizator*
- interface for API authorisation

####*IApiUser*
- interface of user entity for API

####*IApiLogger*
- interface for logging service
