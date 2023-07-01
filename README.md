# Laravel Sail Application

This is a Laravel application that uses Laravel Sail, a built-in solution for running your Laravel project using Docker.

## Getting Started

To get started, clone the repository and navigate into the project directory.

```sh
bash git clone git@github.com:harry2909/qotsa-api.git cd yourproject
```

Run `sail up` to start the Docker containers:

```sh
bash ./vendor/bin/sail up
```

## Laravel Sail

Laravel Sail is a light-weight command-line interface for interacting with Laravel's default Docker development environment.

### Setting Up Sail

Laravel Sail is automatically installed with all new Laravel applications. Sail commands are invoked using the `vendor/bin/sail` script that is included with all new Laravel applications.

To make life easier, you can set up an alias to execute Sail's commands more conveniently. For example, here's how you might setup a `sail` alias that points to the `vendor/bin/sail` script:

```sh
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

After setting up the alias, you can use `sail` in the command line to interact with your Laravel application in Docker.

### Sail Commands

You can execute various commands against your application like arbitrary PHP commands, Artisan commands, Composer commands and Node/NPM commands using Sail.

To start the containers in the background:

```sh
sail up -d
```

To run Artisan commands:

```sh
sail artisan queue:work
```

To run Composer commands:

```sh
sail composer require vendor/package
```

To stop the containers:

```sh
sail down
```

### Customizing Sail

Since Sail is just Docker, you can customize nearly everything about it. To publish Sail's Dockerfiles, you can execute the `sail:publish` command:

```sh
sail artisan sail:publish
```

After running this command, the Dockerfiles and other configuration files used by Laravel Sail will be placed within a `docker` directory in your application's root directory. You can then customize your Sail installation as needed.

For more information about all features and commands available with Laravel Sail, please visit the official Laravel Sail Documentation.

## Contributing

We welcome contributions to this project. Please feel free to open a new issue or submit a pull request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
