# API Spec untuk Category dasar

### Create Category

Endpoint : POST /category/store

```json
{
	"category": "Meme",
	"type": "blog",
	"description": "just for fun"
}
```

### Update Category

Endpoint : POST /category/update

```json
{
	"category": "Meme",
	"type": "blog",
	"description": "just for fun"
}
```

### Delete Category

Endpoint : POST /category/delete/:id

```json
{
	"status": "success"
}
```

### Read Category

Endpoint: GET /category/show/:id

```json
{
	"category": "Meme",
	"type": "blog",
	"description": "just for fun"
}
```

### List Category

Endpoint: GET /category/list

```json
[
	{
		"category": "Meme",
		"type": "blog",
		"description": "just for fun"
	}
]
```
