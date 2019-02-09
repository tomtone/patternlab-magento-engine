# Pattern Lab Thin Edition

The Thin Edition of Pattern Lab is meant to serve as a clean base upon which you can build your own custom editions of Pattern Lab. The only thing that is installed with the Thin Edition is [Pattern Lab Core](https://github.com/pattern-lab/patternlab-php-core).

## Installing

Pattern Lab uses [Composer](https://getcomposer.org/) to manage project dependencies. The Thin Edition of Pattern Lab can be installed in one of two ways:

### Download and Install Using the Bundled Version of Composer

We don't expect everyone to have Composer installed. We bundle a version of Composer with the Thin Edition to make the install process go smoothly. 

First, [download the Zip of the Thin Edition](https://github.com/pattern-lab/patternlab-php-thin/archive/master.zip).

Second, run Composer. If you're on a Mac navigate to your downloaded copy of Pattern Lab, open `core > scripts`. Double-click `installPatternLab.command`. Pattern Lab will set itself up. Alternatively, you can use your command line tool of choice and type the following within your downloaded copy:

    php core/bin/composer.phar install

### Use Composer's create-project Feature

To use Composer's `create-project` feature type the following where you want to install Pattern Lab:

    composer create-project pattern-lab/edition-thin your-project-name

This will create a directory called `your-project-name`. It will also install Pattern Lab's default folder structure as well as core and its dependencies.

## Modifying the Thin Edition to Create Your Own Editions

To create your own editions all you need to do is fork this project and edit the `composer.json` file to include the features that make sense for your project. For example, if you wanted to include Mustache as the default Pattern Engine for your edition you'd add the following to `composer.json` under the `require` section:

    "pattern-lab/patternengine-mustache": "dev-dev"

This ensures that the Mustache Pattern Engine is installed.

You'll also want to make sure to edit information such as `name`, `description`, `authors`, etc. in `composer.json` as well so they match your project. Then add your project to [Packagist](https://packagist.org/) so others can download and use your edition as well.
