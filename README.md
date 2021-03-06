## Language and framework

This application uses:
* Symfony 4.1
* PHP 7.2

The recent PHP version is justified
as Symfony 4.0+ requires PHP 7.1.3+
and to get last language additions
like return types (see the models classes).
  
## MVC

Per Symfony 4.1 recommendation:

* Controllers are located in `src/Controller/`
* Models are located in `src/Entity/`
* Views are located in `templates/`

## Database

To avoid a class of bugs per https://secure.phabricator.com/book/phabflavor/article/things_you_should_do_now/
the ID starts at big numbers.

We also ensure we store UTF-8 content in binary format.

Foreign keys between tables ensure data integrity.

## Security

The following security resources have been followed:

* ­https://symfony.com/doc/current/security/csrf.html
* https://symfony.com/doc/current/security/entity_provider.html
* https://framework.zend.com/blog/2017-08-17-php72-argon2-hash-password.html
## Demo accounts

Use these login/passwords credentials as administrator or user role:

* admin/admin
* user/user
#   p r o j e t - r e s e r v a t i o n  
 