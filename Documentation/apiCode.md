# ApiCode Endpoint Instruction
The apiCode endPoint operates only one functionaliy: retrieve or create an api code for the client.

## Input Parameter
* username: A username of bitevery account.
* password: The password for the user account

## Output Return
* ApiCode: A string of 32 digits hash code

## Example
``` php
  require_once('apiCode.php');
  
  ApiCode::getApiCode($username,$password);
```
```
>>> 0123456789abcdefghijklmnopqrstuvw
```
