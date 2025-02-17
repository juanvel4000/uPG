
# uPG

A simple **markdown**-based Static website generator written in **php**, customizable and easy to use


## Installation

Installing uPG is very simple, put all the files in your website folder (`www`, `public_html` or `htdocs`)
rename `config-sample.php` to `config.php`

**windows**:
```cmd
RENAME config-sample.php config.php
```
**Unix-based operating systems (Linux/Mac)**:
~~~bash
mv config-sample.php config.php
~~~

Now, modify `config.php` to setup your website (View [Configuration](#Configuration))
## Configuration

uPG does not require any database, its designed to be lightweight and easy to use

You only need to modify `config.php` to get your website going,

At start, your `config.php` may look like this
~~~bash
<?php
define("UPG_NAME", "My Website"); // change this
define("UPG_ICON", "None"); // set to none to disable favicon
define("UPG_THEME", "default"); // Use one of the themes in themes/, or add your own (bootstrap-based)
define("UPG_BAR", true);

~~~
Replace `My Website` with the name you preffer

Modifying `UPG_ICON` is  optional, you can put a path to any image you want to be your website's UPG_ICON

`UPG_THEME` is the Website theme you are currently using, you can set it to any theme in the `themes/` directory (without `.css`), To get a preview of the themes, check [bootswatch.com](https://bootswatch.com), You can add more bootstrap-based themes to the `themes/`folder, if you know what you're doing

set `UPG_BAR` to false if you do not want a navigation bar with every page in the top

## Page Creation

Pages in uPG are written in **markdown**, which is a really simple markup language

to create a page, create a file  with the `.md`filetype in the `pages/` folder

Learn about markdown in [Markdown Guide](https://www.markdownguide.org/basic-syntax/)
## Acknowledgements

 - [Parsedown](https://parsedown.org) for the Markdown parser
 - [Bootswatch](https://bootswatch.com) for the Bootstrap themes