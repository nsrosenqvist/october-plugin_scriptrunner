ScriptRunner uses a component from the popular Wordpress framework [Roots.io](https://roots.io/).
It's a simple JavaScript that handles script execution depending on what page
of the site the user is visiting. It can trigger scripts depending on name of page,
type of page (*page*, *static_page*, *blog_post*, *blog_posts*) and name of layout. This is done
by injecting classes on the body element of the layout.

# Usage

Simply include the component and `scriptRunner.classes` on the layouts you wish
to use it (The plugin requires that the `scripts` placeholder is loaded before your theme's
scripts):

```
[scriptRunner]
==
==
<html>
    <head></head>
    <body class="{{ scriptRunner.classes }}">

        {% page %}

        {% scripts %}

        <script type="text/javascript" src="myscripts.js"></script>
    </body>
</html>
```

Then in your JavaScript you create properties in the `namespace` object that refers
to the pages and layouts. This is the rules for how they are added:

Name | Type | Result
-----|------|-------
About me | Static Page with layout called "static" | `static_page about_me layout_static`
Home | CMS Page with blogPosts | `page home layout_default blog_posts`
Complicated-Name's Page | CMS Page | `page complicated_names_page layout_default`

And this is how you'd write the JavaScript (`common` always runs after all other
matches has been executed):

```
import newsletter from "newsletter.js"; // ES6 example - file exporting an object with an init method

ScriptRunner.namespace = {
    layout_default: {
        init: function() {
            // Script that's run when layout_default is matched
        }
    },
    home: {
        init: function() {
            // Welcome home
        }
    },
    newsletter: newsletter, // ES6 example - very clean
    common: {
        init: function() {
            // This always runs
        }
    }
}

// ScriptRunner itself doesn't require jQuery, but you might want to wait on "ready"
// before you run the ScriptRunner events
$(document).on('ready', function(){
    ScriptRunner.loadEvents();
});
```

# Attribution

The script used is taken from [Roots.io](https://roots.io/) and is licensed under [MIT](https://github.com/nsrosenqvist/october-plugin_scriptrunner/blob/master/LICENSE_Roots.md). The icon is
made by Arthur Skripnik and is licensed under [CC 3.0](http://creativecommons.org/licenses/by/3.0/us/).
