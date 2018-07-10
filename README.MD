
# Objetivo
Proyecto preconfigurado para agilizar las primeras etapas de desarrollo de una aplicación.

# Tabla de contenidos
- [Objetivo](#objetivo)
- [Tabla de contenidos](#tabla-de-contenidos)
- [Instalación](#instalación)
  * [Cofiguracion necesaria](#cofiguración-necesaria)
    + [Doctrine](#doctrine)
    + [JWT(LexikJWTAuthenticationBundle)](#jwtlexikjwtauthenticationbundle)
- [Qué usa](#qué-usa)
# Instalación
	// directorio donde se quiere instalar
	$ git clone https://github.com/emortri/symfony4template
	$ cd symfony4template
	$ composer install

## Cofiguración necesaria

### Doctrine
	 // .env
	 23 DATABASE_URL=mysql://USUARIO:CONTRASEÑA@127.0.0.1:3306/NOMBRE_BD
```bash
$ php bin/console doctrine:database:create
$ php php bin/console doctrine:migrations:migrate
```
Por defecto se creará el siguiente usuario:

`Usuario: emortri@admin.com` `Contraseña: emortri`

y los siguientes roles:

`ROLE_ADMIN`
`ROLE_USER`
### JWT(LexikJWTAuthenticationBundle)
- Generar una nueva contraseña de cifrado.

```bash
$ mkdir -p config/jwt # For Symfony3+, no need of the -p option
$ openssl genrsa -out config/jwt/private.pem -aes256 4096
$ openssl rsa -pubout -in config/jwt/private.pem -out 	config/jwt/public.pem
```
	 // .env
	 30 JWT_PASSPHRASE= CONTRASEÑA_GENERADA



# Qué usa[](#qu--usa)
- [symfony/website-skeleton](https://github.com/symfony/website-skeleton)
- [JMSSerializerBundle](https://jmsyst.com/bundles/JMSSerializerBundle)
- [LexikJWTAuthenticationBundle](https://github.com/lexik/LexikJWTAuthenticationBundle)
- [BazingaJsTranslationBundle](https://yarnpkg.com/en/package/bazinga-translator)
- [FOSJsRoutingBundle](https://yarnpkg.com/en/package/symfony-routing-js)
- [NelmioCorsBundle](https://github.com/nelmio/NelmioCorsBundle)
- [TranslationsExtraBundle](https://packagist.org/packages/lucasweb/translations)
----
- [Plantilla Gentelella](https://colorlib.com/polygon/gentelella/)