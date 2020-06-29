<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Loja de Jogos Online

## GET em {URL}/api/produto

* ### Produz
#### Status 200 OK
``` json
[
	{
		"id": 1,
		"nome": "Cyberpunk 2077",
		"descricao": "GOTY",
		"valor": 199.99
	},
	{
		"id": 2,
		"nome": "The Elder Scrolls VI: Skyrim II",
		"descricao": "GOTY II",
		"valor": 199.99
	}
]
```

## GET em {URL}/api/produto/{id}

* ### Produz
#### Status 200 OK
``` json
{
	"id": 1,
	"nome": "Cyberpunk 2077",
	"descricao": "GOTY",
	"valor": 199.99
}
```

## POST em {URL}/api/produto

* ### Body
``` json
{
	"nome": "Cyberpunk 2077",
	"descricao": "GOTY",
	"valor": 199.99
}
```

* ### Produz
#### Status 200 OK
``` json
{
	"id": 12,
	"nome": "Cyberpunk 2077",
	"descricao": "GOTY",
	"valor": 199.99
}
```

## PUT em {URL}/api/produto/{id}

* ### Body
``` json
{
	"nome": "Cyberpunk 2077",
	"descricao": "GOTY",
	"valor": 199.99
}
```

* ### Produz
#### Status 200 OK
``` json
{
	"id": 1,
	"nome": "Cyberpunk 2077",
	"descricao": "GOTY",
	"valor": 199.99
}
```

## DELETE em {URL}/api/produto/{id}

* ### Produz
#### Status 200 OK