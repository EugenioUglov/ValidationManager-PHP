# ValidationManager-PHP
It makes easy to use text validation in PHP.<br>
Each function has been created with one parameter as an object. Inside funcitons are comments with keys of object that can be used for declaring input values.

<h2><b>Usage</b></h2>

Include file:

```
require_once('validationmanager.php');
```

Create object:
```
$validation_manager = new ValidationManager();
```

Use:
```
$replaced_string = $validation_manager->is_name_valid((object)array('name' => 'Super-Man'));
```
