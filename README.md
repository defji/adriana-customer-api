# Adriana Customer API

## Install

```bash
git clone https://github.com/defji/adriana-customer-api
cd adriana-customer-api
composer install
# set datanase credentials
php artisan migrage:fresh --seed
php artisan serve
```

## Usage

### Retrieve customers

```http request
GET http://127.0.0.1:8000/api/customers


```

### Add customer

```http request
POST http://127.0.0.1:8000/api/customers
Accept: application/json

{
 "name": "Sample Ltd",
  "code": "1234",
  "address": "1131 Budapest, Klauzál tér 1.",
  "contract_date": "1999-05-28"
},

```

### Add multiple customers

```http request
POST http://127.0.0.1:8000/api/customers
Accept: application/json

{ "customers": [
    {
      "name": "Sample 1 Ltd",
      "code": "1234",
      "address": "87234 wkfnwne fwoenfwere ewrfert",
      "contract_date": "1977-05-28"
    },
    {
      "name": "Sample 2 Ltd",
      "code": "1234",
      "address": "87234 wkfnwne fwoenfwere ewrfert",
      "contract_date": "1977-05-28"
    },
    {
      "name": "Sample 3 Ltd",
      "code": "1234",
      "address": "1131 Budapest, Klauzál tér 1.",
      "contract_date": "1999-05-28"
    }
    // {...}
  ]
}
```

