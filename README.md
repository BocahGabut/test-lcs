
# Test Langit Creative Solutions

ini adalah project test Teknis untuk Langit Creative Solutions.

### Persiapan

1. PHP
1. MYSQL
1. Clone dari [repo test-lcs](https://github.com/BocahGabut/test-lcs) ke dalam htdocs (windows) atau /var/www/html (linux)

### Instalasi

1. Silahkan anda buka hasil dari clone tadi.
1. Buka file `database.php` pada folder `config`.
1. Rubah config databasenya sesuai dengan configurasi database anda.
1. Silahkan buka mysql anda, dan buat sebuah database baru sesuai dengan keinginan anda. (note: pastikan nama database yang anda buat sama dengan `$DB_DATABASE` pada file `config/database.php`).
1. Setelah itu, Silahkan buka terminal anda dan jalankan `php migration.php` pada terminal.
1. Selesai.

## API Reference

#### Check Kode Ticket

```

  GET /check-tickets?event_id={event_id}&ticket_code={ticket_code}

```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `event_id` | `string` | **Required**. id event |
| `ticket_code` | `string` | **Required**. code ticket |

Contoh Response Berhasil

```
    {
        "message": "Fetch data success!!!",
        "data": {
            "ticket_code": "LCSCJ4DBHK",
            "status": "available"
        }
    }
```

Contoh Response Gagal 

```
    {
        "message": "Data not found.",
        "data": null
    }
```

```
    {
        "message": "Invalid or missing data parameters.",
        "data": null
    }
```

#### Get Update Status Kode Ticket

```

  GET /update-tickets?event_id={event_id}&ticket_code={ticket_code}&status={status}

```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `event_id` | `string` | **Required**. id event |
| `ticket_code` | `string` | **Required**. code ticket |
| `status` | `string` | **Required**. status ticket **claimed & available** |

Contoh Response Berhasil

```
    {
        "message": "Update data success!!!",
        "data": {
            "ticket_code": "LCSCJ4DBHK",
            "status": "claimed",
            "updated_at": "2024-03-01 22:50:23"
        }
    }
```

Contoh Response Gagal

```
    {
        "message": "Invalid status value.",
        "data": null
    }
```

```
    {
        "message": "Data not found.",
        "data": null
    }
```

```
    {
        "message": "Invalid or missing data parameters.",
        "data": null
    }
```
