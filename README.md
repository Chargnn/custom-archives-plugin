# Custom archives plugin
##### A Wordpress 5.1.1 plugin

## Installation
Clone or download this repository and put it in your wp-content/plugins folder.

## Usage
##### To get the value of a custom field
```php
$post_type = get_queried_object()->name;
$wysiwyg = cap_field($post_type);

<?= $wysiwyg; ?>
```

## Contributing
Pull requests are welcome. Do not work on master branch, create your own. 
For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)
