# User Endpoint

Disini merupakakan API spec untuk mengelola data user

### Create user

Endpoint: POST /user/store

```json
{
	"username": "zidan01",
	"email": "zidan01@pbw.com",
	"name": "Zidan",
	"password": "whatever"
}
```

### Update User

Endpoint : POST /user/update/:id

```json
{
	"username": "zidan01",
	"email": "zidan01@pbw.com",
	"name": "Zidan",
	"password": "whatever"
}
```

### Delete User

Endpoint : POST /user/delete/:id

```json
{
	"id": "1"
}
```

### Show User

Endpoint : GET /user/show/:id

```json
{
	"username": "zidan01",
	"email": "zidan01@pbw.com",
	"name": "Zidan",
	"profile": {}
}
```

### List User

Endpoint : GET /user/list

```json
[
	{
		"username": "zidan01",
		"email": "zidan01@pbw.com",
		"name": "Zidan",
		"profile": {}
	}
]
```

### Profile User

Endpoint : POST /user/profile/store

```json
{
	"id": "1",
	"avatar": "https://localhost/pbw-01/asset/avatars/zidan-01.jpg",
	"education": "IBI Kesatuan"
}
```

### Profile User

Endpoint : POST /user/profile/update

```json
{
	"id": "1",
	"avatar": "https://localhost/pbw-01/asset/avatars/zidan-01.jpg",
	"education": "IBI Kesatuan"
}
```
