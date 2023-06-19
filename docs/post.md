# Api Spec for post

### Create post

Endpoint : POST /post/store

```json
{
	"author": 1, // user id
	"category": 1, // category id
	"title": "Meme",
	"content": "just for fun", // markdown
	"publication_date": "2023-06-13"
}
```

### Update post

Endpoint : POST /post/update

```json
{
	"author": 1, // user id
	"category": 1, // category id
	"title": "Meme",
	"content": "just for fun", // markdown
	"publication_date": "2023-06-13"
}
```

### Delete post

Endpoint : POST /post/delete/:id

```json
{
	"status": "success"
}
```

### Read post

Endpoint: GET /post/show/:id

```json
{
	"author": "Zidan", // user id
	"category": "Meme", // category id
	"title": "Meme",
	"content": "just for fun", // markdown
	"publication_date": "2023-06-13"
}
```

### List post

Endpoint: GET /post/list

```json
[
	{
		"author": "Zidan", // user id
		"category": "Meme", // category id
		"title": "Meme",
		"content": "just for fun", // markdown
		"publication_date": "2023-06-13"
	}
]
```
